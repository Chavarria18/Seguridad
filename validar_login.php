<?php  

try {

include '/opt/lampp/htdocs/Seguridad/conexion.php' ; 
echo "POST";
print_r($_POST);
$conexion = mysqli_connect('127.0.0.1', 'root', '', 'Seguridad');
$pdo = new PDO($dsn, $user, $pass, $opt); 



$usuario = $_POST['usuario'];
$contra = $_POST['contraseña'];


//!metodo de hacer login vulnerable 

$sql = "select *from USUARIOS where NOMBRE_U ='" . $usuario . "'   and contraseña = '" . $contra . "'  " ;

echo $sql;
$result = mysqli_query($conexion, $sql);



if(mysqli_num_rows($result) == 1){
    echo "algo";
    header('location:http://localhost/Seguridad/home.php'); 
}else{
    header('location:http://localhost/Seguridad/login.php?error=true'); 

}

// ?Hot swap, login utilizando bindparam 
/*

$sql = $pdo -> prepare("select *from USUARIOS where NOMBRE_U = ?   and contraseña = ?  "); 


$sql->bindParam(1, $usuario, PDO::PARAM_STR);
$sql->bindParam(2, $contra, PDO::PARAM_STR);
$sql->execute();



while ($row = $sql->fetch()) {
    $usuariov = $row['NOMBRE_U'];  
   $contrav = $row['CONTRASEÑA']; 
}
echo $usuariov; 
echo $contrav;
echo $usuariov; 
echo $contrav;

if($usuariov == $usuario && $contra == $contrav){
    header('location:http://localhost/Seguridad/home.php'); 
}else{
    header('location:http://localhost/Seguridad/login.php?error=true'); 
}

*/


} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}


?>