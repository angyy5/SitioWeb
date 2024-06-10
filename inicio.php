<?php
 session_start();


require 'bdatos.php';

if (!empty($_POST['email'])  && !empty($_POST['usuario']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, usuario, password FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        $message = 'Datos correctos';
        header("Location: \Sitioo Web\prin3.html"); // Redirección a prin3.html
      } //esto es para enviar a otra pag al iniciar sesion
     else {
      $message = 'Los datos no coinciden'; //los datos no coinciden
    }
  }


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=I, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="inicio.css">
</head>
<body>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>


    <main id="prin">
    <nav>
        <a href="registro.php" class="arriba">REGISTRARSE</a>
    </nav>

    <form action="inicio.php" class="formu" method="post" > 
        <h4><b>¡Bienvenido!</b></h4>
        <p>Correo</p>
        <input class="control" type="email" name="email" id="Usuario" placeholder="Ingrese su correo">

        <p>Contraseña</p>
        <input class="control" type="password" name="password" id="Contra" placeholder="**********">

        <input type="submit" class="boton" value="Send"> 
    </form>





    <img  src="logooo.png" class="logot"alt="">

    <video muted autoplay loop>
        <source src="sallsa.mp4" type="video/mp4"> </video>
    <div class="capa"></div>
</main>
</body>
</html>