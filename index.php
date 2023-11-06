<?php
    //autoload composer
    require __DIR__.'/vendor/autoload.php';

    use \App\Session\User as SessionUser;

    include "includes/header.php";

    include SessionUser::isLogged() ? 'includes/admin.php' : 'includes/login.php';
    // if(SessionUser::isLogged() === TRUE){
    //     include "includes/header.php";

    //     header('location: includes/admin.php');
    //     print_r($_SESSION['user']);
        
    //     include "includes/footer.php";
        
    // }elseif(SessionUser::isLogged() === FALSE){
    //     header('location: includes/login.php');
    // }

    
    include "includes/footer.php";


?>