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

    public function setInfo($uploadData) {
        $this->load->helper('url');
        // $slug = url_title($this->input->post('first_name'), 'dash', TRUE);

        // var_dump($up);die;
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
          'file' => $_FILES['userfile']['name']
        );

        return $this->db->insert('UserInfo', $data);
    }

}
