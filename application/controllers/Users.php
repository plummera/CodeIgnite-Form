<?php

  class Users extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('User_model');
      $this->load->helper('url_helper');
    }

    public function index() {
      $data['UserInfo'] = $this->User_model->getInfo();
      $data['title'] = 'The Guest List';

      $this->load->view('templates/header', $data);
      $this->load->view('users/index', $data);
      $this->load->view('templates/footer');
    }

    public function view() {
      $data['UserInfo_item'] = $this->User_model->getInfo();

      if (empty($data['UserInfo_item'])) {
        show_404();
      }

      $data['title'] = 'The Underground Lair';

      $this->load->view('templates/header', $data);
      $this->load->view('users/view', $data);
      $this->load->view('templates/footer');
    }

    public function create() {

      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['title'] = "Create a new user";

      $this->form_validation->set_rules('first_name', 'First Name', 'required');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required');
      $this->form_validation->set_rules('address1', 'Address', 'required');
      $this->form_validation->set_rules('city', 'City', 'required');
      $this->form_validation->set_rules('state', 'State', 'required');
      $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
      $this->form_validation->set_rules('phone', 'Phone Number', 'required');
      $this->form_validation->set_rules('email', 'E-Mail', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('users/create', $data);
        $this->load->view('templates/footer');
      } else {
        $this->User_model->setInfo();
        $this->load->view('users/success');
      }
    }

    public function do_upload($file) {

      $config['upload_path']      = './upload/';
      $config['allowed_types']    = 'pdf';
      $config['max_size']         = '100';
      $config['encrypt_name']        = TRUE;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload($file)) {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('users/create', $error);
      }
    }
  }
