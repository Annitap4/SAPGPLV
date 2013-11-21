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
				$this->db->select('Estado.nombre AS nombreE, Municipio.nombre AS nombreM, Parroquia.nombre as nombreP, PuntoLibre.nombre AS nombrePunto, PuntoLibre.id AS idPunto, PuntoLibre.cod_postal, PuntoLibre.capacidad, Persona.cedula AS cedula_encargado, Persona.nombre AS nombre_encargado, Persona.apellido AS apellido_encargado');
				$query = $this->db->join('Parroquia','Parroquia.id = PuntoLibre.id_parroquia', 'INNER')->join('Municipio','Municipio.id = Parroquia.id_municipio','INNER')->join('Estado','Estado.id = Municipio.id_estado','INNER')->join('Persona','PuntoLibre.cedula_encargado = Persona.cedula','INNER')->get('PuntoLibre');
				return $query->result_array();
			}
			$this->db->select('Estado.nombre AS nombreE, Municipio.nombre AS nombreM, Parroquia.nombre as nombreP, PuntoLibre.nombre AS nombrePunto, PuntoLibre.id AS idPunto, PuntoLibre.cod_postal, PuntoLibre.capacidad, Persona.cedula AS cedula_encargado, Persona.nombre AS nombre_encargado, Persona.apellido AS apellido_encargado');
			$this->db->where(array('PuntoLibre.id' => $id));
			$query = $this->db->join('Parroquia','Parroquia.id = PuntoLibre.id_parroquia', 'INNER')->join('Municipio','Municipio.id = Parroquia.id_municipio','INNER')->join('Estado','Estado.id = Municipio.id_estado','INNER')->join('Persona','PuntoLibre.cedula_encargado = Persona.cedula','INNER')->get('PuntoLibre');			return $query->row_array();
			return $query->row_array();
		}

		public function agregar_punto($data)
		{
			$datos = array(
				'nombre'     => $data->post('nombre'),
				'cod_postal'   => $data->post('cod_postal'),
				'capacidad'       => $data->post('capacidad'),
				'cedula_encargado'       => $data->post('cedula_encargado'),
				'id_parroquia'     => $data->post('id_parroquia')
			);	
        
			if($this->db->insert('PuntoLibre',$datos)){
				$this -> db -> select('id');
				$this -> db -> where($datos);
				$id = $this ->db -> get('PuntoLibre');
				$id = $id -> row_array();
				return $id;
			}else{
			    return FALSE;
			}
		}
		
		public function obtener_estados()
		{
			$query = $this->db->get('Estado');
			return $query->result_array();
		}
		
		public function validar_punto($nombre, $id_parroquia)
		{
			$this -> db -> select ('nombre, id_parroquia');
			$this -> db -> from('PuntoLibre');
			$info = array( 'nombre' => $nombre, 'id_parroquia' => $id_parroquia);
			$this -> db -> where($info);
			$query = $this -> db -> get();
			if ($query -> num_rows() == 0)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}	
?>
