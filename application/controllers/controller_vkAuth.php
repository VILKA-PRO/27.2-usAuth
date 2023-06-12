<?php
class Controller_vkAuth extends sqlQerries
{

    protected $clientId = '51672961'; // ID приложения
    protected $clientSecret = '0UqBhpLPtF1ampHXwXMC'; // Защищённый ключ
    protected $redirectUri  = 'http://localhost:8888/27.2-usAuth/?url=vkAuth'; // Адрес, на который будет переадресован пользователь после прохождения авторизации

    function action_index()
    {

        // Параметры приложения
        // $clientId     = '51672961'; // ID приложения
        // $clientSecret = '0UqBhpLPtF1ampHXwXMC'; // Защищённый ключ
        // $redirectUri  = 'http://localhost:8888/27.2-usAuth/?url=vkAuth'; // Адрес, на который будет переадресован пользователь после прохождения авторизации

        // Формируем ссылку для авторизации
        $params = array(
            'client_id'     => $this->clientId,
            'redirect_uri'  => $this->redirectUri,
            'response_type' => 'code',
            'v'             => '5.131', // (обязательный параметр) версиb API https://vk.com/dev/versions

            // Права доступа приложения https://vk.com/dev/permissions
            // Если указать "offline", полученный access_token будет "вечным" (токен умрёт, если пользователь сменит свой пароль или удалит приложение).
            // Если не указать "offline", то полученный токен будет жить 12 часов.
            'scope'         => 'email,offline',
        );

        $vk = 'http://oauth.vk.com/authorize?' . http_build_query($params);

        if (!$_GET['code']) {
            header("Location: $vk");
        } else {
            $Controller_vkAuth = new Controller_vkAuth ();
            $Controller_vkAuth -> vkAccess();
        }
    }

    public function vkAccess()
    {

        $params = array(
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code'          => $_GET['code'],
            'redirect_uri'  => $this->redirectUri
        );

        if (!$content = @file_get_contents('https://oauth.vk.com/access_token?' . http_build_query($params))) {
            $error = error_get_last();
            throw new Exception('HTTP request failed. Error: ' . $error['message']);
        }

        $response = json_decode($content);

        // Если при получении токена произошла ошибка
        if (isset($response->error)) {
            throw new Exception('При получении токена произошла ошибка. Error: ' . $response->error . '. Error description: ' . $response->error_description);
        }
        //А вот здесь выполняем код, если все прошло хорошо
        $vkToken = $response->access_token; // Токен
        $expiresIn = $response->expires_in; // Время жизни токена
        $vkUserId = $response->user_id; // ID авторизовавшегося пользователя
        $vkEmail = $response->email;
        // Сохраняем токен в сессии
        $_SESSION['token'] = $vkToken;

        sqlQerries::vkSql($vkUserId, $vkToken, $vkEmail, $vkToken); // запускаем метод проверки логина VK
        echo "<pre>";
        print_r($content);
    }


    public static function basa (){
        
        
    }
}
?>

