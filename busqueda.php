<!DOCTYPE html>
<?php  

    
 
    //require_once('/opt/lampp/htdocs/Seguridad/conexion.php') ; 
  //$conexion = mysqli_connect('127.0.0.1', 'root', '', 'Seguridad');
  $mysqli = new mysqli("127.0.0.1", "root", "", "Seguridad");
  //print_r($_GET);
  $busqueda = $_GET['input_busqueda'];

  if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}else{
    //printf("WRYYYYYYY"); 
}
?> 

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="http://localhost/Seguridad/homes.css">
    </head>
    <header>
    <nav class="navbar navbar-expand-xl navbar_intems " id="l"> <a class="navbar-brand" href="#">Home</a> 
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> 
          <span class="navbar-toggler-icon" id="narv"></span> </button> <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> 
            <div class="navbar-nav"> <a class="nav-item nav-link active" href="#">Link<span class="sr-only">(current)</span></a> 
                <a class="nav-item nav-link disabled" href="#"></a> </div> </div>
              </nav>

    </header>
    <body>
        <br>
        <h1 class="text-center">Se busco:</h1>
        <div class="text-center">
        
        <h3 class="text-center">
            <?php
                    
                  
                    try {
                       // $pdo = new PDO($dsn, $user, $pass, $opt);
                        //$sql = "select *from PRODUCTO where nombre_p ='" .$busqueda. "'";
                        $sql = "select *from PRODUCTO where NOMBRE_P = '".$_GET['input_busqueda']."' " ; 
                       echo print_r($_GET['input_busqueda']);
                       // $sql2 = $pdo -> query($sql);
                        
                        $mysqli -> multi_query($sql);

                        $result = $mysqli -> store_result();

                        while ($enumerar = $result->fetch_row()) {

                        ?>
        </h3>    
        <div class="col-md-6">
            <h3 class="text-center"> Producto </h3>
            <div class=" table-responsive-md">
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Descripcion</th>
                   
                    </tr>
                </thead>
                <tbody>
                <tr> 
                          
                          <td><?php echo $enumerar[1] ?></td>
                      
                         <td><?php echo $enumerar[2] ?> </td>
                         <td><?php echo $enumerar[3] ?> </td>
                      
                      
                      
                        
                      


                        <?php }
                    }catch (Exception $e) {
                        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    }


                    ?>
                    </tr>
                </tbody>
                </table>
        </div>






     
        <script src="" async defer></script>
    </body>
</html>