<?php
	//Para que podamos usar css
	header("Content-Type: text/css; charset: UTF-");
	$colorPrincipal = "white";
	$alineacion = "center";
	$margenTabla = "0 auto";
	$left = "left";
	$collapse = "collapse";
	$border = "solid 2px black";
	$_t2 = "50%";
	$_t1 = "25%";
	$_10px = "10px";
	$_0px = "0px";
	$blue = "blue";
	$white = "white";
?>
*{
	margin: <?php echo $_0px ?>;
	padding:<?php echo $_0px ?> ;
}

body{
	background: <?php echo "#317FF7 "?>;
	text-align: <?php echo "center"?>;
}
#medio{
	align: <?php echo "center"?>;
	margin-left: <?php echo "200px"?>; 
	background: <?php echo "red "?>;
	margin-right: <?php echo "200px"?>;
}
table{
	width: <?php echo $_t2 ?>;
	text-align: <?php echo "center" ?>;
	margin: <?php echo $margenTabla ?>;
}

th, td{
	border: <?php echo $border ?>;
	padding: <?php echo "10px"?>;
}

footer{
	margin: <?php echo "0px"?>;
	display: <?php echo "flex"?>;
	align-items: <?php echo "center"?>;
	padding: <?php echo "20px" ?>;
	background: <?php echo "#CD5C5C" ?>;
	color: <?php echo $white ?>;
	font-size: <?php echo "20px" ?>;
}
.title_column{
	text-align: <?php echo "center"?>;
}


#bienvenida{
	padding: <?php echo "20px" ?>;
	color: <?php echo "black" ?>;
	font-size: <?php echo "35px"?>;
}

thead{
	background-color: <?php echo "#F8D120 "?>;
	border-bottom: <?php echo "solid 5px #0F262D"?>;
	color: <?php echo "white"?>;
	text-align:  <?php echo "center"?>;
}

tr:hover td{
	background-color:<?php echo "black"?>;
	color: <?php echo "white"?>;
}

a{
	text-decoration: <?php echo "none" ?>;
}

a:hover{
	color: <?php echo "white"?>;
}

#logoUmsa{
	margin: <?php echo "0px"?>;
}

#historia{
	margin: <?php echo "15px"?>;
}
img{
	margin: <?php echo "0"?>; 
	width: <?php echo "90px"?>;
	height: <?php echo "120px"?>;
	display: <?php echo "flex"?>;
	padding-left: <?php echo "20px"?>;
}

#tituloPrincipal{
	padding-left: <?php echo "15%" ?>;
	padding-right: <?php echo "10%" ?>;
}

header{
	margin: <?php echo "0px"?>;
	display: <?php echo "flex"?>;
	align-items: <?php echo "center"?>;
	padding: <?php echo "20px" ?>;
	background: <?php echo "#CD5C5C" ?>;
	color: <?php echo $white ?>;
	font-size: <?php echo "40px" ?>;
}
