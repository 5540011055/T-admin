<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends CI_Controller {
  public function __construct() {
    parent::__construct();
	$this->load->model('Notification_model');
  }
  public function index() {

  }
  
  public function add_notification(){
  	
  	if($_COOKIE[detect_userclass]=="taxi"){
			$data['res'] = $this->Notification_model->add_notification_lab();
	}else{
			$data['res'] = $this->Notification_model->add_notification_taxi();
	}
  	echo json_encode($data['res']);
  }
  
  public function count_notification(){
  		$this->db->select('id');

		$this->db->where('i_user = '.$_GET[id_user].' and i_active = 0 ');

		$query = $this->db->get('notification_event_'.$_COOKIE[detect_userclass]);
		$num = $query->num_rows();
	echo json_encode($num);	
  }
  
  public function read_notification(){
  		$data['res'] = $this->Notification_model->read_notification();
  		echo json_encode($data['res']);
  }
  
  public function delete_notification(){
  		$data['res'] = $this->Notification_model->delete_notification();
  		echo json_encode($data['res']);
  }
  
  public function change_status_notification(){
  		$data['res'] = $this->Notification_model->change_status_notification();
  		echo json_encode($data['res']);
  }
  
  public function load_more_noti(){
  		$data['res'] = $this->Notification_model->query_data_noti();
  		echo json_encode($data['res']);
  }
  public function hide_notification_all(){
  		$data['res'] = $this->Notification_model->hide_noti_all();
  		echo json_encode($data['res']);
  }
  public function show_notification_hide(){
  		$data['res'] = $this->Notification_model->show_notification_hide();
  		echo json_encode($data['res']);
  }

}