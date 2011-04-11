<?php

class Registro_model extends CI_Model {

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
       }
       
	
	public function existe_usuario ($usuario = false) { 
	    if ($usuario === false) {
	        return false;
	    }
	    
	    $query = $this->db->select('id')
                           ->where('usuario', $usuario)
                           ->limit(1)
                           ->get('usuario');
		
		if ($query->num_rows() == 1){
			return true;
		}
		
		return false;
	}
		
	public function existe_email ($email = false){  
	    if ($email === false){
	        return false;
	    }
	    
	    $query = $this->db->select('id')
                           ->where('email', $email)
                           ->limit(1)
                           ->get('usuario');
		
		if ($query->num_rows() == 1){
			return true;
		}
		
		return false;
	}
	
	public function registrar ($usuario = false, $password = false, $email = false){ 
	    if ($usuario === false || $password === false || $email === false)
	    {
	        return false;
	    }
	    
        // Tabla usuario
		$data = array('usuario' => $usuario, 
					  'password' => $password, 
					  'email'    => $email);
    	
		$this->db->insert('usuario', $data);
		
		return ($this->db->affected_rows() > 0) ? true : false;
		}

}
?>