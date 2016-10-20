<?php

  class Login extends CI_Controller {
    public function __construct() {
      parent::__construct();
    }

    public function index() {
      $data['title'] = 'Best Week Ever';
      $this->load->helper(array('form'));

      $this->load->view('templates/header', $data);
      $this->load->view('pages/login');
      $this->load->view('templates/footer');
    }
  }
