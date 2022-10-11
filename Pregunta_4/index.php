<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<title>FACULTAD DE CIENCIAS PURAS Y NATURALES</title>
		
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
	<body background="img/fondo2.jpg">
<?php
include 'DBconect.php';
session_start();
if(isset($_SESSION["director_login"]))	//Condicion admin
{
	header("location: director_login.php");	
}
if(isset($_SESSION["estudiante_login"]))	//Condicion personal
{
	header("location: estudiante_login.php"); 
}
if(isset($_SESSION["docente_login"]))	//Condicion Usuarios
{
	header("location: docente_login.php");
}

if(isset($_REQUEST['btn_login']))	
{
	$usuario =$_REQUEST["txt_usuario"];	//textbox nombre "txt_email"
	$contra	=$_REQUEST["txt_contra"];	//textbox nombre "txt_password"
		
	if(empty($usuario)){						
		$errorMsg[]="Por favor ingrese su Usuario";	//Revisar email
	}
	else if(empty($contra)){
		$errorMsg[]="Por favor ingrese Password";	//Revisar password vacio
	}
	else if($usuario AND $contra)
	{
		try
		{   include 'DBconect.php';
			$sql="select usuario ,contra, rol 
					from acceso
					where usuario = '".$usuario."' and contra = '".$contra."'";
			$resultado=mysqli_query($db,$sql);
			while($row=mysqli_fetch_array($resultado)){
				
				$dbusuario	=$row["usuario"];
				$dbcontra	=$row["contra"];
                $dbrol	=$row["rol"];
			}
			if($usuario!=null AND $contra!=null )	
			{
				
					if($usuario==$dbusuario and $contra==$dbcontra)
					{
						switch($dbrol)		//inicio de sesión de usuario base de roles
						{
							case "director":
								$_SESSION["director_login"]=$usuario;			
								$loginMsg="docente: Inicio sesión con éxito";	
								header("refresh:1;director_login.php");	
								break;
								
							case "estudiante";
								$_SESSION["estudiante_login"]=$usuario;				
								$loginMsg="Estudiante: Inicio sesión con éxito";		
								header("refresh:1;estudiante_login.php");	
								break;
								
							case "docente":
								$_SESSION["docente_login"]=$usuario;				
								$loginMsg="Cliente: Inicio sesión con éxito";	
								header("refresh:1;docente_login.php");		
								break;
								
							default:
								$errorMsg[]="usuario o contraseña o rol incorrectos";
						}
					}
					else
					{
						$errorMsg[]="usuario o contraseña o rol incorrectos";
					}
				
			}
			else
			{
				$errorMsg[]="usuario o contraseña o rol incorrectos";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
			//echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}		
	}
	else
	{
		$errorMsg[]="usuario o contraseña o rol incorrectos";
	}
}
?>

	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong><?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($loginMsg))
		{
		?>
			<div class="alert alert-success">
				<strong>ÉXITO ! <?php echo $loginMsg; ?></strong>
			</div>
        <?php
		}
		?> 


<div class="login-form">
<center><h2>Iniciar sesión</h2></center>
<img src="fcpn.png" height="350" width="350">

<form method="post" class="form-horizontal">
  <div class="form-group">
  <label class="col-sm-6 text-left">Usuario</label>
  <div class="col-sm-12">
  <input type="text" name="txt_usuario" class="form-control" placeholder="Ingrese Usuario" />
  </div>
  </div>
      
  <div class="form-group">
  <label class="col-sm-6 text-left">Password</label>
  <div class="col-sm-10">
  <input type="password" id="txt_contra" name="txt_contra" class="form-control" placeholder="Ingrese passowrd" />
  </div>
  <div class="col-md-2">
  <button type="button" onclick="mostrarContrasena()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" >
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
  </svg></button>
    <i class="bi bi-eye" type="button" onclick="mostrarContrasena()"></i>
</div>
  <script>
  function mostrarContrasena(){
      var tipo = document.getElementById("txt_contra");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
  </div>

  
  <div class="form-group">
  <div class="col-sm-12">
  <input type="submit" name="btn_login" class="btn btn-success btn-block" value="Iniciar Sesion">
  </div>
  </div>
  
  <div class="form-group">
  <div class="col-sm-12">
  ¿No tienes una cuenta? <a href="#"><p class="text-info">Registrar Cuenta</p></a>		
  </div>
  </div>
  <div class="form-group">
  <div class="col-sm-12">
  <a href="#"><p class="text-info">¿Olvidaste tu contraseña?</p></a>		
  </div>
  </div>
      
</form>
</div>
<!--Cierra div login-->
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>