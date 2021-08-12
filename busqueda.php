<!DOCTYPE html>
<?php



require_once('/opt/lampp/htdocs/Seguridad/conexion.php') ; 
$pdo = new PDO($dsn, $user, $pass, $opt);
//$conexion = mysqli_connect('127.0.0.1', 'root', '', 'Seguridad');
$mysqli = new mysqli("127.0.0.1", "root", "", "Seguridad");
//print_r($_GET);


if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
} else {
    //printf("fallooo"); 
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
    <nav class="navbar navbar-expand-xl navbar_intems " id="l"> <a class="navbar-brand" href="https://localhost/Seguridad/home.php">Home</a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" id="narv"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav"> <a class="nav-item nav-link active" href="#"><span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link disabled" href="#"></a>
            </div>
        </div>
    </nav>

</header>

<body>
    <br>

<div class="row">
<div class="col-md-6">
<h2 class="text-center">Se busco:  <b>  <?php echo print_r($_GET['input_busqueda'],true); ?> </b></h2>
</div>
   
    <div class="text-center">
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
       
            <?php


            try {
                //! metodo vulnerable a sqli injection 
              
               /* $sql = $mysqli -> prepare("select *from PRODUCTO where NOMBRE_P = '" . $_GET['input_busqueda'] . "' ");          
                 $sql -> execute(); 
             
                $resultado = $sql->get_result();
                while ($datos = $resultado->fetch_assoc() ) {

              */
                //? VERSION SEGURA CON BIND PARAM         
                
                $sql = $pdo -> prepare("select *from PRODUCTO where NOMBRE_P = ?"); 

                $busqueda = $_GET['input_busqueda']; 
                $sql->bindParam(1, $_GET['input_busqueda'], PDO::PARAM_STR);
                
                $sql->execute();



                while ($datos = $sql->fetch()) { 

            ?>
        
      
                        <tr>

                            <td><?php echo $datos['NOMBRE_P']; ?></td>

                            <td><img src=<?php echo $datos['FOTO'] ?>> </td>
                            <td><?php echo $datos['DESCRIPCION'] ?> </td>







                    <?php }
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }


                    ?>
                        </tr>
                    </tbody>
                </table>
            </div>






        </div>



           
    
  
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Consulta 
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Consulta que se lanzo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
        $sql = "select *from PRODUCTO where NOMBRE_P = '" . $_GET['input_busqueda'] . "' ";
        
        print_r($sql)
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
       
      </div>
    </div>
  </div>
</div>
    
    
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>