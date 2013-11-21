<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
	class Personas extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('persona_model');
			$this->load->helper(array('form', 'url'));
			$this->load->library('pagination');
		}

		public function index()
		{
			if($this->session->userdata('logged_in')){
				$data['personas'] = $this->persona_model->obtener_personas();
				$data['title'] = 'Listado de personas';
				if (empty($data['personas'])){
					$this->load->view('templates/header', $data);
					$this->load->view('personas/out_of_element');
					$this->load->view('templates/footer');
				}else{
					$this->load->view('templates/header', $data);
					$this->load->view('personas/index', $data);
					$this->load->view('templates/footer');	
				}
				
			}else{
				redirect('login/entrar', 'refresh');
			}
		}
		
		public function lista($offset='')
		{
			$limit = 2;
			$total = $this->persona_model->contar_personas();
			$data['personas'] = $this->persona_model->listar_personas($limit, $offset);
			$config['base_url'] = base_url().'personas/lista';
			$config['total_rows'] = $total;
			$config['per_page'] = $limit;
			$config['uri_segment'] = '3';
			$this->pagination->initialize($config);
			$data['pag_links'] = $this->pagination->create_links();
			$data['title'] = 'Usuarios';
			//$this->load->view('templates/header', $data);
			$this->load->view('personas/lista_vista', $data);
			//$this->load->view('templates/footer');
		}

		public function view($cedula)
		{
			if($this->session->userdata('logged_in')){
				$data['personas_item'] = $this->persona_model->obtener_personas($cedula);
				if (empty($data['personas_item'])){
					show_404();
				}
				$data['title'] = $data['personas_item']['cedula'];
				$this->load->view('templates/header', $data);
				$this->load->view('personas/view', $data);
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
				$data['title'] = 'Registrar nuevo Usuario';
				$this->form_validation->set_rules('cedula', 'Cédula', 'required|is_unique[Persona.cedula]|min_length[7]|max_length[8]|integer');
				$this->form_validation->set_rules('nombre', 'Nombre', 'required');
				$this->form_validation->set_rules('apellido', 'Apellido', 'required');
				$this->form_validation->set_rules('tlf', 'Teléfono', 'required');
				$this->form_validation->set_rules('correo', 'Correo', 'required|valid_email|is_unique[Persona.correo]');
				
				$this->form_validation->set_message('required', '%s es necesario para el Registro');
				$this->form_validation->set_message('is_unique', '%s ya existe, verifica este dato para Continuar');
				$this->form_validation->set_message('valid_email', 'El %s no posee una estructura Valida');
				$this->form_validation->set_message('matches', 'No coincide el campo %s');
				if ($this->form_validation->run() === FALSE)	
				{
					$this->load->view('templates/header', $data);
					$this->load->view('personas/create');	
					$this->load->view('templates/footer');
				}else
				{
					if($this->persona_model->agregar_persona($this->input)){
						redirect('personas/view/'.$this->input->post('cedula').'', 'refresh');
					}else{
						$this->load->view('personas/create',$data);
					}	
				}
			}else{
				redirect('login/entrar', 'refresh');
			}
		}
		public function edit($cedula)
		{
			if($this->session->userdata('logged_in')){
				$data['personas_item'] = $this->persona_model->obtener_personas($cedula);
				if (empty($data['personas_item'])){
					show_404();
				}
				$this->load->helper('form');
				$data['title'] = 'Modificar Usuario';
				$this->load->view('templates/header', $data);
				$this->load->view('personas/edit', $data);
				$this->load->view('templates/footer');
			}else{
				redirect('login/entrar', 'refresh');
			}
		}
		
		public function edit_execute()
		{
			if($this->session->userdata('logged_in')){
				$cedula = $this->input->post('cedula');
				//$data['personas_item'] = $this->persona_model->obtener_personas($cedula);
				$this->load->library('form_validation');
				$data['title'] = 'Modificar Usuario';
				$this->form_validation->set_rules('cedula', 'Cédula', 'required');
				$this->form_validation->set_rules('nombre', 'Nombre', 'required');
				$this->form_validation->set_rules('apellido', 'Apellido', 'required');
				$this->form_validation->set_rules('tlf', 'Teléfono', 'required');
				$this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
	
				$correo = $this->persona_model->obtener_correo($cedula);
				if($correo['correo'] != $this->input->post('correo'))
				{
					$this->form_validation->set_rules('correo', 'Correo', 'is_unique[Persona.correo]');
				}
				
				$this->form_validation->set_message('required', '%s es necesario para el Registro');
				$this->form_validation->set_message('is_unique', '%s ya existe, verifica este dato para Continuar');
				$this->form_validation->set_message('valid_email', 'El %s no posee una estructura Valida');
				if ($this->form_validation->run() === FALSE)	
				{
					$this->load->helper('form');
					$this->load->view('templates/header', $data);
					$this->load->view('personas/edit', $data);
					$this->load->view('templates/footer');
				}else
				{
					if($this->persona_model->modificar_persona($this->input)){
						redirect('personas', 'refresh');
					}else{
						$this->load->view('personas',$data);
					}	
				}
			}else{
				redirect('login/entrar', 'refresh');
			}	
		}
		
		public function find()
		{
			if($this->session->userdata('logged_in')){
				$data['title'] = 'Buscar Usuario';
				$this->load->view('templates/header', $data);
				$this->load->view('personas/find', $data);
				$this->load->view('templates/footer');
			}else{
				redirect('login/entrar', 'refresh');
			}
		}
		
		public function find_execute()
		{
			$data['title'] = 'Buscar Usuario';
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('cedula', 'Cédula', 'required|callback_find_cedula');
			$this->form_validation->set_message('required', '%s es necesario para la búsqueda');
			
			if ($this->form_validation->run() === FALSE)	
			{
				$this->load->view('templates/header', $data);
				$this->load->view('personas/find', $data);
				$this->load->view('templates/footer');
			}else
			{
				$url = 'personas/view/'.$this->input->post('cedula');
				redirect($url, 'refresh');
				$this->load->view('templates/header', $data);
				$this->load->view('personas/view', $data);
				$this->load->view('templates/footer');
			}
		}
		public function find_cedula($str)
		{
			if ($data['personas_item'] = $this->persona_model->obtener_personas($str) == NULL)
			{
				$this->form_validation->set_message('find_cedula', 'La %s no existe');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function delete($cedula)
		{
			if($this->session->userdata('logged_in')){
				$data['personas_item'] = $this->persona_model->obtener_personas($cedula);
				if (empty($data['personas_item'])){
					show_404();
				}
				$this->load->helper('form');
				$data['title'] = 'Eliminar Usuario';
				$this->load->view('templates/header', $data);
				$this->load->view('personas/delete', $data);
				$this->load->view('templates/footer');	
			}else{
				redirect('login/entrar', 'refresh');
			}
		}
		
		public function delete_execute()
		{
			$data['title'] = 'Eliminar Usuario';
			$cedula = $this->input->post('cedula');
			if($this->persona_model->eliminar($cedula))
			{
				$this->load->view('templates/header', $data);
				$this->load->view('personas/delete_succes');
				$this->load->view('templates/footer');
			}else{
				$this->load->view('templates/header', $data);
				$this->load->view('personas/error');
				$this->load->view('templates/footer');
			}
		}

	}
?>
