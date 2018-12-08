<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit_withdraw_model extends CI_Model {

  public function approve_deposit() {
    $id = $_POST[id];
    $deposit = $_POST[deposit];
    $dv_id = $_POST[driver];

    $data[status] = 1;
    $where = array();
    $this->db->select('*');
    $where[driver] = $_POST[driver];
    $query = $this->db->get_where(TBL_DEPOSIT,$where);
    $num_row = $query->num_rows();
    if ($num_row > 0) {
      $q_dp = $query->row();

      $total_balance = $q_dp->balance + $deposit;
      $up_deposit[balance] = $total_balance;
      $up_deposit[deposit] = $q_dp->deposit + $deposit;
      $up_deposit[last_update] = time();

      $where = array();
      $where[id] = $q_dp->id;
      $up_deposit[result] = $this->db->update(TBL_DEPOSIT,$up_deposit,$where);

      $up_deposit[data][balance] = $total_balance;
      $up_deposit[data][deposit] = $deposit;
      $up_deposit[data][dv] = $dv_id;
    }
    else {
      $total_balance = $deposit;
      $up_deposit[balance] = $total_balance;
      $up_deposit[deposit] = $deposit;
      $up_deposit[last_update] = time();
      $up_deposit[driver] = $dv_id;
      $up_deposit[ip] = $_SERVER["SERVER_ADDR"];

      $up_deposit[result] = $this->db->insert(TBL_DEPOSIT,$up_deposit);
    }
    $where = array();
    $where[id] = $id;
    $up_dp_his[status] = 1;
    $up_dp_his[result] = $this->db->update(TBL_DEPOSIT_HISTORY,$up_dp_his,$where);

    $history[deposit_id] = $id;
    $history[deposit] = $deposit;
    $history[type] = $_POST[type];
    $history[approved] = $_COOKIE[detect_username];
    $history[status] = 1;
    $history[ip] = $_SERVER["SERVER_ADDR"];
    $history[last_update] = time();
    $history[post_date] = time();
    $history[result] = $this->db->insert(TBL_DEPOSIT_HISTORY_LOG,$history);

    $result[update][dp_his] = $up_dp_his;
    $result[update][dp] = $up_deposit;
    $result[log] = $history;
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

  public function approve_withdraw() {

    $where = array();
    $where[id] = $_POST[deposit_id];
    $up_dp_his[status] = 1;
    $up_dp_his[result] = $this->db->update(TBL_DEPOSIT_HISTORY,$up_dp_his,$where);

    $history[deposit_id] = $_POST[deposit_id];
    $history[deposit] = $_POST[deposit_wd];
    $history[type] = "WITHDRAW";
    $history[approved] = $_COOKIE[detect_username];
    $history[status] = 1;
    $history[ip] = $_SERVER["SERVER_ADDR"];
    $history[last_update] = time();
    $history[post_date] = time();
    $history[result] = $this->db->insert(TBL_DEPOSIT_HISTORY_LOG,$history);

    $return[p1] = rename("../data/fileupload/doc_pay_driver/transfer/slip_withdraw/".$_POST[rand_withdraw].".jpg","../data/fileupload/doc_pay_driver/transfer/slip_withdraw/".$_POST[deposit_id].".jpg");

//    $where = array();
//    $this->db->select('*');
//    $where[driver] = $_POST[driver];
//    $query = $this->db->get_where(TBL_DEPOSIT,$where);

    $return[his] = $up_dp_his;
    $return[log] = $history;
    $return[post] = $_POST;

    return $return;
  }

  public function reject_withdraw() {
    $cost = $this->input->post('deposit');

    $where = array();
    $this->db->select('*');
    $where[driver] = $this->input->post('driver');
    $query = $this->db->get_where(TBL_DEPOSIT,$where);
    $main_dp = $query->row();
    
    $where = array();
    $mian[withdraw] = $main_dp->withdraw + $cost; // reject
    $mian[balance] = $main_dp->balance + $cost; // reject
    $where[driver] = $this->input->post('driver');
    $mian[result] = $this->db->update(TBL_DEPOSIT,$mian,$where);

    $where = array();
    $dp[status] = 2; // reject
    $where[id] = $this->input->post('id');
    $dp[result] = $this->db->update(TBL_DEPOSIT_HISTORY,$dp,$where);

    $his[status] = 2; // reject
    $his[cause] = $this->input->post('cause');
    $his[deposit_id] = $this->input->post('id');
    $his[deposit] = $cost;
    $his[approved] = $_COOKIE[detect_username];
    $his[type] = $this->input->post('type');
    $his[last_update] = time();
    $his[post_date] = time();
    $his[ip] = $_SERVER["SERVER_ADDR"];
    $his[result] = $this->db->insert(TBL_DEPOSIT_HISTORY_LOG,$his);

    $return[main] = $mian;
    $return[dp] = $dp;
    $return[his] = $his;
    
    return $return;
  }

  /**
   * *********** End
   */
}
