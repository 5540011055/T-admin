<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Notification_model');
    $this->load->model('Activity_model');
    $this->load->model('Mobile_model');
  }
  public function index() {

  }
  
  public function switch_setting(){
	$data[$_GET[type]] = $_POST[status];
  	$this->db->where('i_user', $_POST[user_id]);
	$data[result] = $this->db->update("app_user_setting", $data); 
	$data[type] = $_GET[type];
	$data[user] = $_POST[user_id];
	echo json_encode($data);	
  }
  
  public function check_idcard(){
  	$data['res'] = $this->Main_model->check_idcard_overlap();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function check_car_plate(){
  	$data['res'] = $this->Main_model->check_car_plate_overlap();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function check_phone(){
  	$data['res'] = $this->Main_model->check_phone_overlap();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function get_id_province(){
  	$data['res'] = $this->Main_model->get_id_province_only();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function get_data_province(){
  	$data['res'] = $this->Main_model->get_data_province();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function get_data_user(){
  	$query = $this->db->query("select name,nickname,username,i_information from web_driver where id = ".$_GET[id]);
   $row = $query->row();
   echo json_encode($row);
 }

 public function update_num_place(){
   $data['res'] = $this->Main_model->update_num_place_all();
   header('Content-Type: application/json');
   echo json_encode($data['res']);
 }

  /**
  * Query Data
  * 
  * @return
  */
  public function data_car_brand(){
  	$data['res'] = $this->Main_model->query_car_brand();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function data_car_type(){
  	$data['res'] = $this->Main_model->query_car_type();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_car_gen(){
  	$data['res'] = $this->Main_model->query_car_gen();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_car_color(){
  	$data['res'] = $this->Main_model->query_car_color();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_car_plate(){
  	$data['res'] = $this->Main_model->query_car_plate();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_car_province(){
  	$data['res'] = $this->Main_model->query_province();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_user_province(){
  	$data['res'] = $this->Main_model->query_province();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_bank_list(){
  	$data['res'] = $this->Main_model->query_bank_list();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_car_ins_list(){
  	$data['res'] = $this->Main_model->query_car_ins_list();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  /**
  * *end
  */
  public function update_user(){
  	$data['res'] = $this->Main_model->update_user();
//	$data['res'] = 123;
//  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }

  public function rowdata($table,$arr_where,$arr_select) {
    $chk = explode('_',$table);
    $table = ($chk[0] == 'tbl' ? $table : 'tbl_'.$table);
    if ($arr_where) {
      foreach ($arr_where as $key => $value) {
        $this->db->where($key,$value);
      }
    }
    if ($arr_select) {
      foreach ($arr_select as $val_select) {
        $this->db->select($val_select);
      }
    }
    else {
      $this->db->select('*');
    }
    $query = $this->db->get($table)->row();
    return $query;
  }

  public function recordActivityAndNoti(){
    $param = $_POST;
    
    if(isset($param[activity])){
     $data['activity'] = $this->Activity_model->add_activity($param[activity]);
   }

   if(isset($param[notification])){

     if($_COOKIE[detect_userclass]=="taxi"){
      	$data['notification'] = $this->Notification_model->add_notification_lab($param[notification]);
     }else{
      	$data['notification'] = $this->Notification_model->add_notification_taxi($param[notification]);
     }
  }
  echo json_encode($data);
}
public function select_type(){
  header('Content-Type: application/json');
  $_where = array();
  $_order = array();
  if ($_GET[table] == 'shop_sub') {
    $table = TBL_SHOPPING_PRODUCT_SUB;
    $_where['main'] = $_GET[id_sub];
    $_order['topic_en'] = 'asc';
  }
  if ($_GET[table] == 'province') {
    $table = TBL_WEB_PROVINCE;
    $_where['area'] = $_GET[id_sub];
    $_order['name_th'] = 'asc';
  }
  if ($_GET[table] == 'amphur') {
    $table = TBL_WEB_AMPHUR;
    $_where['PROVINCE_ID'] = $_GET[id_sub];
    $this->db->where('name_th<>','');
    $_order['name_th'] = 'asc';
  }
  $_select = array('*');
  $arr = $this->Main_model->fetch_data('','',$table,$_where,$_select,$_order);
    echo json_encode($arr); // $this->load->view('shop/select/select_type');
  }

  public function submitadd_station(){
    $data = $this->Main_model->submitadd_station();
//  $data['res'] = 123;
//    header('Content-Type: application/json');
    echo json_encode($data);
  }

  public function check_num_car_station(){
  	$res = array();
   $_where = array();
   $_where['member'] = $_COOKIE['detect_user'];
   $num = $this->Main_model->num_row(TBL_PLACE_CAR_STATION,$_where);
   echo $num;
 }
 public function search(){
  $keyword = $this->input->post('term');

    // $data['response'] = 'false'; //Set default response

    $query = $this->Main_model->sw_search($keyword); //Model DB search

    if($query->num_rows() > 0){
     $data['response'] = true;
     $data['message'] = array(); 
     $data['keyword'] =  $keyword; 
     foreach($query->result() as $row){
       $_where             = array();
       $_where[id]         = $row->type;
       $_select            = array(
        '*'
      );
       $TYPE      = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE, $_where);
       $data[result] =  $row;
       $data[type] =  $TYPE;

       
      $_where = array();      
      $_select = array('name_th');      
      $arr[province] = $this->Main_model->rowdata(TBL_WEB_PROVINCE,$_where,$_select);
;
      $_where = array();
      $_select = array('name_th');
      $_order = array();
      $arr[amphur] = $this->Main_model->rowdata(TBL_WEB_AMPHUR,$_where,$_select);
      $data['message'][] = array('label'=> $row->topic_th.'('.$TYPE->topic_th.'/'.$arr[province]->name_th.'/'.$arr[amphur]->name_th.')', 'value'=> $row->topic_th.'('.$TYPE->topic_th.'/'.$arr[province]->name_th.'/'.$arr[amphur]->name_th.')', 'station'=>$row->id); 
    }
  }
  else{
    $data['response'] = false;
    $data['message'] = array(); 
    $data['keyword'] =  $keyword; 
  }
  echo json_encode($data);
}
public function search_select(){
 $id     = $this->input->post('id');
 $data = $this->Main_model->search_select( $id );
//  $data['res'] = 123;
//    header('Content-Type: application/json');
 echo json_encode($data);
}
public function move_station(){
 $id     = $_GET[station];
 $data = $this->Main_model->move_station( $id );
//  $data['res'] = 123;
//    header('Content-Type: application/json');
 echo json_encode($data);
}

public function get_timestamp(){
 echo json_encode(time());
}

public function update_user_infomation(){
  $data[i_information] = 1;
  $this->db->where('id', $_GET[id]);
  $data[result] = $this->db->update('web_driver', $data);
  $data[id] = $_GET[id];
  echo json_encode($data);
}

// public function detect
//////////////////////////// End
}