<?php
class Modelo_paginador extends CI_Model {
   function __construct()
   {
      parent::__construct();
   }

   public function count_mensajes()
   {
      return $this->db->count_all_results('mensajes');
   }

   public function list_mensajes($limit, $offset)
   {
      $this->db->limit($limit, $offset);
      $query = $this->db->get('mensajes');
      return $query->result();
   }
}

