<?php
include "DBconect.php";

if ($_SERVER["REQUEST_METHOD"]=="GET")
{		echo "entro aqui get";
	if (isset($_GET["ci"]))
	{
		$ci = $GET["ci"];
		$sql = $db->prepare("SELECT * from persona where ci=:ci");
		$sql->bindValue(':ci',$ci);
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 existen datos");
		echo json_encode($sql->fetchAll());
		exit;
	}
	else
	{
		//echo "entro falso get";
		$sql = $db->prepare("SELECT * from persona");
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 existen datos");
		echo json_encode($sql->fetchAll());
		exit;
	}
	header("HTTP/1.1 400 Requerimiento inexistente");
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{	//echo "entro post";
	$agregar="INSERT into persona values(:ci,:nombre_completo,:fecha_nac,:departamento)";
	$ci = $_GET["ci"];
	$nombre_completo = $_GET["nombre_completo"];
	$fecha_nac = $_GET["fecha_nac"];
	$departamento = $_GET["departamento"];
	$sql = $db->prepare($agregar);
	$sql->bindValue(':ci',$ci);
	$sql->bindValue(':nombre_completo',$nombre_completo);
	$sql->bindValue(':fecha_nac',$fecha_nac);
	$sql->bindValue(':departamento',$departamento);
	//$sql->execute();
	if($sql->execute()){
		echo "AGREGACION SATISFACTORIA";
	}
	$state=$db->lastInsertId();
	if ($state)
	{
		header("HTTP/1.1 200 insercion correcta");
		echo json_encode($state);
		exit;
	}
}
if ($_SERVER["REQUEST_METHOD"]=="DELETE")
{		echo "entro adelete";
	$ci = $_GET["ci"];
	$sql = $db->prepare("DELETE from persona where ci=:ci");
	$sql->bindValue(':ci',$ci);
	if($sql->execute()){
		echo "ELIMINACION SATISFACTORIA";
	}
	
	header("HTTP/1.1 200 borrado");
	exit;
}

if($_SERVER["REQUEST_METHOD"]=="PUT"){
	$nombre_completo = $_GET['nombre_completo'];
	$fecha_nac = $_GET['fecha_nac'];
	$departamento = $_GET['departamento'];
	$ci = $_GET['ci'];
	$edit="UPDATE persona set nombre_completo='".$nombre_completo."',fecha_nac='".$fecha_nac."', 
	departamento='".$departamento."'";
    $edit.="where ci=".$ci;
	$sql = $db->prepare($edit);
	if($sql->execute()){
		echo "CAMBIOS HECHOS SATISFACTORIAMENTE";
	}
	exit;

}

?>