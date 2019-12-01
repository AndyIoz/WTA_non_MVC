<?php
require 'config.php';
class Database
{
    public $db;
    public function __construct()
    {
        if(empty($this->db))
        {
            try{
                $this->db = new PDO(DB_DSN,DB_USER,DB_PASSWD,DB_OPT);
                return $this->db;
            } catch (PDOException $ex) {
                echo '<div class="alert alert-danger">'.$ex->getMessage().'</div>';
            }
        } else {
          return $this->db;
        }
    }

    public function get_auth($login, $password)
    {
        $arr = array(':login'=>$login,':passwd'=>md5($password));
        $sth = $this->db->prepare('SELECT MD5(id) FROM admins WHERE login = :login AND password = :passwd');
        $sth->execute($arr);
        if($sth->rowCount() == 0){
            $sth = null;
            return false;
        } else {
            $sth = null;
            return true;
        }
    }
    public function get_workers()
    {
        return $this->db->query('SELECT wor.id, fio, pos.name FROM workers AS wor, position as pos WHERE wor.position = pos.id')->fetchAll();
    }

    public function get_position()
    {
        return $this->db->query('SELECT * FROM position ORDER BY name')->fetchAll();
    }

    public function get_info_worker($w_id)
    {
        $sth = $this->db->prepare('SELECT wor.id, fio, pos.name FROM workers AS wor, position as pos WHERE wor.position = pos.id and wor.id = :id');
        $sth->execute(array(':id'=>$w_id));
        $res1 = $sth->fetchAll();
        $res2 = $this->get_journal_worker($w_id);
        return array_merge($res1,$res2);
    }

    public function get_journal()
    {
        return $this->db->query('SELECT j.id, w.fio, j.ardate, j.oudate, w.id as w_id FROM journal j, workers w WHERE w.id = j.worker ORDER BY j.id')->fetchAll();
    }

    private function get_journal_worker($w_id)
    {
        $sth = $this->db->prepare('SELECT ardate, oudate from journal where worker = :id');
        $sth->execute(array(':id'=>$w_id));
        if($sth->rowCount()>0){
            $table = '<table class="table table-hover"><thead class="thead-light"><tr><th>Пришел</th><th>Ушел</th><th>кол-во часов</th></tr></thead><tbody>';
            foreach ($sth->fetchAll() as $row){
                $table .= '<tr><td>'.$row['ardate'].'</td><td>'.$row['oudate'].'</td><td>'.date('H:i:s',strtotime($row['oudate'])-strtotime($row['ardate'])-10800).'</td></tr>';
            }
            $table .= '</tbody></table>';
            return array('table'=>$table);
        } else return array('table'=>'<div class="alert alert-warning">Информации нету!</div>');
    }
    private function get_sum_time($w_id)
    {
        $sth = $this->db->prepare('SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(oudate,ardate)))) as sum_time from journal where worker = :id');
        $sth->execute(array(':id'=>$w_id));
        return $sth->fetchAll();
    }
}