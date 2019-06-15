<?php
	
	include_once 'config/dtbcon.php';
	include 'shopcart.php';
	require_once 'mercadopago.php';



	

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
			
			<?php 
				if($_POST){
					
					
					// Datos de contacto //
					$correo = $_POST['email'];
					$nombre = $_POST['fname'];
					$apellido = $_POST['lname'];
					$telefono = $_POST['telefono'];
					
					// Datos de envio //
					
					$direccion = $_POST['direccion'];
					$cpostal = $_POST['cpostal'];
					$ciudad = $_POST['ciudad'];
					$provincia = $_POST['provincia'];
					
					
					$descrip = " TEST ";
					$status = "pendiente";
					
					$total = 0;
					$SID = session_id();
					foreach($_SESSION['CARRITO'] as $indice => $producto) {
						$total = $total + ($producto['precio'] * $producto['cantidad']);

					}
					
					$sentencia = $conn->prepare("INSERT INTO `ventas` (`ClaveTransaccion`, `DatosMP`, `Correo`, `Total`, `status`) VALUES (? , ?, ?, ?, ?);");
					$sentencia ->bind_param('sssis', $SID, $descrip , $correo, $total, $status);
					$sentencia ->execute();
					
					
					echo "<h3> Su total a pagar es: " . $total . "</h3>";
					
				}	
					
					$TITLE = "Mi compra" ;
				
				$mp = new MP(MPID, MPSECRETID);

					$preference_data = array(
	"items" => array(
		array(
			"id" => "Code",
			"title" => "Compra completa",
			"currency_id" => "ARS",
			"picture_url" =>"https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
			"description" => "Pedido",
			"category_id" => "Varios",
			"quantity" => 1,
			"unit_price" => $total
		)
	),
	"payer" => array(
		"name" => $nombre ,
		"surname" => $apellido,
		"email" => $correo,
		"date_created" => "2014-07-28T09:50:37.521-04:00",
		"phone" => array(
			"area_code" => "11",
			"number" => "4444-4444"
		),
		"identification" => array(
			"type" => "DNI",
			"number" => "12345678"
		),
		"address" => array(
			"street_name" => "Street",
			"street_number" => 123,
			"zip_code" => "1430"
		)
	),
	"back_urls" => array(
		"success" => "localhost/daniphp/tienda/index.php?msg=exito",
		"failure" => "localhost/daniphp/tienda/index.php?msg=sin%concretar",
		"pending" => "localhost/daniphp/tienda/index.php?msg=pendiente"
	),
	"shipments" => array(
		"receiver_address" => array(
			"zip_code" => "1430",
			"street_number"=> 123,
			"street_name"=> "Street",
			"floor"=> 4,
			"apartment"=> "C"
		)
	),
	"notification_url" => "https://www.your-site.com/ipn",
	"external_reference" => "Reference_1234",
	"expires" => false,
	"expiration_date_from" => null,
	"expiration_date_to" => null
);

$preference = $mp->create_preference($preference_data);
				

					
				
				
				
			?>
					<a href="<?php echo $preference["response"]["init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall">Pay</a>
        <script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>
			
			</div>
		
			
		
		</div>
		
		<div class="footer">
			
		
		
		
		
		</div>
		
		
		
		
			
			
			
			
	</div>
</body>
	
	
</html>