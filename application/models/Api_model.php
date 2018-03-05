<?php
class Api_model extends CI_Model{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }
  
  public function insertNewUser($username, $email, $password){
    $data = array(
      'username' => $username,
      'passwordHash' => password_hash($password, PASSWORD_DEFAULT),
      'email' => $email
    );
    
    $this->db->insert('tblUsers', $data);
  }
  
  public function checkExists($value, $column){
    $query = $this->db->query("SELECT * FROM tblUsers WHERE ");
  }
  
  public function getUsers(){
    $query = $this->db->get('tblUsers');
    return !!$query->result_array();
  }
}
?>
