<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login extends CI_Controller {

        function __construct()
        {
          parent::__construct();
          $this->load->helper(array('form', 'url'));
        }
        
        function index()
        {
            if($this->session->userdata('logged_in')){
                redirect('home', 'refresh');
            }else{
                $data['title'] = '';
                $this->load->view('templates/header', $data);
                $this->load->view('login/punto');
                $this->load->view('templates/footer2');
           }
        }
        
        function entrar()
        {
            if($this->session->userdata('logged_in')){
                redirect('home', 'refresh');
            }else{
                $data['title'] = 'Entrar';
                $this->load->view('templates/header', $data);
                $this->load->view('login/login_view');
                $this->load->view('templates/footer2');
           }
        }
        
        function where_puntos()
        {
            if($this->session->userdata('logged_in')){
                redirect('home', 'refresh');
            }else{
                $data['title'] = '';
                $this->load->view('templates/header', $data);
                $this->load->view('login/donde');
                $this->load->view('templates/footer2');
            }
        }
        
        function contacto()
        {
            if($this->session->userdata('logged_in')){
                redirect('home', 'refresh');
            }else{
                $data['title'] = '';
                $this->load->view('templates/header', $data);
                $this->load->view('login/contacto');
                $this->load->view('templates/footer2');
            }
        }
    }

?>
