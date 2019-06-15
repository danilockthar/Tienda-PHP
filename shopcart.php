<?php
	session_start();
	$mensaje = "";
	if(isset($_POST['add'])){
		switch($_POST['add']){
			case 'Agregar':
				if(is_numeric(openssl_decrypt($_POST['id'], COD, KEY))){
					$ID = openssl_decrypt($_POST['id'], COD, KEY);
					$mensaje .= "Ok ID correcto " . $ID . "<br>";
				}else{
					$mensaje .= "ID incorrecto ". $ID . "<br>";
				}
				if(is_string(openssl_decrypt($_POST['nombre'], COD, KEY))){
					$nombre = openssl_decrypt($_POST['nombre'], COD, KEY);
					$mensaje .= "Ok Nombre correcto " . $nombre . "<br>";
				}else {
					$mensaje .= "Nombre incorrecto " .$nombre . "<br>";
				}
				if(is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))){
					$precio = openssl_decrypt($_POST['precio'], COD, KEY);
					$mensaje .= "Ok PRECIO correcto $ " . $precio . "<br>";
				}else{
					$mensaje .= "Precio incorrecto $ ". $precio. "<br>";
				}
				if(is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))){
					$cantidad = openssl_decrypt($_POST['cantidad'], COD, KEY);
					$mensaje .= "Ok Cantidad correcto " . $cantidad . "<br>";
				}else{
					$mensaje .= "Cantidad incorrecto ". $cantidad . "<br>";
				}

				if(!isset($_SESSION['CARRITO'])){
					$producto = array(
						'ID' => $ID,
						'nombre' => $nombre,
						'precio' => $precio,
						'cantidad' => $cantidad
					);
					$_SESSION['CARRITO'][0] = $producto;
					$mensaje = "Producto correctamente agregado";

				}else{
					$idProductos = array_column($_SESSION['CARRITO'], "ID");

					if(in_array($ID, $idProductos)){
							echo "<script>alert('Este producto ya se encuentra en el carrito')</script>";

							$key = array_search($ID, $idProductos);
							$_SESSION['CARRITO'][$key]['cantidad']++;


							$mensaje = "Este producto ya se encuentra en el carro de compras";
					}else{
						$numeroProductos = count($_SESSION['CARRITO']);
					$producto = array(
						'ID' => $ID,
						'nombre' => $nombre,
						'precio' => $precio,
						'cantidad' => $cantidad
					);
					$_SESSION['CARRITO'][$numeroProductos] = $producto;
					$mensaje = "Producto correctamente agregado";
					}

//GIT PRUEBA asd

				}
//				$mensaje = print_r($_SESSION, true) . "<br>";
			break;
			case 'Eliminar':

				if(is_numeric(openssl_decrypt($_POST['id'], COD, KEY))){
					$ID = openssl_decrypt($_POST['id'], COD, KEY);
					foreach($_SESSION['CARRITO'] as $indice => $producto){
						if($producto['ID'] == $ID){
							unset($_SESSION['CARRITO'][$indice]);

							echo "<script> alert('Elemento borrado con exito'); </script>";
						}
					}
				}
			break;
		}
	}
