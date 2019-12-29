<?php
session_start();
if($_SESSION['access']){header('Location:/main/');}
else if(isset($_POST['login']) && isset($_POST['passwd']))
{
    require_once 'mods/Database.php';
    $db = new Database();
    if ($db->get_auth($_POST['login'], $_POST['passwd']))
    {
        $_SESSION['access'] = true;
        header('Location: /main/');
    }else{
        $_SESSION['access'] = -5;

    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/73ba99ffbc.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Work Time Analysis</a>
</nav>
<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5 col-xl-5">
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Авторизация</h4>
                    <hr>
                    <?php if($_SESSION['access'] === -5) echo '<div class="alert alert-danger">Неверный логин или пароль</div>';?>
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="login" class="form-control" placeholder="Логин"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="passwd" class="form-control" placeholder="Пароль"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Войти </button>
                        </div>
                        <!--<p class="text-center"><a href="#" class="btn">Forgot password?</a></p>-->
                    </form>
                </article>
            </div>

        </div>
    </div>
</div>
<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>