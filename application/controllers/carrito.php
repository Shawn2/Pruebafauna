<?php

class Carrito extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            
			$this->load->helper('url');
   			$this->load->model('carrito_model');
   			$this->load->model('producto_model');
       }
       
       public function Index(){
       		/* Datos para la vista */
	       	$head['titulo'] = "Carrito";
	       	$menu['menu'] = $this->menu_model->obtener_menu();
	       	
	        $contenido['total_items'] = $this->cart->total_items(); 
	        $contenido['total'] = $this->cart->total(); 
	        

			$contenido['carrito'] = $this->carrito_model->obtener_carrito();
	        
	        /* Carga de las vistas */
			$this->load->view('header', $head);
	    	$this->load->view('menu', $menu);
	    	
	    	// Contenido principal
	    	$this->load->view('carrito_view', $contenido);
	    	
	    	$this->load->view('footer');
       	
       }
       
       public function incluir (){
       		// Obtener datos del producto mediante URI
	       	$data_uri = $this->uri->uri_to_assoc(3);

	       	// Remplazar los espacios url de Html %20...
	       	$data_uri['name'] = str_replace('%20', ' ', $data_uri['name']);
	      
			$this->cart->insert($data_uri); // Insertar a la sesión del carrito
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       	
       }
       
       public function eliminar($rowid){
	      
			$this->carrito_model->eliminar($rowid);		
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       }      
       
       public function pedido(){
	      /*	$this->carrito_model->procesar_pedido();
			$this->cart->destroy();*/
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       }   

       public function destruir(){
       		$this->cart->destroy();
       }
       
}
?>