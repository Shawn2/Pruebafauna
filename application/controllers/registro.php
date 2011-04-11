<?php

class Registro extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			
			$this->load->library('form_validation');
			
			$this->load->model('registro_model');
			$this->load->model('login_model');
       }
       
       public function Index(){
       		if( $this->session->userdata('logged_in') ===  TRUE) redirect('cuenta/index');      		
       		/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		
    		
    		// Reglas de validación del formulario
			$this->establecer_reglas();
			
			if($this->form_validation->run()==FALSE){
				$this->load->view('menu', $menu);
				// Si no se ha realizado el formulario de registro
				$this->load->view('registro_view');	
			} else {
				// Formulario enviado
				$usuario = $this->input->post('usuario');
			    $password = $this->input->post('password');
			    $email = $this->input->post('email');

			    //Registro BD
				$reg = $this->registro_model->registrar($usuario, $password, $email);				
				if ($reg === TRUE) {
					// Tras registrarse con éxito:
					$this->session->sess_destroy();
					$this->login_model->login($usuario, $password);
					$this->load->view('menu', $menu);
					$this->load->view('cuenta_view');
				} else echo "ERROR REGISTRO";
			
			}
						
    		
    		$this->load->view('footer');
       }
       
       public function existe_usuario($usuario){
       		// Devuelve verdadero si NO existe en la BD
       		return !($this->registro_model->existe_usuario($usuario));
       }
       
       public function existe_email($email){
       		// Devuelve verdadero si NO existe en la BD
       		return !($this->registro_model->existe_email($email));
       }
       
       public function establecer_reglas(){
       	    $this->form_validation->set_rules('usuario', 'usuario', 'required|trim|min_length[5]|callback_existe_usuario');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|callback_existe_email');
			$this->form_validation->set_rules('password', 'contrase&ntilde;a', 'required|trim|md5');
			$this->form_validation->set_rules('repassword', 'reescribir contrase&ntilde;a', 'required|matches[password]|trim|md5');
			
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s carácteres');
			$this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
			$this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
			
			$this->form_validation->set_message('existe_usuario', 'El usuario ya existe. Elija otro nombre');
			$this->form_validation->set_message('existe_email', 'El email ya existe. Elija otro correo');
       }
       
}
?>