<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'> 

<div class='grid_8 push_2 carrito'>
<p>Hay un total de <?php echo $total_items;?> productos.</p>

<table>
<thead>
    <tr>
	  <th></th>
      <th></th>
      <th>Cantidad</th>
	  <th>Precio unidad</th>
	  <th>Precio total</th>
	  <th></th>
    </tr>
</thead>
<tfoot></tfoot>
<tbody>
  
<?php foreach ($carrito as $indice => $producto): ?>
    <tr>
		<td><?php echo "<img src=".base_url()."images/".$producto['foto']." class='carrito_img'>"; ?></td>
	    <td><?php echo $producto['name']; ?></td>
	    <td><?php echo $producto['qty']; ?></td>
	    <td><?php echo $producto['price'];?>&#8364</td>
	    <td><?php echo ($producto['price'] * $producto['qty']);?>&#8364</td>
	    <td><a href= '<?php echo base_url()?>index.php/carrito/eliminar/<?php echo $producto['rowid'];?>'><img src="<?php echo base_url().'images/x.png'?>"></a>
    </tr>
<?php endforeach; ?>

</tbody>
</table>
<p style="text-align: right">Total:&nbsp;<?php echo $total; ?>&#8364 &nbsp;&nbsp;</p>
<p><?php echo anchor('carrito/pedido', 'Procesar pedido'); ?></p>
</div>


<div class=clear></div>
</div>
</div> <!--  Fin Contenido -->