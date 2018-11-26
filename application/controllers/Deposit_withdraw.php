<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit_withdraw extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Deposit_withdraw_model');
  }

  public function withdraw() {
    $this->load->view('deposit_withdraw/withdraw');
  }
  
   public function deposit() {
    $this->load->view('deposit_withdraw/deposit');
  }
   
  public function deposit_detail() {
    $this->load->view('deposit_withdraw/deposit_detail');
  }
  
  public function approve_deposit($param) {
    $data = $this->Deposit_withdraw_model->approve_deposit();
    echo json_encode($data);
//    echo json_encode($_POST);
  }
  
  public function reject_deposit($param) {
    $data = $this->Deposit_withdraw_model->reject_deposit();
    echo json_encode($data);
  }

  //////////////////////////// End
}

?>