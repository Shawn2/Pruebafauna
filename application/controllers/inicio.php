<?php

class Inicio extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->helper('url');
       }
       
       public function Index(){
       		/* Carga de modelos */
       		$this->load->model('novedades_model');
       		
       		/* Datos para la vista */
       		$head['titulo'] = "Inicio";

            //Obtener novedades
            $contenido['novedad'] = $this->novedades_model->obtener_novedades();
            
            // Obtener menu
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		$this->load->view('inicio_view', $contenido); // Contenido
    		
    		$this->load->view('footer');
       }
       
}
?>