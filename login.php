<?php  

    
  require_once('/opt/lampp/htdocs/Seguridad/conexion.php') ; 
 
    
?> 

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

    <form method="POST" action="http://localhost/Seguridad/validar_login.php"> 
        <input name="usuario">
        <input name="contraseña">
        <button type="submit" ></button>



    </form> 
    
        
        <script src="" async defer></script>
    </body>
</html>