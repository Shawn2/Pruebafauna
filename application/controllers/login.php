<?php

class Login extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('login_model');
       }
       
       public function Index(){ 
       		if( $this->session->userdata('logged_in') ===  TRUE) redirect('cuenta/index');
       			
       		 // Reglas de validación del formulario
			$this->establecer_reglas();
			
       		/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		
    		
       		if($this->form_validation->run()==FALSE){
       			$this->load->view('menu', $menu);
				$this->load->view('login_view');	
			}else{
				$usuario = $this->input->post('usuario');
				$password = $this->input->post('password');

				$login = $this->login_model->login($usuario, $password);
				
				if ($login == TRUE){
					$this->load->view('menu', $menu);
					$this->load->view('cuenta_view');
				} else echo "NO";
			
		}
    		
    		$this->load->view('footer');
       }
       
       public function comprobar_usuario($usuario){
       		return $this->login_model->existe_usuario($usuario);
       }
       
       public function comprobar_password($password){
       		$usuario = $this->input->post('usuario');
       		return $this->login_model->comprobar_password($usuario, $password);
       }
       
       public function establecer_reglas(){
       	    $this->form_validation->set_rules('usuario', 'usuario', 'required|trim|min_length[5]|callback_comprobar_usuario');
			$this->form_validation->set_rules('password', 'contrase&ntilde;a', 'required|trim|md5|callback_comprobar_password');
				
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s carácteres');
			$this->form_validation->set_message('comprobar_usuario', 'El usuario no es correcto');
			$this->form_validation->set_message('comprobar_password', 'La contrase&ntilde;a no es correcta');
			
       }
       
}
?>