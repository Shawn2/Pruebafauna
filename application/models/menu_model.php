<?php
class Menu_model extends CI_Model {

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
       }
       
	public function obtener_categoria(){
		$query = $this->db->get('categoria');

		if($query->num_rows>0){
			
			foreach ($query->result() as $categoria) {
				$data[] = $categoria;
			}

			return $data;
		}
	}
	
	public function obtener_subcategoria($cod_categoria){
				$query = $this->db->where('cod_categoria', $cod_categoria)
											->get('subcategoria');
											
			if($query->num_rows>0){
			
			foreach ($query->result() as $subcategoria) {
				$data[] = $subcategoria;
			}

			return $data;
		}
	}
	
       public function obtener_menu(){
      		 /* Creamos un array para pasar el menu, cada fila contiene en la primera 
       		 * columna una categoria y en la segunda otro array con sus subcategorias */
       		
       		$categorias = $this->menu_model->obtener_categoria();
       		
       		foreach ($categorias as $cat_fila){
            	$subcategorias =  $this->menu_model->obtener_subcategoria($cat_fila->cod);
            	
            	$menu[] = array( "categoria" =>$cat_fila, 
            							"subcategorias" => $subcategorias );
            }
            
            return $menu;
       }
}
?>