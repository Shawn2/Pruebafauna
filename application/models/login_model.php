<?php

class Login_model extends CI_Model {

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
       }
	
       
       public function existe_usuario ($usuario) {
	        if ($usuario === false){
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
       
       public function comprobar_password ($usuario, $password) {
		    if ($usuario === false || $password === false) return false;
		    		    
		    $query = $this->db->select('id, nombre, email, password')
	                    	   ->where('usuario', $usuario)
	                    	   ->limit(1)
	                    	   ->get('usuario');
		    
	        $result = $query->row(); // ->row() Devuelve el resultado de la consulta
	        if ($query->num_rows() == 1) // Si se encuentra el usuario
	        {
	    		if ($result->password === $password) {	    
	    		    return true;
	    		}
	        }
	        
			return false;	 	
       }
       
	public function login ($usuario= false, $password = false)
	{
	    
	    if ($usuario === false || $password === false)  
	    {	 // NOTA: ¿Falta comprobar si esta identificado ya ?
	        return false;
	    }
	    
	    $query = $this->db->select('id, nombre, email, password')
                    	   ->where('usuario', $usuario)
                    	   ->limit(1)
                    	   ->get('usuario');
	    
        $result = $query->row(); // ->row() Devuelve el resultado de la consulta
        if ($query->num_rows() == 1) // Si se encuentra el usuario
        {
    		if ($result->password === $password)
    		{
    			$data = array(
			    			   'id'		=> $result->id,
			                   'nombre'  => $result->nombre,
    						   'usuario' => $usuario,
			                   'email'     => $result->email,
			                   'logged_in' => TRUE
               				);
               				
    		    $this->session->set_userdata($data);
    		    
    		    return true;
    		}
        }
        
		return false;		
	}

}
?>