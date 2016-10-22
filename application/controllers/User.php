<?php

  // Init User Class
  class User extends CI_Controller {

    // __construct takes point
    public function __construct() {
      parent::__construct();
      $this->load->model('User_model');
      $this->load->helper(array('form', 'url_helper'));
    }

    public function index() {
       $this->load->view('user/create', array('error' => ' ' ));
    }

    public function do_upload() {
       $config['upload_path']   = 'upload/';
       $config['allowed_types'] = 'pdf';
       $config['max_size']      = 1000000;

       $this->upload->initialize($config);
var_dump($_FILES);die;
       if (!$this->upload->do_upload('userfile')) {
          $error = array('error' => $this->upload->display_errors());
          $this->load->view('users/upload', $error);
       }

       else {
          $data = array('upload_data' => $this->upload->data());
          $this->load->view('success', $data);
       }
    }

    // // Display User homepage
    // public function userHome() {
    //
    //   // fetch Info
    //   var_dump($this->User_model->getInfo());die;
    //   $data['UserInfo_item'] = $this->User_model->getInfo();
    //   $data['title'] = 'The Guest List';
    //
    //  if($this->session->userdata('logged_in')) {
    //     $session_data = $this->session->userdata('logged_in');
    //     $data['username'] = $session_data['username'];
    //     $data['UserInfo'] = $this->User_model->getInfo();
    //
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('users/index', $data);
    //     $this->load->view('templates/footer');
    //  } else {
    //    //If no session, redirect to login page
    //    $this->load->view('users/login', $data);
    //  }
    // }

    // Renders Dashboard view
    // public function view() {
    //   $data['UserInfo_item'] = $this->User_model->getInfo();
    //
    //   if (empty($data['UserInfo_item'])) {
    //     show_404();
    //   }
    //
    //   $data['title'] = 'CodeIgniter For Fun & Profit';
    //
    //   $this->load->view('templates/header', $data);
    //   $this->load->view('users/view', $data);
    //   $this->load->view('templates/footer');
    // }


    // Renders Create Entry Page
    public function create() {

      // Grabbing form helper
      // Library for getting the forms validated
      $this->load->library('form_validation');
      $this->load->model('User_model');

      // Set rules and requirements
      $this->form_validation->set_rules('first_name', 'First Name', 'required');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required');
      $this->form_validation->set_rules('address1', 'Address', 'required');
      $this->form_validation->set_rules('city', 'City', 'required');
      $this->form_validation->set_rules('state', 'State', 'required');
      $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
      $this->form_validation->set_rules('phone', 'Phone Number', 'required');
      $this->form_validation->set_rules('email', 'E-Mail', 'required');

      if (!$this->input->post('userfile')) {
          if (!empty($_FILES['userfile']['name'])) {
              $this->form_validation->set_rules('userfile', 'Upload File', 'required');

              $config['upload_path']      = './upload/';
              $config['allowed_types']    = 'pdf';
              $config['max_size']         = '1000000000';
              $config['encrypt_name']     = FALSE;

              $upload = $this->load->library('upload', $config);
              $this->upload->initialize($config);

              foreach ($_FILES as $key => $value) {
               $this->upload->do_upload($key);
              }
          }
      }

      // Pass user data to model
      $insertUserData = $this->User_model->setInfo();

      // echo "<pre>";
      // var_dump($this->User_model->setInfo());die;

      // If checks do NOT pass validation
      if ($this->form_validation->run() === FALSE) {

        //Re-direct back to Create Entry Page w/ Errors
        echo "Form not passing validation";
        $this->load->view('templates/header');
        $this->load->view('users/create', array('error' => ''));
        $this->load->view('templates/footer');

        // Otherwise
      } else {

        // Pass User Input
        $this->User_model->setInfo();
        $this->load->view('templates/header');
        $this->load->view('users/success', $uploadData);
        $this->load->view('templates/footer');
      }
    }

  }
