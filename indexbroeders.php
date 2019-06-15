<?php 
	include_once 'config/dtbcon.php';
	include 'shopcart.php';



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

    <link href="css/indexbroeders.css" rel="stylesheet">

    <title>E-commerce Index</title>

</head>
<body>
	<div class="root">
			
		<div class="nav">
			<div class="boxlogo">
				<h1>Tu Logo.</h1>
			</div>
			<div class="boxlinks">
				<a href="index.php">HOME</a>
				<a href="#!">PRODUCTOS</a>
				<a href="#!">CONTACTO</a>
				
			</div>
			<div class="boxiconos">
				<a href="indexcarrito.php">MIS COMPRAS (<?php
					echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
					
					
					?>)</a>
				
			
			</div>
		
		</div>
		
		<div class="bodycon">
			<div class="pantalla">
			
			<h3>Desarrollamos tu sitio web a la medida de tu negocio.</h3>
				<?php
					echo ($mensaje);
				
				?>
			
			</div>
			<div class="productos">
				<?php 
			$query= "SELECT * FROM productos ORDER BY id DESC";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
		
				while($row = $result->fetch_array(MYSQLI_ASSOC)){	?>
					<div class='boxes'>
						<form method="POST" action="">
						<img src='imagenes/<?php echo $row['imagen'];?>'>
							
						<h3><?php echo $row['nombre'];?></h3>
						<p>$ <?php echo $row['precio'];?></p>
						
							<input type="hidden" name="id" id="id"value="<?php echo openssl_encrypt($row['id'], COD, KEY) ; ?>">
							<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($row['nombre'], COD, KEY); ?>">
							<input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY)?>">
							<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row['precio'], COD, KEY); ?>">
						<input class="addbuton" type="submit" name="add" value="Agregar">
						
						</form>
						</div>
						
					
			<?php } ?>
			
			

			
			
			</div>
			
		
		</div>
		
		<div class="footer">
			
		
		
		
		
		</div>
		
		
		
		
			
			
			
			
	</div>
</body>
	
	
</html>