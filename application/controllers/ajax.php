<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Ajax extends CI_Controller {
  
    public function __construct(){
      parent::__construct();
      $this->load->database();
      date_default_timezone_set('America/Caracas');
    }
    
    public function index(){}
    
    public function buscarMunicipios(){
        
        $this->load->library('form_validation');

        $id = $this->input->get('estado');        
        $this->db->where('id_estado = ' . "" . $id . "");
        $query = $this->db->get('Municipio');
        
        $options = array(''=>'Seleccione');
                
        if($query -> num_rows() == 0){
            $options = array('' => "No hay municipios");
        }else{
            $query = $query->result();
            foreach($query as $row){
                $options[$row->id] = $row->nombre;
            }
        }
        
        $class = 'class="ui-corner-all ui-state-focus" style="height: 20px; padding: 0 0 0 0; font-size: 12px; width: 250px;"';
        $evento = ' onchange="buscarParroquias()"';
        
        $salida = '<td>';
        $salida.= form_dropdown('municipio', $options, (set_value('municipio')), $class.$evento);
        $salida.= '</td>';
        
        echo json_encode($salida);
    }
    
    public function buscarParroquias(){
        
        $this->load->library('form_validation');
        
        $id = $this->input->get('id');        
        $this->db->where('id_municipio = ' . "" . $id . "");
        $query = $this->db->get('Parroquia');
        
        $options = array(''=>'Seleccione');
        
        if($query -> num_rows() == 0){
            $options = array('' => "No hay Parroquias");
        }else{
            $query = $query->result();
            foreach($query as $row){
                $options[$row->id] = $row->nombre;
            }
        }
        
        $class  = 'class="ui-corner-all ui-state-focus" style="height: 20px; padding: 0 0 0 0; font-size: 12px; width: 250px;"';
        $evento = '';
        
        $salida = '<td>';
        $salida.= form_dropdown('id_parroquia', $options, (set_value('id')), $class.$evento);
        $salida.= '</td>';
        
        echo json_encode($salida);
    }
}

?>