<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Shop_model');
  }

  public function list_trans() {
//    echo 1;
    $this->load->view('shop/list_trans');
  }
  
  public function detail_trans() {
//    echo 1;
    $this->load->view('shop/detail');
  }

  //////////////////////////// End
}

?>