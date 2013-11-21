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
				$this -> db -> where('nivel = 0');
				$query = $this->db->get('Persona');
				return $query->result_array();
			}
			$query = $this->db->get_where('Persona', array('cedula' => $cedula));
			return $query->row_array();
		}
		public function obtener_trabajadores($cedula = FALSE)
		{
			if ($cedula === FALSE)
			{
				$this->db->select('PuntoLibre.nombre AS nombreP, Persona.nombre AS nombreT, cedula, apellido, tlf, correo');
				$query = $this->db->join('PuntoLibre','Persona.cedula = PuntoLibre.cedula_encargado','INNER')->get('Persona');
				return $query->result_array();
			}
			$query = $this->db->get_where('Persona', array('cedula' => $cedula));
			return $query->row_array();
		}
		
		public function agregar_persona($data)
		{
			$datos = array(
				'cedula'     => $data->post('cedula'),
				'nombre'   => $data->post('nombre'),
				'apellido'       => $data->post('apellido'),
				'tlf'       => $data->post('tlf'),
				'correo'     => $data->post('correo'),
				'pass'     => 'NULL',
				'nivel'     => 0
			);	
        
			if($this->db->insert('Persona',$datos)){
				return TRUE;
			}else{
			    return FALSE;
			}
		}
		
		public function modificar_persona($data)
		{
			$datos = array(
				'cedula'     => $data->post('cedula'),
				'nombre'   => $data->post('nombre'),
				'apellido'       => $data->post('apellido'),
				'tlf'       => $data->post('tlf'),
				'correo'     => $data->post('correo'),
				'pass'     => 'NULL',
				'nivel'     => 0
			);	
        
			if($this->db->update('Persona',$datos,array('cedula' => $data->post('cedula')))){
				return TRUE;
			}else{
			    return FALSE;
			}
		}
		
		public function obtener_correo($cedula)
		{
			$this->db->select('correo');
			$query = $this->db->get_where('Persona', array('cedula' => $cedula));
			return $query->row_array();
		}
		
		public function eliminar($cedula)
		{
			if($this->db->delete('Persona', array('cedula' => $cedula)))
			{
				return TRUE;	
			}else{
				return FALSE;
			}

		}
		
		public function contar_personas()
		{
			$this->db->where('nivel = 0');
			return $this->db->count_all_results('Persona');
		}

		public function listar_personas($limit, $offset)
		{
			$this->db->where('nivel = 0');
			$this->db->limit($limit, $offset);
			$query = $this->db->get('Persona');
			return $query->result_array();
		}
	}	
?>

