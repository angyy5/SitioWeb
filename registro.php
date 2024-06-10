<?php
   
   require 'bdatos.php';

   $message = '';


   if (!empty($_POST['email']) &&  !empty($_POST['usuario']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (email, usuario, password) VALUES (:email, :usuario, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
   // $password = password_hash($_POST['password'], PASSWORD_BCRYPT); para que la contraseña no se vea
    
    //$stmt->bindParam(':password', $password); 

    $stmt->bindParam(':usuario', $_POST['usuario']);

    $stmt->bindParam(':password', $_POST['password']);

    if ($stmt->execute()) {
      $message = 'Su usuario ha sido creado correctamente, puede iniciar sesión '; //ha sido creado un usuario
    } else {
      $message = 'Ha ocurrido un error'; //ha ocurrido un error
    }
  }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=I, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>


    <main id="prin">
    <nav>
        <a href="inicio.php" class="arriba">INICIAR SESIÓN</a>
    </nav>

    <form action="registro.php" class="formu" name="prueba" method="post">
        <h4><b>¡Bienvenido!</b></h4>
    
        <p>Correo</p>
        <input class="control" type="text" name="email" id="Nombres" placeholder="Ingrese su correo">
    
        <p>Usuario</p>
        <input class="control" type="text" name="usuario" id="Usuario" placeholder="Ingrese su usuario">
    
        <p>Contraseña</p>
        <input class="control" type="password" name="password" id="Contra" placeholder="**********">
    
        <input type="submit" value="Send" class="boton" >
        
    
        </form>

    <img  src="logooo.png" class="logot"alt="">

    <video muted autoplay loop>
        <source src="sallsa.mp4" type="video/mp4"> </video>
    <div class="capa"></div>
</main>
</body>
</html>