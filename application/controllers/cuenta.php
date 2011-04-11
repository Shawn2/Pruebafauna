<?php

class Cuenta extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            
			$this->load->helper('url');
			$this->load->helper('form');
			
			$this->load->library('form_validation');
			
			$this->load->model('cuenta_model');
       }
       
       public function Index(){
       		
       		/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

			if( $this->session->userdata('logged_in') !==  TRUE){
				// Si no ha iniciado sesión se abre la pagina login
				redirect('login/index');	
			} else {
			
           		 /* Carga de las vistas */
				$this->load->view('header', $head);
    			$this->load->view('menu', $menu);
    			
    			// Contenido principal
				$this->load->view('cuenta_view');
				
				$this->load->view('footer');
			}
       }
       
       
       public function logout (){
       		$this->session->set_userdata('logged_in', 'FALSE');
       		
       		redirect('inicio/index/');
       }

       
}
?>