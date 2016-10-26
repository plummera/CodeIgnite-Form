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
       $this->load->view('templates/header');
       $this->load->view('users/create', array('error' => ' ' ));
       $this->load->view('templates/footer');
    }

    public function do_upload() {
       $config['upload_path']   = './upload/';
       $config['allowed_types'] = 'pdf';
       $config['max_size']      = 0;

       $this->load->library('upload');
       $this->upload->initialize($config);
       $userfile = $this->input->post('userfile');

       if (!$this->upload->do_upload(trim($userfile))) {
          $error = array('error' => $this->upload->display_errors());
          $this->load->view('users/upload', $error);
       }

       else {
          $data = array('upload_data' => $this->upload->data());
          $this->load->view('success', $data);
       }
    }

    // Display User homepage
    public function userHome() {

      // fetch Info
      var_dump($this->User_model->getInfo());die;
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
       $this->load->view('users/login', $data);
     }
    }

    // Renders Dashboard view
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
      $this->form_validation->set_rules('userfile', 'Upload File', 'required');

      $states['list']             = $this->User_model->getState();
      $statesList                 = '{"AK": "Alaska",    "AZ": "Arizona",    "AR": "Arkansas",    "CA": "California",    "CO": "Colorado",    "CT": "Connecticut",    "DE": "Delaware",    "DC": "District of Columbia",    "FL": "Florida",    "GA": "Georgia",    "HI": "Hawaii",    "ID": "Idaho",    "IL": "Illinois",    "IN": "Indiana",    "IA": "Iowa",    "KS": "Kansas",    "KY": "Kentucky",    "LA": "Louisiana",    "ME": "Maine",    "MD": "Maryland",    "MA": "Massachusetts",    "MI": "Michigan",    "MN": "Minnesota",    "MS": "Mississippi",    "MO": "Missouri",    "MT": "Montana",    "NE": "Nebraska",    "NV": "Nevada",    "NH": "New Hampshire",    "NJ": "New Jersey",    "NM": "New Mexico",    "NY": "New York",    "NC": "North Carolina",    "ND": "North Dakota",    "OH": "Ohio",    "OK": "Oklahoma",    "OR": "Oregon",    "PA": "Pennsylvania",    "RI": "Rhode Island",    "SC": "South Carolina",    "SD": "South Dakota",    "TN": "Tennessee",    "TX": "Texas",    "UT": "Utah",    "VT": "Vermont",    "VA": "Virginia",    "WA": "Washington",    "WV": "West Virginia",    "WI": "Wisconsin",    "WY": "Wyoming"}';
      $state                      = json_decode($statesList);

      $config['upload_path']      = './upload/';
      $config['allowed_types']    = 'pdf';
      $config['max_size']         = '0';
      $config['encrypt_name']     = FALSE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $userfile = $this->input->post('userfile');

      // If checks do NOT pass validation
      if ($this->form_validation->run() === FALSE && !$this->upload->do_upload(trim($userfile))) {

        //Re-direct back to Create Entry Page w/ Errors
        // echo "<pre>";
        // var_dump($state);die;
        echo "Form not passing validation";
        $this->load->view('templates/header');
        $this->load->view('users/create', array('error' => '', 'state' => $state));
        $this->load->view('templates/footer');

        // Otherwise
      } else {

        // Pass User Input
        $uploadData = array('upload_data' => $this->upload->data());

        $this->User_model->setInfo($uploadData);

        $this->load->view('templates/header');
        $this->load->view('users/success', $uploadData);
        $this->load->view('templates/footer');
      }
    }

  }
