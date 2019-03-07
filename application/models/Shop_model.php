<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_Model {

  public function complete_trans_shop() {
    $data[order_id] = $_POST[order_id];
    $data[invoice] = $_POST[invoice];
    $data[plan_id] = $_POST[plan_id];
    
    $shop_cost = 0;
    foreach ($_POST[cost] as $key => $val) {
      $shop_cost = $shop_cost + $val[shop_cost];
    }
    $data[price_shopping] = $shop_cost;
    $data[price_pay_driver_com] = $_POST[taxi_cost];
    $data[price_income_company_com] = $_POST[company_cost];
    $data[last_update] = time();
    $data[posted] = $_COOKIE[detect_username];
    $data[pay_transfer] = 1;
    $data[pay_transfer_date] = time();
    $data[trans_hh] = 0;
    $data[trans_mm] = 0;
    $data[status] = 1;

    $data[result] = $this->db->insert(TBL_PAY_HIS_DRIVER_SHOPPING,$data);
    $last_id = mysql_insert_id();
    $return[last_id] = $last_id;
    $return[data] = $data;
    $return[upload] = move_uploaded_file($_FILES["slip_trans"]["tmp_name"],"../data/fileupload/doc_pay_driver/slip/slip_".$_POST[order_id].".jpg");
    $return[path] = "../data/fileupload/doc_pay_driver/slip/slip_".$_POST[order_id].".jpg";
    $update_ob[transfer_money] = 1;
    $update_ob[transfer_money_date] = time();
    $update_ob[total_commission] = $_POST[taxi_cost];
    $this->db->where('id',$_POST[order_id]);
    $update_ob[result] = $this->db->update(TBL_ORDER_BOOKING,$update_ob);
    $update_ob[order_id] = $_POST[order_id];
    $return[update] = $update_ob;

    return $return;
  }

  public function update_cost_each_product() {
    foreach ($_POST[cost] as $key => $val1) {
//      $order_taxi = array();
      if ($val1[taxi][persent] != "") {
        $order_taxi[$key][i_buy_amount] = $val1[shop_cost];
        $order_taxi[$key][f_total_cost] = $val1[taxi][price];
        $_where = array();
        $_where[id] = $val1[taxi][id];
        $order_taxi[$key][result] = $this->db->update($val1[taxi][table],$order_taxi[$key],$_where);
      }
      if ($val1[company][persent] != "") {
        $order_company[$key][i_buy_amount] = $val1[shop_cost];
        $order_company[$key][f_total_cost] = $val1[company][price];
        $_where = array();
        $_where[id] = $val1[company][id];
        $order_company[$key][result] = $this->db->update($val1[company][table],$order_company[$key],$_where);
      }
    }
    $return[taxi] = $order_taxi;
    $return[company] = $order_company;
//    $return[post] = $_POST;
    return $return;
  }
  /**
   * *********** End
   */
}
