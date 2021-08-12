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
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <form id="form" method="GET" action="https://localhost/Seguridad/busqueda.php">
                    <input name="input_busqueda" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-lg btn-primary btn-block" id="primary">Buscar</button>
                </form>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-3">
        </div>
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
                            $sql = "select *from PRODUCTO";

                            $result = mysqli_query($conexion, $sql);
                            while ($enumerar = mysqli_fetch_array($result)) {
                        ?>

                                <tr>

                                    <td><?php echo $enumerar[1] ?></td>

                                    <td><img src=<?php echo $enumerar[2] ?>> </td>
                                    <td><?php echo $enumerar[3] ?> </td>






                            <?php }
                        } catch (Exception $e) {
                            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                        }


                            ?>
                                </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
            </div>

        </div>





        <script src="" async defer></script>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>