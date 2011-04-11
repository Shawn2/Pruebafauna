<?php 
class Producto_model extends CI_Model{
       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
       } 
       
       // Obtener todos los productos de una subcategoría
       public function obtener_productos ($cod_subcategoria) {
	         $query = $this->db->select('cod, nombre, foto, descripcion, precio')
       							->where('cod_subcategoria',$cod_subcategoria)
       							->get('producto');
       							
       		 return $query->result();
	   }
	   
	   // Obtener un solo producto por su código
       public function obtener_producto ($cod_producto) {

	         $query = $this->db->where('cod',$cod_producto)
       							->get('producto');
   
       		if ($query->num_rows() == 1 ) return $query->row();

	   }
	   
	   // Obtener el registro foto de un producto por su código
       public function obtener_foto_producto ($cod_producto) {

	         $query = $this->db->select('foto')
	         					->where('cod',$cod_producto)
       							->get('producto');
   
       		if ($query->num_rows() == 1 ) return $query->row();

	   }
	   
	   
}


?>