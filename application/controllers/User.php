<?php

  class User extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('User_model');
      $this->load->helper('url_helper');
    }

    public function index() {
      $data['UserInfo_item'] = $this->User_model->getInfo();
      $data['title'] = 'The Guest List';

     if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['UserInfo'] = $this->User_model->getInfo();

        $this->load->view('templates/header', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
     } else {
       //If no session, redirect to login page
       $this->load-view('users/login', $data);
      }
    }

    public function view() {
      $data['UserInfo_item'] = $this->User_model->getInfo();

      if (empty($data['UserInfo_item'])) {
        show_404();
      }

      $data['title'] = 'CodeIgniter For Fun & Profit';

      $this->load->view('templates/header', $data);
      $this->load->view('users/view', $data);
      $this->load->view('templates/footer');
    }

    public function create() {
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->model('User_model');

      $config['upload_path']      = './upload/';
      $config['allowed_types']    = 'pdf';
      $config['max_size']         = '100';
      $config['encrypt_name']     = FALSE;

      $this->load->library('upload', $config);

      $this->form_validation->set_rules('first_name', 'First Name', 'required');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required');
      $this->form_validation->set_rules('address1', 'Address', 'required');
      $this->form_validation->set_rules('city', 'City', 'required');
      $this->form_validation->set_rules('state', 'State', 'required');
      $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
      $this->form_validation->set_rules('phone', 'Phone Number', 'required');
      $this->form_validation->set_rules('email', 'E-Mail', 'required');

      if ($this->form_validation->run() == FALSE) {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('templates/header');
        $this->load->view('users/create', $error);
        $this->load->view('templates/footer');
      } else {
        $data = array('upload_data' => $this->upload->data());
        $this->User_model->setInfo();
        $this->load->view('templates/header');
        $this->load->view('users/success', $data);
        $this->load->view('templates/footer');
      }
    }
  }
