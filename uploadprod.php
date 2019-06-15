<?php
	include_once 'config/dtbcon.php';


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv=”content-language” content=”en-ES”/>
      <!-- FONT AWESOME ICONOS-->
    <link href="https://fonts.googleapis.com/css?family=Racing+Sans+One" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coiny|Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans|Fjalla+One|Russo+One|Squada+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet">

      <!-- FUENTES: OPEN SANS, ROBOTO, PACIFICO, COINY, EXPLETUS SANS, FJALLA ONE, RUSSO ONE, SQUADA ONE , NOTO SERIF-->
      <!-- FONT AWESOME ICONOS-->

	  

      <!-- META TAG VIEWPORT PARA HACER EL DISEÑO RESPONSIVE-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- META TAG VIEWPORT PARA HACER EL DISEÑO RESPONSIVE-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/edicion.css" rel="stylesheet">

    <title>E-commerce Index</title>

</head>
<body>
	<div class="root">
			
		<div class="nav">
			<div class="boxlogo">
				<img src="imagenes/brodcontornodos.png">
			</div>
			<div class="boxlinks">
				<a href="#!">HOME</a>
				<a href="#!">COLECCIÓN</a>
				<a href="#!">CONTACTO</a>
				
			</div>
			<div class="boxiconos">
				<a href="#!"><i class="fas fa-store fa-2x"></i></a>
				
			
			</div>
		
		</div>
		
		<div class="bodycon">
			<div class="productos">
				<form action="newproduct.php" method="post" enctype="multipart/form-data">
					<label>Titulo:</label>
					<input type="text" name="titulo" placeholder=" Ingrese un titulo">
					<label>Descripcion:</label>
					<input type="text" name="descripcion" placeholder=" Ingrese una descripcion">
					<label>Imagen:</label>
					<input type="file" name="imagen" placeholder=" Ingrese una imagen">
					<label>Precio:</label>
					<input type="number" name="precio" placeholder=" Ingrese un precio">
					<label>Stock:</label>
					<input type="number" name="cantidad" placeholder=" Ingrese un stock">
					<label>Brand:</label>
					<input type="text" name="marca" placeholder=" Ingrese la marca">
				
					<input type="submit" name="submit">
				</form>
			
			
			
			</div>
		
		
		</div>
		
		<div class="footer">
			
		
		
		
		
		</div>
		
		
		
		
			
			
			
			
	</div>
</body>
	
	
</html>