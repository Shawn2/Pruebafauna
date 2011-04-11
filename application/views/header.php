
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title><?php echo $titulo?></title> 

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/960grid.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/estilos.css" />
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.corners.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/producto_redondeado.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/descripcion_producto.js"></script>

</head> 
 
<body> 

<!--  CONTAINER -->
<div class="container container_12">

<!--  Cabecera -->
<div class="grid_12">

<div class='header'>
	<!-- Logo -->	
	<div class="grid_3"> 
		<div class='header'>
			[ LOGO ]
		</div>		
	</div> 
	<!--  Fin Logo -->

	<!--  TITULO -->
	<div class="grid_6 "> 
		<div class='header'>
			[ TITULO ]<?php echo anchor('inicio', 'Fauna exotica')?> 
		</div>	
	</div>
	<!--  Fin Titulo -->
	
	<!-- Carro -->	
	<div class="grid_3"> 
		<div class='header'>
		<img src="<?php echo base_url();?>images/carrito.jpg"></img>
					 Total: <?php echo $this->cart->total().'&#8364<br>'; ?> 
					Tienes <?php echo $this->cart->total_items();?> productos.
					<?php echo anchor('/carrito/index/', 'Ver Carrito')?>
		</div>	
	</div> 
	<!--  Fin Carro -->
	
	<div class='clear'>&nbsp;</div> <!--  Colocacion Header -->
</div>
</div> <!--  Fin Cabecera -->
