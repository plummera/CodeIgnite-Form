<?php

  class Upload extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper(array('form', 'url'));
    }

    public function do_upload() {
      $config['upload_path']      = './uploads/';
      $config['allowed_types']    = 'gif|jpg|png|doc|txt|rtf|docx|pdf';
      $config['max_size']         = '100';

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('userfile')) {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('upload_form', $error);
      } else {
        $data = array('upload_data' => $this->upload->data());
        $this->load->view('users/success', $data);
      }
    }

  }
