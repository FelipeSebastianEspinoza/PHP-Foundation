<?php
try{
    $base=new PDO("mysql:host=localhost; dbname=tesis", "root", "");//La conexion
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//le asignamos altribbutos
    $sql="SELECT * FROM USUARIO WHERE USUARIO= :login AND PASSWORD= :password";//consulta
    $resultado=$base->prepare($sql);
    $login=htmlentities(addslashes($_POST["login"]));//le quitamos signos raros para seguridad
    $password=htmlentities(addslashes($_POST["password"]));
    $resultado->bindValue(":login", $login);//el valor que tomamos antes
    $resultado->bindValue(":password",$password);
    $resultado->execute();
    $numero_registro=$resultado->rowCount();//para ver que no este vacia
    if($numero_registro!=0){
		$row =$resultado->fetch(PDO::FETCH_ASSOC);//para los provilegios
        $rol=$row["tipo"];//aqui tomamos los valores de la consulta
        $nombre=$row["nombre"];
		$id=$row["id"];
        session_start(); 
		$_SESSION["nombre"]=$nombre;//aqui agregamos a la session
		$_SESSION["id"]=$id;
		$_SESSION["tipo"]=$rol;
        $_SESSION["usuario"]=$_POST["login"];
		
		switch($_SESSION["tipo"]){
             case 1:
                header("Location:MapaPrueba.php");
             break;
             case 2:
               header("Location:index.php");
            break;
        }
		
    }else{
        header("location:index.php?datos_incorrectos");
		 
    }
}catch(Exception $e){
    die("Error: " . $e->getMessage());

}
?>