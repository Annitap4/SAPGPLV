<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
	class Puntos extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('punto_model');
		}

		public function index()
		{
			if($this->session->userdata('logged_in')){
				$data['puntos'] = $this->punto_model->obtener_puntos_libres();
				$data['title'] = 'Listado de Puntos Libres';	
				$this->load->view('templates/header', $data);
				$this->load->view('puntos/index', $data);
				$this->load->view('templates/footer');	
			}else{
				redirect('login/entrar', 'refresh');
			}
			
		}

		public function view($id){
			if($this->session->userdata('logged_in')){
				$data['punto_item'] = $this->punto_model->obtener_puntos_libres($id);
				if (empty($data['punto_item'])){
					show_404();
				}
				$data['title'] = $data['punto_item']['nombrePunto'];
				$this->load->view('templates/header', $data);
				$this->load->view('puntos/view', $data);
				$this->load->view('templates/footer');
			}else{
				redirect('login/entrar', 'refresh');
			}
		}

		public function create()
		{
			if($this->session->userdata('logged_in')){
				$this->load->helper('form');
				$this->load->library('form_validation');
				$data['title'] = 'Crear un Punto Libre';
				$data['estados'] = $this->punto_model->obtener_estados();
				$this->form_validation->set_rules('nombre', 'Nombre', 'required');
				$this->form_validation->set_rules('cod_postal', 'Código Postal', 'required|integer');
				$this->form_validation->set_rules('capacidad', 'Capacidad', 'required|integer');
				$this->form_validation->set_rules('cedula_encargado', 'Encargado', 'required|integer');
				$this->form_validation->set_rules('id_parroquia', 'Estado, Municipio y Parroquia', 'required||integer|call_back_validate_point');
				
				$this->form_validation->set_message('required', '%s es necesario para el Registro');
				$this->form_validation->set_message('integer', '%s debe solo debe contener caracteres numéricos');
				
				if ($this->form_validation->run() === FALSE)	
				{
					$this->load->view('templates/header', $data);
					$this->load->view('puntos/create');	
					$this->load->view('templates/footer');
				}else
				{
					$id = $this->punto_model->agregar_punto($this->input); 
					if($id != FALSE){
						redirect('puntos/view/'.$id['id'].'', 'refresh');
					}else{
						$this->load->view('puntos/create',$data);
					}
				}
			}else{
				redirect('login/entrar', 'refresh');
			}
		}
		
		public function validate_point($id_parroquia)
		{
			$nombre = $this->input->post('nombre');
			echo $nombre;
			if ($this->punto_model->validar_punto($nombre, $id_parroquia))
			{
				$this->form_validation->set_message('validate_point', 'Ya existe un punto libre en la misma zona con el mismo nombre');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	
		function ajax()
		{
			if($buscar = $this->input->get('term'))
			{
				$this->db->select('cedula, cedula as value');
				$this->db->like('cedula', $buscar); 
				$query=$this->db->get('Persona');
				if($query->num_rows() > 0)
				{			
					foreach ($query->result_array() as $row)
					{
						$result[]= $row;
					}
				}
				echo json_encode($result);
			}
		}
		
		function municipios($id_estado)
		{
			if($buscar = $this->select->get('estado')){
			$query=$this->db->get_where('Municipio',$id_estado);
			if($query->num_rows() > 0)
			{			
				foreach ($query->result_array() as $row)
				{
					$result[]= $row;
				}
			}
			echo json_encode($result);
			}
		}
	}
?>
