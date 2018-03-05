<?php
class API extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('api_model');
    $this->load->helper('url');
  }
  
  public function index(){
    # $data['']

  }
  
  private function isAuthorizedUserAgent(){
    return true;
  }
  
  public function attempt_user_sign_up(){
    if($this->isAuthorizedUserAgent()){
      $data = json_decode($this->input->post('json', TRUE));
      
      $successful = $this->api_model->insertNewUser($data->username, $data->email, $data->password);

      echo json_encode($this->db->error());
    }
  }
  
  public function validity_checker(){
    if($this->isAuthorizedUserAgent()){
      $data = json_decode($this->input->post('json', TRUE));
      switch($data){
        case 'unique': 
          __check_uniqueness($data->value);
          break;
      }
    }
  }
  
  private function __check_uniqueness($value){
    return $this->api_model->checkExists($value);
  }
  
  public function is_userbase_empty(){
    if($this->isAuthorizedUserAgent()){
      echo $this->api_model->getUsers();
    }
  }
  
  public function authenticate_user_agent(){
    echo !!$this->isAuthorizedUserAgent();
  }
}
?>
