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
			$data['personas'] = $this->persona_model->obtener_personas();
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
	}
?>
