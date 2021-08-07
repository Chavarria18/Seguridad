<?php  

try {
    include '/opt/lampp/htdocs/Seguridad/conexion.php' ; 
echo "POST";
print_r($_POST);
$conexion = mysqli_connect('127.0.0.1', 'root', '', 'Seguridad');
$usuario = $_POST['usuario'];
$contra = $_POST['contraseña'];



$pdo = new PDO($dsn, $user, $pass, $opt);           
$sql = "select *from USUARIOS where NOMBRE_U ='" . $usuario . "'   and contraseña = '" . $contra . "'  " ;
//$busqueda_usuario = $pdo -> query("select *from USUARIOS where NOMBRE_U ='".$usuario."'");
 echo $sql;
$result = mysqli_query($conexion, $sql);


//login inseguro 
if(mysqli_num_rows($result) == 1){
    echo "algo";
    header('location:http://localhost/Seguridad/home.php'); 
}else{
    header('location:http://localhost/Seguridad/login.php'); 

}

/*
echo "LOS USUARIOS";
' or ''='
while ($row = mysqli_fetch_array($result)){
    $usuariov = $row['NOMBRE_U'];

    $contraval = $row['CONTRASEÑA']; 
}

echo "LOS USUARIOS";
echo $usuariov; 
echo "000";
echo $contraval; 
    

if($usuario == $usuariov  && $contraval == $contra ){
    echo "si es el usuario y si es la contraseña"; 
   
    header('location:http://localhost/Seguridad/home.php'); 
}else{
    header('location:http://localhost/Seguridad/login.php'); 
}
  */


} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}


?>