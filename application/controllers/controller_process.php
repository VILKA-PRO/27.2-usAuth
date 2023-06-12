<?php
ini_set('display_errors', 'On');

class Controller_Process 
{

    function action_index()
    {

        require_once CORE . 'sql.php';

        $curentLogin = $_POST['username'];
        $curentPass = $_POST['password'];
        $authTime = $_SESSION['authTime'] ?? time(); // Записали в сессию текущее время
        // var_dump($_POST);
        new sqlQerries;
        sqlQerries::login($curentLogin, $curentPass); // запускаем метод логина

    }
}
