<?php
/**
* Create Upload_model Class
*/
class Upload_model extends CI_Model
{

  function __construct()
  {
      // Connect to the database
      $this->load->database();
  }

  public function getInfo($slug = FALSE)
  {
      if ($slug === FALSE)
      {
          $users = $this->db->get('users', 'users');
          return $query->result_array();
      }

      $query = $this->db->get_where('users', array($slug => $slug));
      return $query->row_array();
  }

  public function getState() {
      $states = $this->db->get('state', 'states');
      var_dump($states);die;
  }
