
<?php

session_start();



if(!$_SESSION['id']){

    header('location:login.php');

}



?>



<h1>Bienvenido a la página <?php echo ucfirst($_SESSION['first_name']); ?></h1>

<a href="logout.php?logout=true">Cerrar sesión</a>

