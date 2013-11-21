<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
   function __construct()
   {
      parent::__construct();
      $this->db = $this->load->database('default', TRUE); 
      $this->load->library('pagination');
      $this->load->model('modelo_paginador', 'modelo');
      $this->load->helper(array('url'));
   }

   public function index($offset='')
   {
      $this->load->view('vista_mensajes'); // solo cargaremos la vista
   }

   public function lista($offset='')
   {
      $limit = 2;
      $total = $this->modelo->count_mensajes();
      $data['mensajes'] = $this->modelo->list_mensajes($limit, $offset);
      $config['base_url'] = base_url().'index.php/welcome/lista/';
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $config['uri_segment'] = '3';
      $this->pagination->initialize($config);
      $data['pag_links'] = $this->pagination->create_links();
      $data['title'] = 'Pagination';
      $this->load->view('lista_vista', $data);
   }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */