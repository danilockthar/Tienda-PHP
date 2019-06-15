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

    <link href="css/edicion.css" rel="stylesheet">
	  
	

    <title>E-commerce Lista de compras</title>

</head>
<body>
	<div class="root">
			
		<div class="nav">
			<div class="boxlogo">
				<img src="imagenes/brodcontornodos.png">
			</div>
			<div class="boxlinks">
				<a href="index.php">HOME</a>
				<a href="#!">COLECCIÓN</a>
				<a href="#!">CONTACTO</a>
				
			</div>
			<div class="boxiconos">
				<a href="indexcarrito.php">Carrito (<?php
					echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
					
					
					?>) </a>
				
			
			</div>
		
		</div>
		
		<div class="bodycon">
			<div class="pantalla">
			
			<h3>Realizar pedido</h3>
				
				<?php if(!empty($_SESSION['CARRITO'])){
				
				
				?>
				<table>
					<tbody>
					<tr>
						<th width="40%" id="tabladesc">Descripcion</th>
						<th width="15%" id="tablacant">Cantidad</th>
						<th width="20%" id="tablaprecio">Precio</th>
						<th width="20%" id="tablasub">Subtotal</th>
						<th width="5%">---</th>
						
					</tr>
						<?php $total = 0;?>
						<?php foreach($_SESSION['CARRITO'] as $indice => $producto) {?>
						<tr>
						<td width="40%"><?php echo $producto['nombre']?></td>
						<td width="15%"><?php echo $producto['cantidad']?></td>
						<td width="20%"><?php echo $producto['precio']?></td>
						<td width="20%">$ <?php echo number_format($producto['precio'] * $producto['cantidad'], 2)?></td>
							
							<td width="5%">
								<form action="" method="POST">
								<input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY);?>">
								<input type="submit" name="add" value="Eliminar">
									
									</form>
									</td>
							
						
					</tr>
						<?php $total = $total + ($producto['precio'] * $producto['cantidad']);?>
						<?php }?>
						
						<tr>
							<td></td>
							<td></td>
							<td class="tdtotal" width="60%"><h3>Total</h3></td>
							<td width="35%" class="tdtotal"><h3>$ <?php echo number_format($total,2);?></h3></td>
							<td width="5%" class="tdtotal"></td>
						</tr>
				
					
					</tbody>
						 
				
				
				
				
				</table>
				
				<form method="POST" action="pagar.php" class="formacontacto">
					<div class="datoscontacto">
						<h4>Datos de contacto</h4>
						<input type="text" name="fname" placeholder=" Nombre" required>
						<input type="text" name="lname" placeholder=" Apellido" required>
						<input type="text" name="email" placeholder=" Email" required>
						<input type="text" name="telefono" placeholder=" Telefono" required>
					
					</div>
					<div class="datosenvio">
						<h4>Datos de envío</h4>
						<input type="text" name="direccion" placeholder=" Direccion" required>
						<input type="text" name="cpostal" placeholder=" Código postal" required>
						<input type="text" name="ciudad" placeholder=" Ciudad" required>
						<select name="provincia" required>
							<option value="Estado/Provincia">Estado/Provincia</option>
							<option value="Buenos Aires">Buenos Aires</option>
							<option value="Ciudad Autónoma de Buenos Aires">Ciudad Autónoma de Buenos Aires</option>
							<option value="Catamarca">Catamarca</option>
							<option value="Chaco">Chaco</option>
							<option value="Chubut">Chubut</option>
							<option value="Córdoba">Córdoba</option>
							<option value="Corrientes">Corrientes</option>
							<option value="Entre Ríos">Entre Ríos</option>
							<option value="Formosa">Formosa</option>
							<option value="Jujuy">Jujuy</option>
							<option value="La Pampa">La Pampa</option>
							<option value="La Rioja">La Rioja</option>
							<option value="Mendoza">Mendoza</option>
							<option value="Misiones">Misiones</option>
							<option value="Neuquén">Neuquén</option>
							<option value="Río Negro">Río Negro</option>
							<option value="Salta">Salta</option>
							<option value="San Juan">San Juan</option>
							<option value="San Luis">San Luis</option>
							<option value="Santa Cruz">Santa Cruz</option>
							<option value="Santa Fe">Santa Fe</option>
							<option value="Santiago del Estero">Santiago del Estero</option>
							<option value="Tierra del Fuego">Tierra del Fuego</option>
							<option value="Tucumán">Tucumán</option>
							
						
						</select>
					</div>
					<div class="textoenvio">
						<h4>Mensaje</h4>
					<textarea>
						
					</textarea>
					
					</div>
				
					<button type="submit" name="add" value="addpedido">REALIZAR PEDIDO</button>
				
				</form>
				
			<?php }else{ ?>
				<h3>No hay productos en nuestro carrito</h3>
			
				<?php } ?>
			</div>
		
			
		
		</div>
		
		<div class="footer">
			
		
		
		
		
		</div>
		
		
		
		
			
			
			
			
	</div>
</body>
	
	
</html>