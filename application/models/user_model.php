<?php
    Class User_model extends CI_Model
    {
     function login($username, $password)
     {
       $this -> db -> select('cedula, pass, nombre, apellido, nivel');
       $this -> db -> from('Persona');
       $this -> db -> where('cedula = ' . "'" . $username . "'");
       $this -> db -> where('pass = ' . "'" . $password . "'");
       $this -> db -> where('nivel != 0');
       $this -> db -> limit(1);
    
       $query = $this -> db -> get();
    
       if($query -> num_rows() == 1)
       {
         return $query->result();
       }
       else
       {
         return false;
       }
     }
    }
?>
