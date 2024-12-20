<?php

	$blog = ControladorBlog :: ctrMostrarBlog();
	$categorias = ControladorBlog::ctrMostrarCategorias();
	$articulos = ControladorBlog::ctrMostrarArticulosInnerJoin(0, 5);
	$totalArticulos = ControladorBlog :: ctrPaginarArticulosBlog();
	$totalPaginas = ceil(count($totalArticulos)/5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php 

		$validarRuta = "";

		// Verificación de URL amigable
		if (isset($_GET["pagina"])) {

			foreach ($categorias as $key => $value) {

				if ($_GET["pagina"] == $value["ruta_categoria"]) {
			
					$validarRuta = "categorias";

					break;

				}

			}

			if($validarRuta == "categorias"){

				echo 
				
				'<title>'.$blog["titulo"].'-'.$value["ruta_categoria"].'</title>';
				'<meta name="title" content="'.$value["titulo_categoria"].'">';
				'<meta name="description" content="'.$value["descripcion_categoria"].'">';
	
				$palabras_clave = json_decode($value["p_claves_categoria"], true);
	
				$p_claves = "";
	
				foreach($palabras_clave as $key => $value){
	
					$p_claves .= $value. ", ";
				}
	
				$p_claves = substr($p_claves, 0 , -2);
	
				echo '<meta name="keywords" content="'.$p_claves. '">';
	
			}else {
	
				echo 
				
				'<title>'.$blog["titulo"].'</title>';
				'<meta name="title" content="'.$blog["titulo"].'">';
				'<meta name="description" content="'.$blog["descripcion"].'">';
	
				$palabras_clave = json_decode($blog["palabras_claves"], true);
	
				$p_claves = "";
	
				foreach($palabras_clave as $key => $value){
	
					$p_claves .= $value. ", ";
				}
	
				$p_claves = substr($p_claves, 0 , -2);
	
				echo '<meta name="keywords" content="'.$p_claves. '">';
	
			}

		}else{

			echo 
				
			'<title>'.$blog["titulo"].'</title>';
			'<meta name="title" content="'.$blog["titulo"].'">';
			'<meta name="description" content="'.$blog["descripcion"].'">';

			$palabras_clave = json_decode($blog["palabras_claves"], true);

			$p_claves = "";

			foreach($palabras_clave as $key => $value){

				$p_claves .= $value. ", ";
			}

			$p_claves = substr($p_claves, 0 , -2);

			echo '<meta name="keywords" content="'.$p_claves. '">';
		}
	?>
	
	<link rel="icon" href="vistas/img/icono.jpg">

	<!--=====================================
	PLUGINS DE CSS
	======================================-->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css?family=Chewy|Open+Sans:300,400" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

	<!-- JdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<link rel="stylesheet" href="vistas/css/plugins/jquery.jdSlider.css">

	<link rel="stylesheet" href="vistas/css/style.css">

	<!--=====================================
	PLUGINS DE JS
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<!-- JdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<script src="vistas/js/plugins/jquery.jdSlider-latest.js"></script>
	
	<!-- pagination -->
	<!-- http://josecebe.github.io/twbs-pagination/ -->
	<script src="vistas/js/plugins/pagination.min.js"></script>

	<!-- scrollup -->
	<!-- https://markgoodyear.com/labs/scrollup/ -->
	<!-- https://easings.net/es# -->
	<script src="vistas/js/plugins/scrollUP.js"></script>
	<script src="vistas/js/plugins/jquery.easing.js"></script>

</head>

<body>
    
	<?php 

		// Módulos fijos superiores
		include "paginas/modulos/header.php";
		include "paginas/modulos/redes-sociales-moviles.php";
		include "paginas/modulos/buscador-movil.php";
		include "paginas/modulos/menu.php";

		// Verificación de URL amigable
		if (isset($_GET["pagina"])) {

			$pagina_encontrada = false;

			if(is_numeric(isset($_GET["pagina"])){

				$desde = ($_GET["pagina"] -1 ) *5;

				$cantidad = 5;
				
				$articulos = ControladorBlog::ctrMostrarArticulosInnerJoin($desde, $cantidad);
				
			}else{

				foreach ($categorias as $key => $value) {

					if ($_GET["pagina"] == $value["ruta_categoria"]) {
	
						include "paginas/categorias.php";
	
						$pagina_encontrada = true;
	
						break;
	
					}
	
				}
			}
		}

		else if(is_numeric(isset($_GET["pagina"])) && $_GET["pagina"] <= $totalPaginas) {

			include "paginas/inicio.php";

		}

		// Si no se encuentra la categoría, carga el 404.php
		if (!$pagina_encontrada) {

			include "paginas/404.php";

		} else{

			include "paginas/inicio.php";
			
		}

		// Módulos fijos inferiores
		include "paginas/modulos/footer.php";

	?>

<input type="hidden" id="rutaActual" value="<?php echo $blog["dominio"]; ?>">
<script src="vistas/js/script.js"></script>
</body>

</html>