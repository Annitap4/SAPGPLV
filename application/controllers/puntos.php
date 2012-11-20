<?php
	class Puntos extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('punto_model');
		}

		public function index()
		{
			$data['puntos'] = $this->punto_model->obtener_puntos_libres();
			$data['title'] = 'Listado de Puntos Libres';	
			$this->load->view('templates/header', $data);
			$this->load->view('puntos/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id){
			$data['puntos_item'] = $this->punto_model->obtener_puntos_libres($id);
			if (empty($data['puntos_item'])){
				show_404();
			}
			$data['title'] = $data['puntos_item']['nombre'];
			$this->load->view('templates/header', $data);
			$this->load->view('puntos/view', $data);
			$this->load->view('templates/footer');
		}

		public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title'] = 'Crear un Punto Libre';
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('cod_postal', 'Código Postal', 'required');
			$this->form_validation->set_rules('capacidad', 'Capacidad', 'required');
			//$this->form_validation->set_rules('cedula_encargado', 'Encargado', 'required');
			//$this->form_validation->set_rules('id_parroquia', 'Ubicación', 'required');
			if ($this->form_validation->run() === FALSE)	
			{
				$this->load->view('templates/header', $data);
				$this->load->view('puntos/create');	
				$this->load->view('templates/footer');
			}else
			{
				$this->news_model->set_news();
				$this->load->view('news/success');
			}
		}
	}
?>
