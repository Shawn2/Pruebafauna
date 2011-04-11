<!--  Menu Horizontal -->
<div class='clear'>&nbsp;</div> 
<div class='grid_10 push_2'>

<div class='menu_horizontal'>
<div class='grid_5'>
<ul>
	<li><?php echo anchor('inicio', 'Inicio');?></li>
	<li><?php echo anchor('informacion', 'Informacion');?></li>
	<li><?php echo anchor('contactar', 'Contactar');?></li>
</ul>
</div>
<div class ='grid_3 push_2'>
<p>
<?php 
echo anchor('cuenta/index', 'Mi cuenta').' ';
if ($this->session->userdata('logged_in') === TRUE){
	echo 'Bienvenido '.$this->session->userdata('usuario').'. ';
	echo anchor('cuenta/logout', 'Salir');
}
?>
</p>
</div>
<div class='clear'>&nbsp;</div> 

</div>
</div> <!--  Fin Menu Horizontal -->

<!--  Menu Vertical -->
<div class='clear'>&nbsp;</div> 
<div class='grid_2'> 

<div class='menu_vertical'>

	<div>
	ANIMALES
	<ul>
	<?php foreach ($menu as $fila) {
		 if ($fila['categoria']->tipo == 'animales') {
	         echo '<li>'.$fila['categoria']->nombre.'</li>';
	         if (count($fila['subcategorias']) > 0){ // Si existen subcategorias
		         echo'<ul>';
		         foreach ($fila['subcategorias'] as $sub_fila) {
		         	echo '<li>'.anchor('producto/index/'.$sub_fila->cod, $sub_fila->nombre).'</li>';
		         }
		         echo'</ul>';
        	 }
         } 
	}
	?>
	</ul>
	</div>
	
	<div>
	ARTICULOS
	<ul>
	<?php foreach ($menu as $fila){
		 if ($fila['categoria']->tipo == 'articulos') {
	         echo '<li>'.$fila['categoria']->nombre.'</li>';
	         if (count($fila['subcategorias']) > 0){ // Si existen subcategorias
		         echo'<ul>';
		         foreach ($fila['subcategorias'] as $sub_fila) {
		         	echo '<li>'.anchor('producto/index/'.$sub_fila->cod, $sub_fila->nombre).'</li>';
		         }
		         echo'</ul>';
        	 }
         } 
	}
	?>
	</ul>
	</div>

</div>

 </div> <!--  Fin Menu Vertical -->