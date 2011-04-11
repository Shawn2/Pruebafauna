<?php 
class Novedades_model extends CI_Model{
       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
       } 
       
       //Función con la que se obtiene los últimos 5 productos insertados en la tabla productos
       public function obtener_novedades(){
       		/*$query = $this->db->select("nombre,precio,foto,descripcion");*/
       		$query = $this->db->order_by("cod", "DESC")
       							->get('producto',3);
       		if($query->num_rows>0){
       			foreach ($query->result() as $novedad) {
					$data[] = $novedad;
				}
				return $data;
			}  		
       }
}


?>