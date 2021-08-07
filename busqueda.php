<!DOCTYPE html>
<?php  

    
 
    //require_once('/opt/lampp/htdocs/Seguridad/conexion.php') ; 
  //$conexion = mysqli_connect('127.0.0.1', 'root', '', 'Seguridad');
  $mysqli = new mysqli("127.0.0.1", "root", "", "Seguridad");
  print_r($_GET);
  $busqueda = $_GET['input_busqueda'];

  if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}else{
    printf("WRYYYYYYY"); 
}
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
<h1>Se busco:</h1>
        <div>
        
            <?php
                    
                    try {
                       // $pdo = new PDO($dsn, $user, $pass, $opt);
                        //$sql = "select *from PRODUCTO where nombre_p ='" .$busqueda. "'";
                        $sql = "select *from PRODUCTO where NOMBRE_P = '".$_GET['input_busqueda']."' " ; 
                        echo print_r($sql);
                       // $sql2 = $pdo -> query($sql);
                        
                        $mysqli -> multi_query($sql);

                        $result = $mysqli -> store_result();

                        while ($enumerar = $result->fetch_row()) {

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