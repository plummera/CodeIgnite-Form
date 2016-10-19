<?php

  class Form extends CI_Controller {

    public function__construct() {
      parent::__construct();
      $this->load->model('UserInfo_model');
      $this->load->helper('url_helper');
    }

    public function index() {
      $data['UserInfo'] = $this->UserInfo_model->getInfo();
      $data['title'] = 'The Guest List';

      $this->load->view('templates/header', $data);
      $this->load->view('home', $data);
      $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
      $data['UserInfo_item'] = $this->UserInfo_model->getInfo($slug);

      if (empty($data['UserInfo_item'])) {
        show_404();
      }

      $data['title'] = $data['UserInfo_item']['title'];

      $this->load->view('templates/header', $data);
      $this->load-view('users/view', $data);
      $this->load-view('templates/footer');
    }

    public function create() {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['title'] = "Create a new user";

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('text', 'Text', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('UserInfo/create', $data);
        $this->load->view('templates/footer');
      } else {
        $this->UserInfo_model->set_UserInfo();
        $this->load->view('UserInfo/success');
      }
    }
  }
