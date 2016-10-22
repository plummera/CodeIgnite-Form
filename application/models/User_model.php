<?php
class User_model extends CI_Model {

    public function __construct() {
      $this->load->database();
    }

    public function getInfo($slug = FALSE) {

      if ($slug == FALSE) {
        $query = $this->db->get('UserInfo');
        return $query->result_array();
      }

      $query = $this->db->get_where('UserInfo', array('slug' => $slug));
      return $query->row_array($slug);
    }

    public function setInfo() {
        $this->load->helper('url');
        // $slug = url_title($this->input->post('first_name'), 'dash', TRUE);

        $data = array(
          // 'slug' => $slug,
          'first_name' => $this->input->post('first_name'),
          'last_name' => $this->input->post('last_name'),
          'address1' => $this->input->post('address1'),
          'address2' => $this->input->post('address2'),
          'city' => $this->input->post('city'),
          'state' => $this->input->post('state'),
          'zipcode' => $this->input->post('zipcode'),
          'phone' => $this->input->post('phone'),
          'email' => $this->input->post('email'),
          'company_name' => $this->input->post('company_name'),
          'company_address' => $this->input->post('company_address'),
          'company_city' => $this->input->post('company_city'),
          'company_state' => $this->input->post('company_state'),
          'company_zipcode' => $this->input->post('company_zipcode'),
          'company_phone' => $this->input->post('company_phone'),
          'userfile' => $_FILES['userfile'],
        );

        return $this->db->set('UserInfo', $data);
    }

    public function setFile() {
      $this->load->helper(array('form', 'url'));

      $config['upload_path']      = './upload/';
      $config['allowed_types']    = 'pdf';
      $config['max_size']         = '1000000000';
      $config['encrypt_name']     = FALSE;

       $upload = $this->load->library('upload', $config);
       $this->upload->initialize($config);
       $file = 'userfile';

       $data = array('upload_data' => $this->upload->data());
       if (!$this->upload->do_upload($file)) {
         $error = array('error' => $this->upload->display_errors());
         echo "Checkpoint #2";
         $this->load->view('templates/header');
         $this->load->view('users/create', $error);
         $this->load->view('templates/footer');
       } else {
        $this->load->view('templates/header');
        $this->load->view('users/success');
        $this->load->view('templates/footer');
      }
    }

}
