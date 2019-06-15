<?php

	
		
		
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];
		$marca = $_POST['marca'];
		
		
		// TOMAR EL ARCHIVO SUBIDO //
		$currentpath = getcwd();
		$uploadpath = "/imagenes/";
		
		echo $currentpath;
		
		// Errores //
		
		$errores = [];
		
		$extensionesfile = ['jpg', 'png', 'jpeg'];
		
		$fileName = $_FILES['imagen']['name'];
		$fileSize = $_FILES['imagen']['size'];
		$fileTmpname = $_FILES['imagen']['tmp_name'];
		$fileType = $_FILES['imagen']['type'];
		
		
		$fileName = strtolower(str_replace(" ", "_", $fileName));
		
		
		$file_ext = explode('.',$fileName);
		$file_ext = end($file_ext);
		$file_ext = strtolower($file_ext);
		
//		$fileExt = strtolower(end(explode('.', $fileName)));
		
		$filePath = $currentpath . $uploadpath . basename($fileName);
		
		$realFile = $uploadpath . basename($fileName);
		
		
		if(isset($_POST['submit'])){
				include_once 'config/dtbcon.php';
			
				if(empty($titulo) || empty($descripcion) || empty($precio) || empty($marca) || empty($cantidad)){
					header("Location: uploadprod.php?error=camposvacios");
					exit();
					$errores = "Por favor rellene todos los campos";
				}
			
				if(file_exists($filePath)){ // Si el archivo ya existe no permite seguir //
					header("Location: uploadprod.php?error=estearchivoyexiste");
					exit();
					$errores = "Este archivo ya existe";
				}
			
				if($fileSize > 2000000){
					header("Location: uploadprod.php?error=archivodemasiadogrande");
					exit();
					$errores = "Este archivo es muy pesado";
				}
				if(!in_array($file_ext, $extensionesfile)){ // Si no existe la extension del archivo en el array de extensiones permitidas = ERROR //
					header("Location: uploadprod.php?error=archivo%invalido");
					exit();
					$errores = "Este archivo no es compatible";
				}
			
				if(empty($errores)){
					// Si no hay errores y esta todo autenticado se sube correctamente a la carpeta indicada y a la base de datos. //
					$didupload = move_uploaded_file($fileTmpname, $filePath);
					
					if($didupload){
						
						$query = "INSERT INTO productos (nombre, descripcion, imagen, precio, cantidad, marca_id) VALUES (?, ?, ?, ?, ?, ?)";
						$stmt = $conn->prepare($query);
						$stmt->bind_param('sssiii', $titulo, $descripcion, $fileName, $precio, $cantidad, $marca);
						$stmt->execute();
						
						header("Location: index.php?msg=success");
						exit();
					}
					
				}else{
					header("Location: uploadprod.php?error=algo%sucedio");
					exit();
				}
		}
		
		
		
		
		