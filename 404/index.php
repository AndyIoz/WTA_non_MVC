<?session_start();?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ошибка!</title>
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/73ba99ffbc.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Work Time Analysis</a>
    <?php
    if($_SESSION['access']){
        echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="dropdown-item" href="#">Список сотрудников</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Новый сотрудник</a>
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
                <a class="nav-link" href="/main/logout/"><span><i class="fas fa-sign-out-alt"></i></span> Выход</a>
            </li>
        </ul>
    </div>';
    }
    ?>
</nav>
<div class="container">
    <div class="col text-center mt-5">
        <span><i class="far fa-frown fa-10x text-muted"></i></span>
        <br>
        <div class="text-muted" style="font-size: 72pt;">404</div>
        <div class="text-muted" style="font-size: 30pt;">Ой! Такой страницы нет</div>
    </div>
</div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>