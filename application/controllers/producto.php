<?php

class Producto extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->helper('url');
			$this->load->model('producto_model');
   
       }
       
       public function Index(){
       		/* Datos para la vista */
       		$head['titulo'] = "Productos";

       		$menu['menu'] = $this->menu_model->obtener_menu();
               
		  
            //Obtener
            $contenido['productos'] = $this->producto_model->obtener_productos($this->uri->segment(3));


            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		$this->load->view('catalogo_producto_view', $contenido); // Contenido
    		
    		$this->load->view('footer');
       }
       
       public function mostrar() {
       	
        $cod_producto = $this->uri->segment(3);
    	$producto['producto'] = $this->producto_model->obtener_producto($cod_producto);
        
        /* Carga de modelos */
       		$this->load->model('menu_model');
			

       		/* Datos para la vista */
       		$head['titulo'] = "Productos";

       		$menu['menu'] = $this->menu_model->obtener_menu();
               
            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		$this->load->view('producto_view', $producto); // Contenido
    		
    		$this->load->view('footer');    	
       
       }
       
}
?>