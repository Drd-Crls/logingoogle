<?php
    //autoload composer
    require __DIR__.'/vendor/autoload.php';

    //dependencias
    use Google\Client as GoogleClient;
    use App\Session\User as SessionUser;



    //VALIDACAO PRIMARIA DO COOKIE
    //verifica os campos obrigatorios
    if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])){
        header('location: index.php');
        echo 'erro';
    }

    //pegandpo o cookie
    $cookie = $_COOKIE['g_csrf_token'] ?? '';

    if ($_POST['g_csrf_token'] != $cookie){
        header('location: index.php');
        echo 'erro';
    }


    //VALIDACIO SECUNDARIA DO TOKEN
    $client = new GoogleClient(['client_id' => '500909432449-khtfn42v32tnndf9ltisp3b0aujfk6g3.apps.googleusercontent.com']);

    //OBTEM OS DADOS DO USUARIO
    $payload = $client->verifyIdToken($_POST['credential']);
    if (isset($payload['email'])) {
        SessionUser::login($payload['name'],$payload['email']);
        header('location: index.php');
    }
?>
