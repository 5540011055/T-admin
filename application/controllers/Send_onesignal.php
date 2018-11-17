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
		$data['res'] = $this->Send_onesignal_model->cancel_shop();
//  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}	
    
public function transfer_shop_completed(){
		$data['res'] = $this->Send_onesignal_model->transfer_shop_completed();
//  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
//  echo 777;
	}	
}
?>