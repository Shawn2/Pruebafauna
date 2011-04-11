<?php 
class Carrito_model extends CI_Model{
       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
           // $this->load->library('cart');
           $this->load->model('producto_model');
       } 
		public function esta ($cod_producto, $carrito){
			// Si existe devuelve el producto
			foreach ($carrito as $producto) if ($producto['id'] == $cod_producto) return $producto;
			return null;
		}
		
       public function eliminar($rowid){
	       	$data_update = array(
               			'rowid' => $rowid,
               			'qty'   => 0
           		 		);
	       	$this->cart->update($data_update);
       }
       
       public function obtener_producto_carrito ($producto_cod){
       		$carrito =  $carrito = $this->cart->contents(); 
       		foreach ($carrito as $fila) {
       			if ($fila->id === $producto_cod) return $fila;
       		}
       }
       
       public function obtener_carrito(){
       		 $carrito = $this->cart->contents(); 

       		 // Añadimos la foto del producto 
       		 foreach ($carrito as $indice => $producto){
       		 	$producto_bd = $this->producto_model->obtener_foto_producto($producto['id']);
       		 	$carrito[$indice]['foto'] = $producto_bd->foto;
       		 }
       		 
       		 return $carrito;
       }
       
       public function procesar_pedido (){
       		$datos = array('cod_usuario' => $this->session->userdata('id'),
						   'fecha' => time());
       		
       		$this->db->insert('pedido', $datos);
       		
       		$carrito = $this->cart->contents();
       		
       		foreach($carrito as $producto){
	       		$datos = array('cod_producto' => $producto['id'],
							   'cantidad' => $producto['qty']);
       			$this->db->insert('pedido_producto', $datos_producto);
       		}
       }
}


?>