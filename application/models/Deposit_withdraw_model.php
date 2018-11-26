<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit_withdraw_model extends CI_Model {

  public function approve_deposit() {
    $id = $_GET[id];
    $deposit = $_POST[deposit];
    $dv_id = $_POST[driver];

    $data[status] = 1;
//	$data[result] = $db->update_db("deposit_history",$data,"id = '".$id."' ");
    $where = array();
    $this->db->select('id, driver');
    $where[driver] = $_POST[driver];
    $query = $this->db->get_where(TBL_DEPOSIT,$where);
    $num_row = $query->num_rows();
    if ($num_row > 0) {
      $dv_id = $this->db->insert_id();
//		$res[deposit] = $db->select_query("select balance,id from deposit where driver = ".$dv_id." ");
//	    $arr[deposit] = $db->fetch($res[deposit]);
      $total_balance = intval($arr[deposit][balance]) + intval($deposit);
      $up_deposit[balance] = $total_balance;
      $up_deposit[last_update] = time();
      
      $param[status] = 2; // reject
      $where[id] = $query->row()->id;
      $up_deposit[result] = $this->db->update(TBL_DEPOSIT,$param,$where);
      
//		$up_deposit[result] = $db->update_db("deposit",$up_deposit,"driver = '".$dv_id."' ");
      $up_deposit[data][balance] = intval($arr[deposit][balance]);
      $up_deposit[data][deposit] = intval($deposit);
      $up_deposit[data][dv] = $dv_id;
    }
    else {
      $total_balance = intval($arr[deposit][balance]) + intval($deposit);
      $up_deposit[balance] = $total_balance;
      $up_deposit[last_update] = time();
      $up_deposit[driver] = $dv_id;
      $up_deposit[ip] = 0;
      
      $up_deposit[result] = $this->db->insert(TBL_DEPOSIT,$up_deposit);
//		$up_deposit[result] = $db->add_db("deposit",$up_deposit);
      $id = $this->db->insert_id();
    }

    $history[deposit_id] = intval($id);
    $history[deposit] = $deposit;
    $history[type] = $_POST[type];
    $history[approved] = $_COOKIE[detect_username];
    $history[status] = 1;
    $history[ip] = $_SERVER["SERVER_ADDR"];
    $history[last_update] = time();
    $history[post_date] = time();
//	$history[result] = $db->add_db("history_approve_transfer",$history);

    $result[update][dp_his] = $data;
    $result[update][dp] = $up_deposit;
    $result[histoy] = $history;
    return $result;
  }

  public function reject_deposit() {
    $dp[status] = 2; // reject
    $where[id] = $this->input->post('id');
    $dp[result] = $this->db->update(TBL_DEPOSIT_HISTORY,$dp,$where);

    $his[status] = 2; // reject
    $his[cause] = $this->input->post('cause');
    $his[deposit_id] = $this->input->post('id');
    $his[deposit] = $this->input->post('deposit');
    $his[approved] = $_COOKIE[detect_username];
    $his[type] = $this->input->post('type');
    $his[last_update] = time();
    $his[post_date] = time();
    $his[ip] = $_SERVER["SERVER_ADDR"];
    $his[result] = $this->db->insert(TBL_DEPOSIT_HISTORY_LOG,$his);

    $return[dp] = $dp;
    $return[his] = $his;
    return $return;
  }

  /**
   * *********** End
   */
}
