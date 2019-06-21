<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Shop_model');
  }

  public function test() {
//    $_POST[id] = 1;
//    $_GET[option] = "_company";
    // $tbl = '';
    $_where = array();
    $_where['i_shop'] = $_GET[id];
    // $_where['i_shop'] = 1;
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';

    $data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COMPANY,$_where,$_select,$_order);
//    echo "<pre>";
//    print_r($data['region']);
//    echo "</pre>";
    $this->load->view('shop/test',$data);
    // echo json_encode(TBL_SHOP_COUNTRY.$_GET[option]);
  }

  public function list_trans() {
//    echo 1;
    $this->load->view('shop/list_trans');
  }

  public function detail_trans() {
//    echo 1;
    $this->load->view('shop/detail_new');
  }

  public function detail_trans_his() {
//    echo 1;
    $this->load->view('shop/detail_his');
  }

  public function shop_manage_mo() {

    $this->load->view('shop/shop_manage_mo');

//    $this->load->view('shop/shop_manage_lab');
//    echo 123;
  }

  public function shop_manage_his() {

    $this->load->view('shop/shop_manage_his');

//    $this->load->view('shop/shop_manage_lab');
//    echo 123;
  }

  public function complete_trans_shop() {
    
//    $data['res'] = $this->Shop_model->complete_trans_shop();
//    $data['each'] = $this->Shop_model->update_cost_each_product();
    $data['post'] = $_POST;
    echo json_encode($data);
//    echo json_encode($_FILES);
  }

  //////////////////////////// End
}

?>