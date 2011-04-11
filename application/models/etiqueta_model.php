<?php

class Etiqueta_model extends CI_Model {

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
       }
       
       public function obtener_categorias() {
       
       		$query_cat = $this->db->get('categoria');
       				 			
       		$query_etiq = $this->db->get('subcategoria');
       				 			
       		foreach ($query_cat as $row) {
       			$data[$row->nombre] = array();
       			foreach ($query_etiq as $row2){
       				if ($row->cod == $row2->cod_categoria) 
       					$data[$row->nombre] = $row2->nombre;
       			}
       		}
       		
       		// REVISAR
       		
       		return $data; 
       }
       
       public function obtener_cod_etiquetas($cod_producto) {
       		$query = $this->db->select('cod_etiqueta')
       							->where('cod_producto',$cod_producto)
       							->get('producto_etiqueta');
       							
             foreach ($query as $fila){
				$data[] = $fila->cod;
       		 }
       		 return $data;
       }
	
       public function obtener_cod_productos($cod_etiqueta){
      		 $query = $this->db->select('cod_producto')
       							->where('cod_etiqueta',$cod_etiqueta)
       							->limit(1)
       							->get('producto_etiqueta');
       							
       		  foreach ($query as $fila){
				$data[] = $fila->cod;
       		 }
       		 return $data;
       }
}
?>
	