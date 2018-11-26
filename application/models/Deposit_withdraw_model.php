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

      $total_balance = intval($q_dp->balance) + intval($deposit);
      $up_deposit[balance] = $total_balance;
      $up_deposit[last_update] = time();
      
      $where = array();
      $where[id] = $q_dp->id;
      $up_deposit[result] = $this->db->update(TBL_DEPOSIT,$up_deposit,$where);

      $up_deposit[data][balance] = intval($arr[deposit][balance]);
      $up_deposit[data][deposit] = intval($deposit);
      $up_deposit[data][dv] = $dv_id;
    }
    else {
      $total_balance = $deposit;
      $up_deposit[balance] = $total_balance;
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

  /**
   * *********** End
   */
}
