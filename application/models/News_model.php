<?php
class News_model extends CI_Model {

    public function __construct() {
      $this->load->database();
    }

    public function getInfo($slug = FALSE) {

      if ($slug == FALSE) {
        $query = $this->db->get('UserInfo');
        return $query->result_array();
      }

      $query = $this->db->get_where('UserInfo', array('slug' => $slug));
      return $query->row_array();
    }
}
