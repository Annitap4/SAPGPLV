<?php
	class Persona_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

		public function obtener_personas($cedula = FALSE)
		{
			if ($cedula === FALSE)
			{
				$query = $this->db->get('Persona');
				return $query->result_array();
			}
			$query = $this->db->get_where('Persona', array('cedula' => $cedula));
			return $query->row_array();
		}
	}	
?>

