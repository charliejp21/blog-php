<?php

	if(isset($_GET["pagina"]) && is_numeric($_GET["pagina"])){

		$paginaActual = $_GET["pagina"];

	}else{

		$paginaActual = 1;

	}

?>
<!--=====================================
CONTENIDO INICIO
======================================-->

<div class="container-fluid bg-white contenidoInicio pb-4">
	
	<div class="container">
		
		<div class="row">
			
			<!-- COLUMNA IZQUIERDA -->

			<div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">

			<?php foreach ($articulos as $key => $value): ?>

				<!-- ARTÍCULO 01 -->

				<div class="row">
					
					<div class="col-12 col-lg-5">

						<a href="<?php echo $value["ruta_articulo"]; ?>"><h5 class="d-block d-lg-none py-3"><?php echo $value["titulo_articulo"]; ?></h5></a>
			
						<a href="<?php echo $value["ruta_articulo"]; ?>"><img src="<?php echo $value["portada_articulo"]; ?>" alt="<?php echo $value["titulo_articulo"];?>" class="img-fluid" width="100%"></a>

					</div>

					<div class="col-12 col-lg-7 introArticulo">
						
						<a href="articulos.html"><h4 class="d-none d-lg-block"><?php echo $value["titulo_articulo"]; ?></h4></a>
						
						<p class="my-2 my-lg-5"><?php echo $value["descripcion_articulo"]; ?></p>

						<a href="<?php echo $value["ruta_articulo"]; ?>" class="float-right">Leer Más</a>

						<div class="fecha"><?php echo $value["fecha_articulo"]; ?></div>

					</div>


				</div>

				<hr class="mb-4 mb-lg-5" style="border: 1px solid #79FF39">

			<?php endforeach?>
				
				<div class="container d-none d-md-block">
					
					<ul class="pagination justify-content-center" totalPaginas="<?php echo $totaPaginas; ?>" paginaActual="<?php echo $paginaActual; ?>"></ul>

				</div>

			</div>

			<!-- COLUMNA DERECHA -->

			<div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">

				<!-- SOBRE MI -->

				<div class="sobreMi">
					
					<?php 

						echo $blog["sobre_mi"];
					
					?>

				</div>

				<!-- Artículos destacados -->

				<div class="my-4">
					
					<h4>Artículos Destacados</h4>

					<div class="d-flex my-3">
						
						<div class="w-100 w-xl-50 pr-3 pt-2">
							
							<a href="articulos.html">

								<img src="vistas/img/articulo10.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">

							</a>

						</div>

						<div>

							<a href="articulos.html" class="text-secondary">

								<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							</a>

						</div>

					</div>

					<div class="d-flex my-3">
						
						<div class="w-100 w-xl-50 pr-3 pt-2">
							
							<a href="articulos.html">

								<img src="vistas/img/articulo09.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">

							</a>

						</div>

						<div>

							<a href="articulos.html" class="text-secondary">

								<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							</a>

						</div>

					</div>

					<div class="d-flex my-3">
						
						<div class="w-100 w-xl-50 pr-3 pt-2">
							
							<a href="articulos.html">

								<img src="vistas/img/articulo08.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">

							</a>

						</div>

						<div>

							<a href="articulos.html" class="text-secondary">

								<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							</a>

						</div>

					</div>


				</div>

				<!-- PUBLICIDAD -->

				<div class="my-4">
					
					<img src="vistas/img/ad01.jpg" class="img-fluid">

				</div>

				<div class="my-4">
					
					<img src="vistas/img/ad02.jpg" class="img-fluid">

				</div>	

				<div class="my-4">
					
					<img src="vistas/img/ad05.png" class="img-fluid">

				</div>	
				
			</div>

		</div>

	</div>

</div>
