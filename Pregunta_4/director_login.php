<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>FACULTAD DE CIENCIAS PURAS Y NATURALES</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
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
	<body>

	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		 
			<center>
				<h1>Pagina Administrativa Director</h1>
				
				<h3>
				<?php
				session_start();

				if(!isset($_SESSION['director_login']))	
				{
					header("location: ../index.php");  
				}

				if(isset($_SESSION['estudiante_login']))	
				{
					header("location: estudiante_login.php");	
				}

				if(isset($_SESSION['docente_login']))	
				{
					header("location: docente.php");
				}
				
				if(isset($_SESSION['director_login']))
				{
				?>
					Bienvenido,
				<?php
						echo $_SESSION['director_login'];
				}
				?>
				</h3>
					
			</center>
			<a href="cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
            <hr>
		</div>
		
		<br><br><br>
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h1> Estos son los promedios segun los departamentos.<h1>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>COD DEPARTAMENTO</td>
										    <td>PROMEDIO DE NOTAS</td>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									include 'DBconect.php';
									$sql="SELECT xp.departamento,AVG(xi.nota1+xi.nota2+xi.nota3+xi.nota_final)promedio
										FROM inscripcion xi,persona xp
										where xi.ci_estudiante =xp.ci
										GROUP by xp.departamento";
										$resultado=mysqli_query($db,$sql);
										while($filas=mysqli_fetch_array($resultado)){
											echo "</tr>";
											if($filas['departamento']=='01'){
												echo "<td> CHUQUICADA  (".$filas['departamento'].")</td>";
											}else{
												if($filas['departamento']=='02'){
													echo "<td> LA PAZ  (".$filas['departamento'].")</td>";
												}
												else{
													if($filas['departamento']=='03'){
														echo "<td> COCHABAMBA  (".$filas['departamento'].")</td>";
													}
													else{
														if($filas['departamento']=='04'){
															echo "<td> ORURO  (".$filas['departamento'].")</td>";
														}
													}
												}
											}
											echo "<td>".$filas['promedio']."</td>";
											echo "</tr>";

											}
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
		
	</div>
			
	</div>
										
	</body>
</html>