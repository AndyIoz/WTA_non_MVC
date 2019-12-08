<?php session_start(); if(!$_SESSION['access']){header('HTTP/1.1 404 Not Found');
    header("Status: 404 Not Found");
    header('Location:../404/');}?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сотрудники</title>
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/73ba99ffbc.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Work Time Analysis</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/main"><span><i class="fas fa-home"></i></span> Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><i class="fas fa-users"></i></span> Сотрудники
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href=".">Список сотрудников</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./add/">Новый сотрудник</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="/openserver/phpmyadmin/" class="nav-link"><span><i class="fas fa-cogs"></i></span> PHPMyAdmin</a>
            </li>
        </ul>
    </div>
    <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../main/logout/"><span><i class="fas fa-sign-out-alt"></i></span> Выход</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-3">
    <h1 class="text-center">Список сотрудников</h1>
    <hr>
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter">
        Добавить сотрудника
    </button>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalCenterTitle">Новая сотрудник</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Заполните все поля!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label for="">ФИО Сотрудника</label>
                            <input class="form-control" type="text" name="fio" placeholder="Фамилия / Имя / Отчество">
                        </div>
                        <div class="form-group">
                            <label for="">Должность</label>
                            <select class="form-control" name="position">
                                <option value="-1"></option>
                                <?php
                                require_once '../mods/Database.php';
                                $db = new Database();
                                #$res = $db->get_position();
                                foreach ($db->get_position() as $row) {
                                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit">Добавить</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <table class="table table-sm table-hover mt-3">
        <thead class="thead-light">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Сотрудник</th>
            <th scope="col">Должность</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($db->get_workers() as $item){
            echo '<tr><th scope="row">'.$item['id'].'</th><td><a target="_blank" href="./view/?id='.$item['id'].'">'.$item['fio'].'</a></td><td>'.$item['name'].'</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>