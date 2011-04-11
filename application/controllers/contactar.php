<?php

class Contactar extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            
			$this->load->helper('url');
   
       }
       
       public function Index(){
       		/* Datos para la vista */
       		$head['titulo'] = "Inicio";
       		$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		// Contenido principal
    		$this->load->view('contactar_view'); 
    		
    		$this->load->view('footer');
       }
       
}
?>