<?php


session_start();

require_once('config.php');

require "../vendor/autoload.php";
if(isset($_POST['submit']))

{

    if(isset($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['email']) && !empty($_POST['password']))


    {

        $nombre = trim($_POST['nombre']);

        $apellidos = trim($_POST['apellidos']);

        $email = trim($_POST['email']);

        $password = trim($_POST['password']);



        $options = array("cost" => 4);

        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

        $date = date('Y-m-d H:i:s');



        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $sql = 'select * from usuarios where email = :email';

            $stmt = $pdo->prepare($sql);

            $p = ['email'=>$email];

            $stmt->execute($p);



            if($stmt->rowCount() == 0) {

                $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, fecha_creacion,fecha_modificacion) 

			VALUES (:nombre,:apellidos,:email,:password,:fecha_creacion,:fecha_modificacion)";



                try{

                    $handle = $pdo->prepare($sql);

                    $params = [

                        ':nombre'=>$nombre,

                        ':apellidos'=>$apellidos,

                        ':email'=>$email,

                        ':password'=>$hashPassword,

                        ':fecha_creacion'=>$date,

                        ':fecha_modificacion'=>$date

                    ];



                    $handle->execute($params);



                    $success = 'Usuario creado correctamente';



                }

                catch(PDOException $e){

                    $errors[] = $e->getMessage();

                }

            }  else {

                $valnombre = $nombre;

                $valapellidos = $apellidos;

                $valEmail = '';

                $valPassword = $password;



                $errors[] = 'Dirección de correo ya registrada';

            }

        }         else       {

            $errors[] = "Email no válido";

        }

    }     else     {

        if(!isset($_POST['nombre']) || empty($_POST['nombre']))       {

            $errors[] = 'Se requiere nombre';

        }  else    {

            $valnombre = $_POST['nombre'];

        }



        if(!isset($_POST['apellidos']) || empty($_POST['apellidos']))     {

            $errors[] = 'Se requiere apellidos';

        }  else  {

            $valapellidos = $_POST['apellidos'];

        }



        if(!isset($_POST['email']) || empty($_POST['email']))   {

            $errors[] = 'Se requiere correo electrónico';

        }   else {

            $valEmail = $_POST['email'];

        }



        if(!isset($_POST['password']) || empty($_POST['password']))   {

            $errors[] = 'Se requiere contraseña';

        }     else       {

            $valPassword = $_POST['password'];

        }



    }

 }

?>





<!doctype html>

<html>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



</head>

<body class="bg-dark">



<div class="container h-100">

	<div class="row h-100 mt-5 justify-content-center align-items-center">

		<div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">

			<h1 class="mx-auto w-25" >Register</h1>

			<?php

				if(isset($errors) && count($errors) > 0) {

					foreach($errors as $error_msg) 	{

						echo '<div class="alert alert-danger">'.$error_msg.'</div>';

					}

                }



                if(isset($success))      {



                    echo '<div class="alert alert-success">'.$success.'</div>';

                }

			?>

			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

                <div class="form-group">

					<label for="email">First Name:</label>

					<input type="text" name="nombre" placeholder="Enter First Name" class="form-control" value="<?php echo ($valnombre??'')?>">

				</div>

                <div class="form-group">

					<label for="email">Last Name:</label>

					<input type="text" name="apellidos" placeholder="Enter Last Name" class="form-control" value="<?php echo ($valapellidos??'')?>">

				</div>



                <div class="form-group">

					<label for="email">Email:</label>

					<input type="text" name="email" placeholder="Enter Email" class="form-control" value="<?php echo ($valEmail??'')?>">

				</div>

				<div class="form-group">

				<label for="email">Password:</label>

					<input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php echo ($valPassword??'')?>">

				</div>



				<button type="submit" name="submit" class="btn btn-primary">Submit</button>

				<p class="pt-2"> Volver a <a href="login.php">Iniciar Sesión</a></p>



			</form>

		</div>

	</div>

</div>

</body>

</html>




