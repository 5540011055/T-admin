<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification_model extends CI_Model {

  public function add_notification_taxi($param){
  		if($param[i_type]==1){
			$setting_col = "i_noti_shop";
		}else if($param[i_type]==2){
			$setting_col = "i_noti_transfer";
		}else if($param[i_type]==5 or $param[i_type]==6){
			$setting_col = "i_noti_wallet";
		}
//        return $setting_col;
  		$query = $this->db->query("select ".$setting_col." as noti_set from app_user_setting where i_user = ".$param[i_user]);
  		$row = $query->row();
        
  		if($row->noti_set>0){
//	  		$_POST = $data;
	  		$to_table = "notification_event_taxi";
	  		$data[i_type] = $param[i_type];
	  		$data[i_event] = $param[i_event];
	  		$data[i_user] = $param[i_user];
	  		$data[s_class_user] = $param[s_class_user];
	  		$data[s_topic] = $param[s_topic];
	  		$data[s_message] = $param[s_message];
	  		$data[i_active] = 0;
	  		$data[i_status] = 1;
	  		$data[s_posted] = $param[s_posted];
	  		$data[s_post_date] = time();
	  		$data[s_last_update] = time();  		
	  		
	  		$result = $this->db->insert($to_table, $data);
	  		$data[result] = $result;
	  		return $data;
          
		}else{
			$ret[result] = false;
			$ret[mgs] = "this user off noti";
			return $ret;
		}
  		
  }
  
  public function add_notification_lab($data){
      
//  		$_POST = $data;
  		$to_table = "notification_event_lab";
  		if($data[i_type]==1){
			$setting_col = "i_noti_shop";
		}else if($data[i_type]==2){
			$setting_col = "i_noti_transfer";
		}else if($data[i_type]==5 or $data[i_type]==6){
			$setting_col = "i_noti_wallet";
		}
  		$query = $this->db->query("select t1.id, t2.".$setting_col." as noti_set from web_driver as t1 left join app_user_setting as t2 on t1.id = t2.i_user where t1.username LIKE '%lab%'  ");
  		$key = 0;
		foreach ($query->result() as $row)
		{
			if($row->noti_set>0){
				
				if($data[i_user]!=$row->id){
					
			        $data[i_type] = $data[i_type];
			  		$data[i_event] = $data[i_event];
			  		$data[i_user] = $row->id;
			  		$data[s_class_user] = $data[s_class_user];
			  		$data[s_topic] = $data[s_topic];
			  		$data[s_message] = $data[s_message];
			  		$data[i_active] = 0;
			  		$data[i_status] = 1;
			  		$data[s_posted] = $data[s_posted];
			  		$data[s_post_date] = time();
			  		$data[s_last_update] = time();  		
			  		
			  		$result = $this->db->insert($to_table, $data);
			  		$return[$key][result] = $result;
			  		$return[$key][data] = $data;
			  		$key++;
			  		
				}else{
					$return[$key][result] = TRUE;
					$return[$key][mgs] = "this user off noti";
				}
				
			}
		}
  		return $return;
  } 

  public function read_notification() {
   	$id = $_GET[id];
   	$ac[i_active] = $_POST[i_active];
   	if($_COOKIE[detect_userclass]=="taxi"){
		$table = "notification_event_taxi";
	}else{
		$table = "notification_event_lab";
	}
	$this->db->where('id', $id);
	$ac[result] = $this->db->update($table, $ac); 
	$ac[id] = $id;
    return $ac;
  }
  
  public function delete_notification(){
  		if($_COOKIE[detect_userclass]=="taxi"){
			$table = "notification_event_taxi";
			$table_lg = "notification_event_taxi_logs";
		}else{
			$table = "notification_event_lab";
			$table_lg = "notification_event_lab_logs";
		}
  		$query = $this->db->query("select * from ".$table." where id = ".$_POST[id]);
		$row = $query->row();
		
	       foreach($row as $key=>$val){        
	          if($key != "id"){ 
	          
	          $this->db->set($key, $val);               
	          }
	          else{
			  	 $this->db->set("i_noti_event", $val);
			  }          
	       }
     
		$backup = $this->db->insert($table_lg); 
		if($backup){
			$delete = $this->db->delete($table, array('id' => $_POST[id])); 
		}
		$return[backup] = $backup;
		$return[deleted] = $delete;
		
	    return $return;
		
  }
  
  public function change_status_notification(){
  	$id = $_GET[id];
   	$ac[i_status] = $_POST[i_status];
   	
	$this->db->where('id', $id);
	$cs[result] = $this->db->update('notification_event_'.$_COOKIE[detect_userclass], $ac); 
	$cs[id] = $id;
    return $cs;
  }	
  
  public function query_data_noti(){
  	$limit = $_GET[limit];
  	$start = $_GET[start];
  	$query = $this->db->query("SELECT t1.*,t2.s_topic as ac_topic, t2.s_icons, t2.s_material_icons, t2.s_color FROM notification_event_".$_COOKIE[detect_userclass]." as t1 left join menu_list as t2 on t1.i_type = t2.id where t1.i_user = ".$_COOKIE[detect_user]." and t1.i_status = 1 order by t1.s_post_date desc limit ".$start.",".$limit);
  	$num = $query->num_rows();
	foreach ($query->result() as $row){
	       $data[] = $row;
	}
	$return[data] = $data;
	$return[numrow] = $num;
	
	$query_all = $this->db->query("SELECT id FROM notification_event_".$_COOKIE[detect_userclass]." where i_user = ".$_COOKIE[detect_user]." and i_status = 1");
  	$num_all = $query_all->num_rows();
	$return[rest] = intval($num_all) - (intval($start) + intval($limit));
	return $return;
  }

  public function hide_noti_all(){
  		$id = $_GET[user_id];
  		
  		$update[i_active] = 1;
  		$update[s_last_update] = time();
  		$this->db->where('i_user', $id);
		$update[result] = $this->db->update('notification_event_'.$_COOKIE[detect_userclass], $update); 
		$update[i_user] = $id;
		$update[tb] = 'notification_event_'.$_COOKIE[detect_userclass];
    	return $update;
  }
  
  public function show_notification_hide(){
  		$id = $_GET[user_id];
  		
  		$update[i_status] = 1;
  		$update[s_last_update] = time();
  		$this->db->where('i_user', $id);
		$update[result] = $this->db->update('notification_event_'.$_COOKIE[detect_userclass], $update); 
		$update[i_user] = $id;
		$update[tb] = 'notification_event_'.$_COOKIE[detect_userclass];
    	return $update;
  }
  /**
  * *********** End
  */
}