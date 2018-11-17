<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Send_onesignal extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Send_onesignal_model');
  }


public function new_shop()
	{
		$data['res'] = $this->Send_onesignal_model->new_shop();
//  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}

public function cancel_shop(){
//        if($_GET[class_user]=="taxi"){
//          $data['lab'] = $this->Send_onesignal_model->cancel_shop_tolab();
//        }else{
          $data['taxi'] = $this->Send_onesignal_model->cancel_shop_totaxi();
//        }
		
//  		header('Content-Type: application/json');
  		echo json_encode($data);
	}
	
public function send_checkin(){
		
		$data['res'] = $this->Send_onesignal_model->$_GET[type]();
//  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}	


public function acknowledge(){

		$data['res'] = $this->Send_onesignal_model->acknowledge();
//  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}	

public function send_msg_pay_shop(){
		
		$data['res'] = $this->Send_onesignal_model->$_GET[type]();
//  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}	
public function noti_chat(){
		
		$data['res'] = $this->Send_onesignal_model->noti_chat();
//  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}	
}
?>