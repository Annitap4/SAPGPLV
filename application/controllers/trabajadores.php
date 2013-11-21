<?php
	class Trabajadores extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('persona_model');
		}

		public function index()
		{
			$data['personas'] = $this->persona_model->obtener_trabajadores();
			$data['title'] = 'Listado de personas';	
			$this->load->view('templates/header', $data);
			$this->load->view('trabajadores/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($cedula){
			$data['personas_item'] = $this->persona_model->obtener_personas($cedula);
			if (empty($data['personas_item'])){
				show_404();
			}
			$data['title'] = $data['personas_item']['cedula'];
			$this->load->view('templates/header', $data);
			$this->load->view('trabajadores/view', $data);
			$this->load->view('templates/footer');
		}
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title'] = 'Registrar nuevo Trabajador';
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('cedula', 'Cédula', 'required');
			$this->form_validation->set_rules('apellido', 'Apellido', 'required');
			$this->form_validation->set_rules('tlf', 'Teléfono', 'required');
			$this->form_validation->set_rules('correo', 'Correo', 'required');
			if ($this->form_validation->run() === FALSE)	
			{
				$this->load->view('templates/header', $data);
				$this->load->view('trabajadores/create');	
				$this->load->view('templates/footer');
			}else
			{
				//TODO: Hacer la insercion
				$this->news_model->set_news();
				$this->load->view('news/success');
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
				$data['title'] = 'Modificar Trabajador';
				$this->load->view('templates/header', $data);
				$this->load->view('trabajadores/edit', $data);
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
				$data['title'] = 'Modificar Trabajador';
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
				
				$this->form_validation->set_message('required', '%s es necesario');
				$this->form_validation->set_message('is_unique', '%s ya existe, verifica este dato para Continuar');
				$this->form_validation->set_message('valid_email', 'El %s no posee una estructura Valida');
				if ($this->form_validation->run() === FALSE)	
				{
					$this->load->helper('form');
					$this->load->view('templates/header', $data);
					$this->load->view('trabajadores/edit', $data);
					$this->load->view('templates/footer');
				}else
				{
					if($this->persona_model->modificar_persona($this->input)){
						redirect('trabajadores', 'refresh');
					}else{
						$this->load->view('trabajadores',$data);
					}	
				}
			}else{
				redirect('login/entrar', 'refresh');
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
				$data['title'] = 'Eliminar Trabajador';
				$this->load->view('templates/header', $data);
				$this->load->view('trabajadores/delete', $data);
				$this->load->view('templates/footer');	
			}else{
				redirect('login/entrar', 'refresh');
			}
		}
	}
?>
