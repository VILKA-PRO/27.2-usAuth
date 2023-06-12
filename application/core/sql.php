<?php

class sqlQerries
{
    public static function dbConnect()
    {
        //Устанавливаем доступы к базе данных:
        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $userDB = 'root'; //имя пользователя, по умолчанию это root
        $password = 'root'; //пароль, по умолчанию пустой
        $db_name = '27.2-usAuth'; //имя базы данных


        //Соединяемся с базой данных используя наши доступы:
        $link = mysqli_connect($host, $userDB, $password, $db_name)
            or die(mysqli_error($link));
        mysqli_query($link, "SET NAMES 'utf8'");

        return $link;
    }
    public static function sineUp($curentLogin, $curentPass, $curentEmail, $curentToken)
    {
        $link = sqlQerries::dbConnect();

        $login = mysqli_query($link, "SELECT * FROM users WHERE login = '$curentLogin'") or die(mysqli_error($link));
        $login = mysqli_fetch_all($login);

        $email = mysqli_query($link, "SELECT * FROM users WHERE email = '$curentEmail'") or die(mysqli_error($link));
        $email = mysqli_fetch_all($email);

        if ($login) {
            $_SESSION['loginExist'] = true;
            header('Location: ?url=sineup');
        }
        if ($email) {
            $_SESSION['emailExist'] = true;
            header('Location: ?url=sineup');
        }
        $role = "vkuser";

        $createUser = "INSERT INTO `users` (`login`, `password`, `email`, `token`, `role`) VALUES ('$curentLogin', '$curentPass', '$curentEmail', '$curentToken', '$role')";
        $createUser = mysqli_query($link, $createUser) or die(mysqli_error($link));
        mysqli_close($link);
         // Пишем в сессию об авторизации и логин и др пользователя
         $_SESSION['auth'] = true;
         $_SESSION['login'] = $curentLogin;
         $_SESSION['authTime'] = time();
         $_SESSION['role'] = $role;
         header('Location: ?url=dashboard');
    
    }

    public static function login($curentLogin, $curentPass)
    {
        require_once CORE . "log.php"; // Подключаем логирование
        $link = sqlQerries::dbConnect();

        $user = mysqli_query($link, "SELECT login, password, role FROM users WHERE login = '$curentLogin'") or die(mysqli_error($link));
        $user = mysqli_fetch_all($user);
        var_dump($user);
        var_dump(password_verify($curentPass, $user[0][1]));
        if ($user) {

            if (password_verify($curentPass, $user[0][1])) {
                // Пишем в сессию об авторизации и логин и др пользователя
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $user[0][0];
                $_SESSION['authTime'] = time();
                $_SESSION['role'] = $user[0][2];
                mysqli_close($link);
                header('Location: ?url=dashboard');
            } else {
                mysqli_close($link);
                $log->Debug("Юзер: __ $curentLogin __ ввел неверный пароль"); // Записываем в лог, если юзер не найден
                sqlQerries::loginError();
            }
        } else {

            mysqli_close($link);
            $log->Debug("Юзер: __ $curentLogin __ не найден"); // Записываем в лог, если юзер не найден
            sqlQerries::loginError();
        }
    }

    public static function loginError()
    {

        $_SESSION['loginError'] = true;
        header('Location: ?url=login');
    }


    public static function vkSql($curentLogin, $curentPass, $curentEmail, $curentToken)
    {
        $link = sqlQerries::dbConnect();

        $user = mysqli_query($link, "SELECT login, role FROM users WHERE login = '$curentLogin'") or die(mysqli_error($link));
        $user = mysqli_fetch_all($user);

        if ($user) {
            // Пишем в сессию об авторизации и логин и др пользователя
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $user[0][0];
            $_SESSION['authTime'] = time();
            $_SESSION['role'] = $user[0][1];
            mysqli_close($link);
            header('Location: ?url=dashboard&test=vkSql');
        } else {
            sqlQerries::sineUp($curentLogin, $curentPass, $curentEmail, $curentToken);
        }
    }
}
