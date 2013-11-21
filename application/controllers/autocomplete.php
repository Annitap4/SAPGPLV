<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Autocomplete extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('autocomplete');
    }
    
    function ajax()
    {
        if($buscar = $this->input->get('term'))
        {
            $this->db->select('id, user as value');
            $this->db->like('user', $buscar); 
            $query=$this->db->get('usuarios');
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