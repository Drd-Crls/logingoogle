<?php
    use App\Session\User as SessionUser;

    $info = SessionUser::getInfo();
    $nome = $info['name'];
    echo "<pre>";
    print_r($nome);
    echo "</pre>";


?>



    <h1>admin</h1>

    <p>Ola, <?php echo $nome ?> seja bem vindo</p>


<a href="logout.php" role="button">
   Sair
</a>
