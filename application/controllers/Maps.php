<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Maps extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Maps_model');
		$this->load->model('Main_model');
	}


	public function map_shop_checkin(){
		
		$arr_where = array();
		// $arr_where['id'] = $_POST[order_id];
		$arr_where['id'] = 119;
		$arr_select = array('*');
    // $arr_order = array();
    // $arr_order['id'] = 'ASC';
		$data['book'] = $this->Main_model->rowdata(TBL_ORDER_BOOKING, $arr_where, $arr_select);

		$arr_where = array();
		$arr_where['id'] = $this->input->cookie('detect_user');
		$arr_select = array('*');

		$data['driver'] = $this->Main_model->rowdata(TBL_WEB_DRIVER, $arr_where, $arr_select);
		// echo json_encode($data);
		$this->load->view('map/map_point',$data);
	}
	
}
