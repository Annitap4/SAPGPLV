<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['cedula'] = $session_data['cedula'];
     $data['nombre'] = $session_data['nombre'];
     $data['nivel'] = $session_data['nivel'];
     $data['apellido'] = $session_data['apellido'];
     $data['title'] = 'Home';
     $this->load->view('templates/header', $data);
     $this->load->view('home', $data);
     $this->load->view('templates/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login/entrar', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>
