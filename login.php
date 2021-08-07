<?php


require_once('/opt/lampp/htdocs/Seguridad/conexion.php');


?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://localhost/Seguridad/style.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/grids-responsive-min.css" />
</head>

<body>
  
    <div class="pure-g">

        <div class="pure-u-1 pure-u-md-1-3" >
            <p></p>
        </div>
       

        <div class="pure-u-1 pure-u-md-1-3">
            
        </div>
        <div class="pure-u-1 pure-u-md-1-3" id="login">
            <p>

            <form method="POST" action="http://localhost/Seguridad/validar_login.php" class="pure-form pure-form-stacked" id="form-login">
                <label>Usuario</label>
                <input name="usuario">
                <label>Contraseña</label>
                <input name="contraseña">
                <button type="submit" class="pure-button pure-button-primary">Login</button>



            </form>
            </p>
        </div>
    </div>




    <script src="" async defer></script>
</body>

</html>