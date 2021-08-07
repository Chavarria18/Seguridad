<!DOCTYPE html>
<?php  

    
  //require_once('/opt/lampp/htdocs/Seguridad/conexion.php') ; 
 
  $conexion = mysqli_connect('127.0.0.1', 'root', '', 'Seguridad');
?> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
<div>

<form method="GET" action ="https://localhost/Seguridad/busqueda.php">
    <input name="input_busqueda">
    <button type="submit">Buscar</button>
</form>
</div>

    <div>
        
            <?php
                    
                    try {
                        $sql = "select *from PRODUCTO";
                    
                        $result = mysqli_query($conexion, $sql);
                        while ($enumerar = mysqli_fetch_array($result)) {
                        ?>
                        
                        <h2><?php echo $enumerar[1] ?></h2> 
                        <p>
                        <?php echo $enumerar[2] ?> 
                        <?php echo $enumerar[3] ?> 
                        
                        </p>
                        
                      


                        <?php }
                    }catch (Exception $e) {
                        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    }


                    ?>
    </div>






     
        <script src="" async defer></script>
    </body>
</html>