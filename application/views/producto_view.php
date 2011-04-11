<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'> 
<?php 
$data = array(
               'id'      => $producto->cod,
               'qty'     => 1,
               'price'   => $producto->precio,
               'name'    => $producto->nombre
            );
            
           $str = $this->uri->assoc_to_uri($data);
?>
<div class='zoom_producto grid_10 push_1 producto'>
<?php echo "<img src=".base_url()."images/".$producto->foto.">"; ?> 
<p><?php echo $producto->nombre; ?></p>
<p class="precio"> <?php echo $producto->precio; ?> &#8364;</p> 
<br><p>Descripci&oacute;n:</p>
<div class="descripcion"><?php echo $producto->descripcion; ?></div>

<p><?php echo anchor('/carrito/incluir/'.$str, 'A&ntilde;adir al carro')?></p>
<p><?php echo anchor('/producto/index/'.$producto->cod_subcategoria, 'Atras')?></p>
</div>


<div class=clear></div>
</div>
</div> <!--  Fin Contenido -->