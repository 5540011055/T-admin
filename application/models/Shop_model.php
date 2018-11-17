<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_Model {

  public function complete_trans_shop() {
    $data[order_id] = $_POST[order_id];
    $data[invoice] = $_POST[invoice];
    $data[plan_id] = $_POST[plan_id];

    $data[price_shopping] = $_POST[shop_cost];
    $data[price_pay_driver_com] = $_POST[taxi_cost];
    $data[price_income_company_com] = $_POST[company_cost];
    $data[last_update] = time();
    $data[posted] = "admin";
    $data[pay_transfer] = 1;
    $data[pay_transfer_date] = time();
    $data[trans_hh] = 0;
    $data[trans_mm] = 0;
    $data[status] = 1;

    $data[result] = $this->db->insert('pay_history_driver_shopping',$data);
    $last_id = mysql_insert_id();
    $return[last_id] = $last_id;
    $return[data] = $data;
    $return[upload] = move_uploaded_file($_FILES["slip_trans"]["tmp_name"],"../data/fileupload/doc_pay_driver/slip/slip_".$_POST[order_id].".jpg");
    $return[path] = "../data/fileupload/doc_pay_driver/slip/slip_".$_POST[order_id].".jpg";
    $update_ob[transfer_money] = 1;
    $update_ob[transfer_money_date] = time();
    $update_ob[total_commission] = $_POST[taxi_cost];
    $this->db->where('id',$_POST[order_id]);
    $update_ob[result] = $this->db->update('order_booking',$update_ob);
    $update_ob[order_id] = $_POST[order_id];
    $return[update] = $update_ob;
    return $return;
  }

  /**
   * *********** End
   */
}
