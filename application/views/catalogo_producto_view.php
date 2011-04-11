<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'> 


<?php 
	foreach($productos as $fila){
		echo "<div class=\"producto grid_3 push_1\">"; 
		echo "<img src=".base_url()."images/".$fila->foto.">";
		echo "<div class=\"info\"><p>".$fila->nombre."</p>";
		echo "<p class=\"precio\">".$fila->precio." &#8364;</p>";
		//echo "<a onclick=\"Mostrar_Ocultar_Descripcion(".$fila->cod.")\" href=\"#\">+ mas</a>";
		echo "<a href=".base_url()."index.php/producto/mostrar/".$fila->cod."><img src=".base_url()."images/info.gif></a>";
		echo "</div>";
		echo "<div id='descripcion_".$fila->cod."' style=\"display:none\">";
		echo "Descripcion: <br>";
		echo $fila->descripcion;
		echo "</div>";		
		echo "</div>";	
	}
?>

<div class=clear></div>
</div>
</div> <!--  Fin Contenido -->