<?php
	class Punto_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

		public function obtener_puntos_libres($id = FALSE)
		{
			if ($id === FALSE)
			{
				$query = $this->db->get('PuntoLibre');
				return $query->result_array();
			}
			$query = $this->db->get_where('PuntoLibre', array('id' => $id));
			return $query->row_array();
		}

		public function asignar_punto_libre()
		{
				$this->load->helper('url');
				$slug = url_title($this->input->post('title'), 'dash', TRUE);
				$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'text' => $this->input->post('text')
				);
				return $this->db->insert('news', $data);
		}
			
	}	
?>
