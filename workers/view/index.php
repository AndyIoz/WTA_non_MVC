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
    <title>Информация о сотруднике</title>
    <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
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
                <a class="nav-link" href="/main"><i class="fas fa-home"></i></span> Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><i class="fas fa-users"></i></span> Сотрудники
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../">Список сотрудников</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../add/">Новый сотрудник</a>
                </div>
            </li>

        </ul>
    </div>
    <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../../main/logout/"><span><i class="fas fa-sign-out-alt"></i></span> Выход</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">
    <div class="card">
        <?php
        require_once '../../mods/Database.php';
        $db = new Database();
        $res = $db->get_info_worker($_GET['id']);
        ?>
        <div class="card-header"><h4>Сведения о сотруднике</h4></div>
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control disabled" placeholder="ID сотрудника" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $res[0]['id']?>" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">ФИО</span>
                </div>
                <input type="text" aria-label="First name" class="form-control" value="<?php echo $res[0]['fio']?>" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Должность</span>
                </div>
                <input type="text" class="form-control disabled" aria-label="position" aria-describedby="basic-addon1" value="<?php echo $res[0]['name']?>" readonly>
            </div>
            <hr>
            <div class="input-group">
                <h4>Был на работе</h4>
                <? echo $res['table'];?>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>