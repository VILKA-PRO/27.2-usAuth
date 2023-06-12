<?php
// session_start();
// ini_set('display_errors', 'On');

$auth = $_SESSION['auth'] ?? null;
$login = $_SESSION['login'] ?? null;

$count = $_SESSION['count'] ?? 0;
$count++;
$_SESSION['count'] = $count;



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Страница регистрации</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="https://i.ibb.co/7SQVS44/favicon.jpg">
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <img width="50" src="images/US-Logo-1.png" alt="Us logo">
                    <a class="nav__link__main" href="index.php?url=main">usAuth</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="#"></a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                <?php
                if (!$auth) {
                ?>
                    <!-- <p>ntrcn</p> -->
                    <a class="btn btn-sm btn-outline-secondary custom-btn btn-16" href="?url=sineup">Регистрация</a>
                    <a class="btn btn-sm btn-outline-secondary custom-btn btn-16" href="?url=login">Войти</a>
                <?php } else {

                ?>
                    <span><strong><?= $login ?></strong>, <br> добро пожаловать. </span>
                    <a class="custom-btn btn-16 " href="application/pages/logout.php?exit">Выход</a>
                <?php
                }
                ?>



                    <p> </p>
                    
                </div>
            </div>
        </header>
    </div>


    <main class="container">
        <?php include $content_view; ?>
    </main><!-- /.container -->

    <footer class="blog-footer">

        <!-- Футер  -->
        <div class="row align-items-end">
            <div class="col-12 mt-5 mb-2 ">
                <p class="designed foot">Designed by Ivan Us at SkillFactory</p>
            </div>
        </div>
    </footer>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>

</html>
