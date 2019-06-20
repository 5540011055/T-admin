<style>
  .list-pd-r{
    padding-left: 15px;
  }
  .txt-center{
    color: #afafaf;
  }
</style>
<?php
$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_GET[order_id]),array('*'));

$sql_ps = "SELECT topic_th,id,province,lat,lng,address,main,sub FROM shopping_product  WHERE id='".$data->program."' ";
$query_ps = $this->db->query($sql_ps);
$res_ps = $query_ps->row();

$_where = array();
$_where[i_order_booking] = $_GET[order_id];
$this->db->select('*');
$query_chk = $this->db->get_where(TBL_COM_ORDER_BOOKING_LOGS,$_where);
if ($query_chk->num_rows() > 0) {
  $res_booking = $query_chk;
  $table_to_get_taxi = TBL_ORDER_BOOKING_COM_CHANGE_PLAN;
  $table_to_get_taxi_main = TBL_COM_ORDER_BOOKING_LOGS;
}
else {
  $_where = array();
  $_where[i_order_booking] = $_GET[order_id];
  $this->db->select('*');
  $res_booking = $this->db->get_where(TBL_COM_ORDER_BOOKING,$_where);
  $table_to_get_taxi = TBL_ORDER_BOOKING_COM;
  $table_to_get_taxi_main = TBL_COM_ORDER_BOOKING;
}

//$_where = array();
//$_where[i_order_booking] = $_GET[order_id];
//$_where[i_main_list] = 5;
//$this->db->select('*');
//$query_chk_company = $this->db->get_where(TBL_COM_ORDER_BOOKING_COMPANY,$_where);
//if ($query_chk_company->num_rows() > 0) {
//  $res_booking_company = $query_chk_company;
//  $table_to_get_company_sub = TBL_ORDER_BOOKING_COM_COMPANY;
//  $table_to_get_main_company = TBL_COM_ORDER_BOOKING_COMPANY;
//}
//else {
//  $_where = array();
//  $_where[i_order_booking] = $_GET[order_id];
//  $_where[i_main_list] = 5;
//  $this->db->select('*');
//  $res_booking_company = $this->db->get_where(TBL_COM_ORDER_BOOKING_COMPANY_LOGS,$_where);
//  $table_to_get_company_sub = TBL_ORDER_BOOKING_COM_COMPANY_CHANGE_PLAN;
//  $table_to_get_main_company = TBL_COM_ORDER_BOOKING_COMPANY_LOGS;
//}

$_where = array();
$_where[i_order_booking] = $_GET[order_id];
$_where[i_main_list] = 5;
$this->db->select('*');
$query_chk_company = $this->db->get_where(TBL_COM_ORDER_BOOKING_COMPANY_LOGS,$_where);
if ($query_chk_company->num_rows() > 0) {
  $res_booking_company = $query_chk_company;
  $table_to_get_company_sub = TBL_ORDER_BOOKING_COM_COMPANY_CHANGE_PLAN;
  $table_to_get_main_company = TBL_COM_ORDER_BOOKING_COMPANY_LOGS;
}
else {
  $_where = array();
  $_where[i_order_booking] = $_GET[order_id];
  $_where[i_main_list] = 5;
  $this->db->select('*');
  $res_booking_company = $this->db->get_where(TBL_COM_ORDER_BOOKING_COMPANY,$_where);
  $table_to_get_company_sub = TBL_ORDER_BOOKING_COM_COMPANY;
  $table_to_get_main_company = TBL_COM_ORDER_BOOKING_COMPANY;
}

//echo "<pre>";
//print_r($res_booking_company->result());
//echo "</pre>";

$plan_pack = $res_booking->row()->i_plan_pack;

$_where = array();
$_where[id] = $plan_pack;
$this->db->select('*');
$query_plan = $this->db->get_where(TBL_PLAN_PACK,$_where);
$res_plan = $query_plan->row();

$_where = array();
$_where[id] = $res_plan->i_country;
$this->db->select('*');
$query_country = $this->db->get_where(TBL_WEB_COUNTRY,$_where);
$res_country = $query_country->row();
//echo "<pre>";
//print_r($res_booking->result());
//echo "</pre>";
?>

<?php
if ($data->transfer_money > 0) {
  $status_intro = '<span class="font-22" style="color: #2cce33;">เสร็จสมบูรณ์</span>';
}
else {
  $status_intro = '<span class="font-22" style="color: #ffa101;">รอการแจ้งโอน</span>';
}
?>
<div style="padding: 10px 0px;">
  <p class="intro">
    <?=$status_intro;?><br/>
    <span class="font-16 txt-center">ยืนยันการโอนเงิน ระบบจะแจ้งเตือนให้กับแท็กซี่อัตโนมัติ</span>
  </p>
</div>

<form name="form_acc_trans_shop" id="form_acc_trans_shop"  enctype="multipart/form-data" class="form-horizontal form-bordered" role="form">
  <div style="padding: 0px 0px;  ">
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">เลขการจอง</span>
      </div>
      <div class="right">
        <span class="font-16"><?=$data->invoice;?></span>
      </div>
    </ons-list-item>
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">สถานที่ส่ง</span>
      </div>
      <div class="right">
        <span class="font-16"><?=$res_ps->topic_th;?></span>
      </div>
    </ons-list-item>
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">จำนวนแขก</span>
      </div>
      <div class="right">
        <span class="font-16">ผู้ใหญ่ <?=$data->adult;?> เด็ก <?=$data->child;?></span>
      </div>
    </ons-list-item>
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">สัญชาติ</span>
      </div>
      <div class="right">
        <img src="<?=base_url();?>assets/images/flag/icon/<?=$res_country->country_code;?>.png" width="25" height="25" alt="">
        &nbsp;&nbsp;
        <span class="font-16" id="txt_county_pp"><?=$res_country->name_th;?></span>
      </div>
    </ons-list-item>
  </div>

  <div style="margin: 15px 0px;margin-bottom: 30px;">
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">ค่าตอบแทน</span>
      </div>
      <div class="right">
        <span class="font-16"><?=$res_plan->s_topic;?></span>
      </div>
    </ons-list-item>
    <?php
    $total_price = 0;
    foreach ($res_booking->result() as $key => $val) {

      $_where = array();
      $_where[id] = $val->i_plan_main;
      $this->db->select('s_topic,s_unit');
      $query_planmain = $this->db->get_where(TBL_PLAN_MAIN,$_where);
      $res_planmain = $query_planmain->row();
      $unit = $res_planmain->s_unit;

      if ($val->i_main_list == 5) {
        $pack_list_com = $val->plan_pack_list;
        $pack_com = $val->i_plan_pack;
//        $_where = array();
//        $_where[id] = $val->i_plan_main;
//        $this->db->select('s_topic,s_unit');
//        $query_planmain = $this->db->get_where(TBL_ORDER_BOOKING_COM,$_where);

        $echo_price = '<span class="font-16" style="color:#FF0000;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> รอดำเนินการ</span>';
      }
      else {
        $echo_price = number_format($val->i_price,0)." ".$unit;
        $total_price = floatval($total_price) + floatval($val->i_price);
      }
      ?>

      <ons-list-item>
        <div class="center list-pd-r">
          <span class="font-16 txt-center"><?=$res_planmain->s_topic;?></span>
        </div>
        <div class="right">
          <span class="font-16"><?=$echo_price;?></span>
        </div>
      </ons-list-item>

    <?php }
    ?>
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">รวม</span>
      </div>
      <div class="right">
        <span class="font-16"><?=number_format($total_price,0);?> บ.</span>
      </div>
    </ons-list-item>
  </div>

  <div style="margin: 15px 0px;  ">	
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">เวลาสร้าง</span>
      </div>
      <div class="right">
        <span class="font-16"><?=date("Y-m-d H:i:s",$data->post_date);?></span>
      </div>
    </ons-list-item>
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">เวลาเสร็จสิ้น</span>
      </div>
      <div class="right">
        <span class="font-16"><?=date("Y-m-d H:i:s",$data->guest_register_date);?></span>
      </div>
    </ons-list-item>
  </div>
  
  <?php 
  
  
  
  ?>
  <ons-card style="margin-top: 10px; margin-bottom: 0px;">
    <ons-row>
      <ons-col>
        <ons-list-header>ข้อมูลค่าตอบแทน  <b style="font-size:14px;"> (ร้านค้า >> ทีแชร์)</b></ons-list-header>
        <div class="center list-pd-r"><?php // print_r($res_booking_company->row()->i_plan_pack); ?>
          <table width="100%">
            <?php
            $_where = array();
            $_where[i_plan_pack] = $res_booking_company->row()->i_plan_pack;
            $_where[i_order_booking] = $_GET[order_id];
            $this->db->select('*');
            $con_pd_type = $this->db->get_where($table_to_get_company_sub,$_where);

            foreach ($con_pd_type->result() as $key => $value) {
              $_where = array();
              $_where[id] = $value->i_con_com_product_type;
              $this->db->select('plan_pack_list');
              $query = $this->db->get_where($table_to_get_main_company,$_where);
              $data_com_order_bk_company = $query->row();
//              echo $table_to_get_main_company;
              $_where = array();
              $_where[id] = $data_com_order_bk_company->plan_pack_list;
//              $_where[i_main_list] = $data_com_order_bk_company->i_main_list;
              $this->db->select('i_product_sub_typelist');
              $cxx = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
              $cxx = $cxx->row();


              $_where = array();
              $_where[id] = $cxx->i_product_sub_typelist;
              $this->db->select('i_main_typelist');
              $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
              $data_pd_sub_typelist = $query->row();
//
              $_where = array();
              $_where[id] = $data_pd_sub_typelist->i_main_typelist;
              $this->db->select('topic_th');
              $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
              $s_sub_typelist = $query->row();
              ?>
              <tr>
                <td  width="80%"><span class="font-14"><?=$s_sub_typelist->topic_th;?></span></td>
                <td><span class="font-14"><?=$value->i_price;?> %</span></td>
              </tr>
            <?php }
            ?>

          </table>
        </div>
      </ons-col>
    </ons-row>

    <ons-row>
      <ons-col>
        <ons-list-header>ข้อมูลค่าตอบแทน  <b style="font-size:14px;"> (ทีแชร์ >> แท็กซี่) </b></ons-list-header>
        <div class="center list-pd-r">

          <table width="100%">
            <?php
//            echo $pack_com;
            $_where = array();
            $_where[i_plan_pack] = $pack_com;
            $_where[i_order_booking] = $_GET[order_id];
            $this->db->select('*');
            $con_pd_type_taxi = $this->db->get_where($table_to_get_taxi,$_where);

            foreach ($con_pd_type_taxi->result() as $key => $value) {

              $_where = array();
              $_where[id] = $value->i_con_com_product_type;
//              $_where[i_main_list] = $data_com_order_bk_company->i_main_list;
              $this->db->select('i_product_sub_typelist');
              $cxx = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
              $cxx = $cxx->row();


              $_where = array();
              $_where[id] = $cxx->i_product_sub_typelist;
              $this->db->select('i_main_typelist');
              $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
              $data_pd_sub_typelist = $query->row();

              $_where = array();
//          $_where[status] = 1;
              $_where[id] = $data_pd_sub_typelist->i_main_typelist;
              $this->db->select('topic_th');
              $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
              $s_sub_typelist = $query->row();
              ?>
              <tr>
                <td width="80%"><span class="font-14"><?=$s_sub_typelist->topic_th;?></span></td>
                <td><span class="font-14"><?=$value->i_price;?> %</span></td>
              </tr>
            <?php }
            ?>

          </table>
        </div>
      </ons-col>
    </ons-row>

  </ons-card>

  <ons-card style="margin-top: 10px; margin-bottom: 0px;">
    <ons-row>
      <ons-col>
        <ons-list-header>ข้อมูลการซื้อ</ons-list-header>
        <?php
//        echo $data->id;
        $_where = array();
        $_where[i_plan_pack] = $res_booking_company->row()->i_plan_pack;
        $_where[i_order_booking] = $_GET[order_id];
        $this->db->select('*');
        $con_pd_type_company = $this->db->get_where($table_to_get_company_sub,$_where);
//        echo "<pre>";
//        print_r($con_pd_type_company->result());
//        echo $table_to_get_company_sub;
//        print_r($con_pd_type_taxi->result());
//        echo $table_to_get_taxi;
//        echo "</pre>";
//        $_where = array();
//        $_where['i_order_booking'] = $data->id;
//        $this->db->select('*');
//        $query_newplan = $this->db->get_where(TBL_COM_ORDER_BOOKING_COM_CHANGE_PLAN,$_where);
//        if ($query_newplan->num_rows() > 0) {
//          $query_lp = $query_newplan;
//        }
//        else {
//          $_where = array();
//          $_where['i_order_booking'] = $data->id;
//          $this->db->select('*');
//          $query_lp = $this->db->get_where(TBL_COM_ORDER_BOOKING_COM,$_where);
//        }
        foreach ($con_pd_type_company->result() as $key => $val) {
          $_where = array();
          $_where[id] = $val->i_con_com_product_type;
          $this->db->select('*');
          $query = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
          $data_pd_con_pd_type = $query->row();
//          echo $table_to_get_taxi;



          $_where = array();
          $_where[id] = $data_pd_con_pd_type->i_product_sub_typelist;
          $this->db->select('*');
          $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
          $data_pd_sub_typelist = $query->row();

          $_where = array();
          $_where[id] = $data_pd_sub_typelist->i_main_typelist;
          $this->db->select('*');
          $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
          $s_sub_typelist = $query->row();


          $this->db->select('t1.*');
          $this->db->from($table_to_get_taxi.' as t1');
          $this->db->join(TBL_CON_COM_PRODUCT_TYPE.' as t2','t1.i_con_com_product_type = t2.id');
          $_where = array();
          $_where['t2.i_product_sub_typelist'] = $data_pd_con_pd_type->i_product_sub_typelist;
          $_where['t1.i_order_booking'] = $_GET[order_id];
          $this->db->where($_where);
          $query_join = $this->db->get();
          $res_taxi_price = $query_join->row();
//          echo "<pre>";
//          print_r();
//          echo "</pre>";
          ?>
          <ons-list-item class="input-items">
            <div class="left" style="width: 40%;">
              <span class="font-14"><?=$s_sub_typelist->topic_th;?></span>

            </div>
            <label class="center"> 
              <ons-input maxlength="20"  style="width: 100%;" placeholder="กรอกจำนวนยอด" name="cost[<?=$key;?>][shop_cost]" 
                         id="shop_cost" value="" onkeyup="calculateShopProduct(this.value, <?=$val->id;?>);">
                <input type="number" class="text-input" maxlength="20"  style=" background-color: #ffa101; 
                       color: #fff !important;border-radius: 10px;    padding-left: 12px;
                       font-family: 'Playfair Display', serif;font-weight: 800;    font-size: 16px;
                       height: 32px;">
                <span class="text-input__label"><?=$s_sub_typelist->topic_th;?></span>
              </ons-input>

              <input type="hidden" value="<?=$s_sub_typelist->topic_th;?>" name="cost[<?=$key;?>][typelist]"/>
              <input type="hidden" value="<?=$s_sub_typelist->id;?>" name="cost[<?=$key;?>][type_id]"/>
              <input type="hidden" value="<?=$val->i_price;?>" id="company_persent_<?=$val->id;?>" name="cost[<?=$key;?>][company][persent]" />
              <input type="hidden" value="<?=$res_taxi_price->i_price;?>" id="taxi_persent_<?=$val->id;?>" name="cost[<?=$key;?>][taxi][persent]" />
            </label>
            <input type="hidden" value="0" id="last_price_taxi_<?=$val->id;?>" class="price-taxi" name="cost[<?=$key;?>][company][price]" />
            <input type="hidden" value="0" id="last_price_company_<?=$val->id;?>"  class="price-company" name="cost[<?=$key;?>][taxi][price]" />
            
            <input type="hidden" value="<?=$res_taxi_price->id;?>" name="cost[<?=$key;?>][taxi][id]" />
            <input type="hidden" value="<?=$val->id;?>" name="cost[<?=$key;?>][company][id]" />
            <input type="hidden" value="<?=$table_to_get_company_sub;?>" name="cost[<?=$key;?>][company][table]" />
            <input type="hidden" value="<?=$table_to_get_taxi;?>" name="cost[<?=$key;?>][taxi][table]" />
<!--            <div class="right" style="width: 30%;">
              <span class="font-14"><span id="txt_price_<?=$val->id;?>" class="txt-price_trans"> 0 </span>&nbsp; บ.</span>
            </div>-->
          </ons-list-item>
        <?php }?>
      </ons-col>
    </ons-row>
  </ons-card>

  <ons-card style="margin-top: 10px; margin-bottom: 10px;">
    <ons-list-header>ข้อมูลการโอน (แท็กซี่)</ons-list-header>
    <ons-list-item class="input-items">
      <div class="left" style="width: 40%;">
        <span class="font-14" >จำนวนที่โอน</span>
      </div>
      <div class="center">
        <span class="font-14"><span id="txt_price_total" > 0 </span>&nbsp; บ.</span>
      </div>
    </ons-list-item>
    <ons-list-header>สลิปโอนเงิน</ons-list-header>
    <div align="center">
      <div>
        <input type="file" id="img_upload" accept="image/*" style="opacity: 0;position: absolute;"onchange="readURLslipShop(this);">
      </div>
      <div class="box-preview-img" id="box_img_profile" style="width: 170px;height: 170px;" onclick="performClick('img_upload');">
        <img src="assets/images/noimage_2.gif" style="max-width: 100%; height: 170px;display: nones;" id="pv_slip"><br>
        <span class="txt-upload-slip" ><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; เลือกรูปภาพ</span>
      </div> 
    </div>
  </ons-card>

  <input type="hidden" name="order_id" id="order_id" value="<?=$data->id;?>" />
  <input type="hidden" name="invoice" id="invoice" value="<?=$data->invoice;?>" />
  <input type="hidden" name="plan_id" id="plan_id" value="<?=$data->plan_id;?>" />
  <input type="hidden" name="driver_id" id="driver_id" value="<?=$data->drivername;?>" />
  <input type="hidden" name="company_cost" value="0" id="company_cost" />
  <input type="hidden" name="taxi_cost" value="0" id="taxi_cost" />
</form>
<div style="margin-bottom: 15px;padding: 10px;">
  <ons-button modifier="large" onclick="confirmTransferMoneyShop();"><span class="font-16">ยืนยันแจ้งโอน</span></ons-button>
</div>