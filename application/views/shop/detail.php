<?php
$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_GET[order_id]),array('*'));

$query_price = $this->db->query("select * from ".TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI." where i_shop_country_com_list = '".$data->plan_id."' ");
$num = 0;

$sql_ps = "SELECT topic_th,id,province,lat,lng,address FROM shopping_product  WHERE id='".$data->program."' ";
$query_ps = $this->db->query($sql_ps);
$res_ps = $query_ps->row();

$display_person = "display:none";
$display_com = "display:none";
$display_park = "display:none";
$park_total = 0;
$person_total = 0;
$com_total = 0;
foreach ($query_price->result() as $row_price) {
  if ($num >= 1) {
    $push = " + ";
  }
  else {
    $push = "";
  }
  $plan .= $push.$row_price->s_topic_th;
  $num++;

  if ($row_price->s_topic_en == "park") {
    $check_type_park = 1;
    $display_park = "";
    $park_total = $data->price_park_unit;
  }

  if ($row_price->s_topic_en == "person") {
    $check_type_person = 1;
    $display_person = "";
    $person_total = intval($data->price_person_unit) * intval($data->adult);
    $cal_person = $data->price_person_unit."x".$data->adult;
  }

  if ($row_price->s_topic_en == "comision") {
    $check_type_com = 1;
    $display_com = "";
    $com_persent = $data->commission_persent;
    $com_progress = '<span style="padding-left: 0px;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ffa101;"></i>&nbsp;<font color="#ffa101">รอแจ้งโอน</font></span>';
  }
}
$all_total = $park_total + $person_total + $com_total;


$sql_country = "SELECT t2.s_country_code, t2.s_topic_th, t2.i_country, t2.i_shop_country, t2.id FROM ".TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI." as t1 left join ".TBL_SHOP_COUNTRY_ICON_TAXI." as t2 on t1.i_shop_country_icon = t2.id WHERE t1.i_shop_country_com_list='".$data->plan_id."'    ";
$query_country = $this->db->query($sql_country);
$res_country = $query_country->row();

/* $sql_country = "SELECT * from ";
  $query_country = $this->db->query($sql_country);
  $res_country = $query_country->row(); */

$sql = "SELECT t4.s_topic_th, t4.i_price from shop_country_company as t1 left join shop_country_icon_company as t2 on t1.id = i_shop_country "
        ." left join shop_country_com_list_company as t3 on t2.id = t3.i_shop_country_icon"
        ." left join shop_country_com_list_price_company as t4 on t3.id = t4.i_shop_country_com_list"
        ." where t1.i_shop = ".$data->program;
$query = $this->db->query($sql);
$res_com = $query->row();
//$query = $this->db->query("select * from change_plan_logs where order_id = ".$data->id);
//$check_change_plan = $query->num_rows();
//if ($check_change_plan == 0) {
//  $titel = t_work_remuneration;
//  $display_none_change_plan = "display:none;";
//  $color_titel = "";
//}
//else {
//  $titel = "เปลี่ยนแปลง".t_work_remuneration;
//  $display_none_change_plan = "";
//  $color_titel = "color: #f00 !important;";
//}
?>
<style>
  .list-pd-r{
    padding-left: 15px;
  }
  .txt-center{
    color: #afafaf;
  }
</style>
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
        <img src="<?=base_url();?>assets/images/flag/icon/<?=$res_country->s_country_code;?>.png" width="25" height="25" alt="">
        &nbsp;&nbsp;
        <span class="font-16" id="txt_county_pp"><?=$res_country->s_topic_th;?></span>
      </div>
    </ons-list-item>
  </div>

  <div style="margin: 15px 0px;margin-bottom: 30px;">
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">ค่าตอบแทน</span>
      </div>
      <div class="right">
        <span class="font-16"><?=$plan;?></span>
      </div>
    </ons-list-item>
    <ons-list-item style="<?=$display_park;?>">
      <div class="center list-pd-r">
        <span class="font-16 txt-center">ค่าจอด</span>
      </div>
      <div class="right">
        <span class="font-16"><?=number_format($park_total,0);?> บ.</span>
      </div>
    </ons-list-item>
    <ons-list-item style="<?=$display_person;?>">
      <div class="center list-pd-r">
        <span class="font-16 txt-center">ค่าหัว</span>
      </div>
      <div class="right">
        <span class="font-16"><?=$cal_person;?> = <?=number_format($person_total,0);?> บ.</span>
      </div>
    </ons-list-item>
    <?php if ($data->transfer_money == 0) {?>
      <ons-list-item style="<?=$display_com;?>">
        <div class="center list-pd-r">
          <span class="font-16 txt-center">ค่าคอม</span>
        </div>
        <div class="right">
          <b class="font-16"><?=$com_progress;?></b>&nbsp;&nbsp;<span class="font-17" id="txt_com_persent"><?=$com_persent;?> %</span></span>
        </div>
      </ons-list-item>
      <?php
    }
    else {
      $query = $this->db->query('SELECT price_pay_driver_com, price_shopping FROM pay_history_driver_shopping where order_id = '.$data->id);
      $data_trans_pay = $query->row();
    }
    ?>
    <ons-list-item>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">รวม</span>
      </div>
      <div class="right">
        <span class="font-16"><?=number_format($all_total,0);?> บ.</span>
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

  <ons-card style="margin-top: 10px;">
    <ons-list-header>ข้อมูลรายได้</ons-list-header>
    <div style="padding: 10px;">
      <ons-row>
        <!--<ons-col width="30px">1</ons-col>-->
        <ons-col width="150px"><span class="font-16">รายรับ (บริษัท)</span></ons-col>
        <!--<ons-col><span id="persen_com"><?=$res_com->i_price;?></span> %</ons-col>-->
        <ons-col align="right"><span id="price_company">0</span></ons-col>
      </ons-row>
      <ons-row>
        <!--<ons-col width="30px"></ons-col>-->
        <ons-col>
          <?php
          $_where = array();
          $_where['i_shop_country_com_list'] = $data->plan_id;
          $_where['i_plan_product_price_name'] = 7;
//          $_where['i_shop_country_com_list'] = 4;
          $query_lp = $this->db->get_where(TBL_SHOP_COUNTRY_COM_LIST_PRICE_COMPANY,$_where);
          $list_price_company = $query_lp->row();

          $_where = array();
          $_where[product] = $data->program;
          $_where[i_list_price] = 4;
          $_where[i_status] = 1;
          $_select = array('*');
          $_order = array();
          $_order['id'] = 'asc';
          $PERCENT_COMPANY = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT_COMPANY,$_where,$_select,$_order);
          ?>
          <table>
            <?php
            foreach ($PERCENT_COMPANY as $dataTL) {
              $s_sub_typelist = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,array('id' => $dataTL->i_main_typelist));
              ?>
              <tr>

                <td width="150">

                  <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$chk_box_active;?> ">
                    <?=$s_sub_typelist->topic_th;?>
                  </label>

                </td>
                <td  class="td_percent"><?=$dataTL->f_percent;?> %</td>
              </tr>
            <?php }?>
          </table>
        </ons-col>
      </ons-row>
      <ons-row>
        <!--<ons-col width="30px">2</ons-col>-->
        <ons-col width="150px"><span class="font-16">รายรับ (แท็กซี่)</span></ons-col>
        <!--<ons-col><span id="persen_taxi"><?=$data->commission_persent;?></span> %</ons-col>-->
        <ons-col align="right"><span id="price_taxi">0</span></ons-col>
      </ons-row>
      <ons-row>
        <!--<ons-col width="30px"></ons-col>-->
        <ons-col>
          <?php
//          echo $data->plan_id." ".$query_lp->num_rows();
          $_where = array();
          $_where['i_shop_country_com_list'] = $data->plan_id;
          $_where['i_plan_product_price_name'] = 7;
          $query_lp = $this->db->get_where(TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI,$_where);
          $list_price_taxi = $query_lp->row();

          $_where = array();
          $_where[product] = $data->program;
          $_where[i_list_price] = $list_price_taxi->id;
//          $_where[i_status] = 1;
          $_select = array('*');
          $_order = array();
          $_order['id'] = 'asc';
          $PERCENT_TAXI = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT_TAXI,$_where,$_select,$_order);
          ?>
          <table>
            <?php
            foreach ($PERCENT_TAXI as $dataTL) {
              $s_sub_typelist = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,array('id' => $dataTL->i_main_typelist));
              ?>
              <tr>
                <td width="150">
                  <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$chk_box_active;?> ">
                    <?=$s_sub_typelist->topic_th;?>
                  </label>
                </td>
                <td  class="td_percent"><?=$dataTL->f_percent;?> %</td>
              </tr>
            <?php }?>
          </table>
        </ons-col>
      </ons-row>
    </div>
  </ons-card>

  <ons-card style="margin-top: 10px; margin-bottom: 0px;">
    <ons-row>
      <ons-col>
        <ons-list-header>ข้อมูลการซื้อ บริษัท</ons-list-header>
        <?php
        foreach ($PERCENT_COMPANY as $key=>$dataTL) {
          $s_sub_typelist = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,array('id' => $dataTL->i_main_typelist));
          ?>
          <ons-list-item class="input-items">
            <div class="left" style="width: 40%;">
              <span class="font-14"><?=$s_sub_typelist->topic_th;?></span>
            </div>
            <label class="center">
              <ons-input id="" float="" maxlength="20"  style="width: 100%;" placeholder="กรอกจำนวนยอด" name="s_company[<?=$key;?>][shop_cost]" id="shop_cost" value="">
                <input type="number" class="text-input" maxlength="20"  style=" background-color: #ffa101; color: #fff !important;border-radius: 10px;    padding-left: 20px;
                       font-family: 'Playfair Display', serif;font-weight: 800;    font-size: 20px;
                       height: 35px;">
                <span class="text-input__label"><?=$s_sub_typelist->topic_th;?></span>
              </ons-input>

              <input type="hidden" value="<?=$s_sub_typelist->topic_th;?>" name="s_company[<?=$key;?>][typelist]"/>

              <!--        <ons-input id="name-input" float="" maxlength="20"  style="width: 100%;" onkeyup="calcost(this.value);" placeholder="กรอกจำนวนยอด" name="shop_cost" id="shop_cost">
                        <input type="number" class="text-input" maxlength="20"  style=" background-color: #ffa101; color: #fff !important;border-radius: 10px;    padding-left: 20px;
                               font-family: 'Playfair Display', serif;font-weight: 800;    font-size: 20px;
                               height: 35px;">
                        <span class="text-input__label">Name</span>
                      </ons-input>-->
            </label>
          </ons-list-item>
        <?php }?>
      </ons-col>
    </ons-row>

    <ons-row>
      <ons-col>
        <ons-list-header>ข้อมูลการซื้อ แท็กซี่</ons-list-header>
        <?php
        foreach ($PERCENT_TAXI as $key=>$dataTL) {
          $s_sub_typelist = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,array('id' => $dataTL->i_main_typelist));
          ?>
          <ons-list-item class="input-items">
            <div class="left" style="width: 40%;">
              <span class="font-14"><?=$s_sub_typelist->topic_th;?></span>
            </div>
            <label class="center">
              <ons-input id="" float="" maxlength="20"  style="width: 100%;"  placeholder="กรอกจำนวนยอด" name="s_taxi[<?=$key;?>][shop_cost]" id="shop_cost" value="">
                <input type="number" class="text-input" maxlength="20"  style=" background-color: #ffa101; color: #fff !important;border-radius: 10px;    padding-left: 20px;
                       font-family: 'Playfair Display', serif;font-weight: 800;    font-size: 20px;
                       height: 35px;">
                <span class="text-input__label"><?=$s_sub_typelist->topic_th;?></span>
              </ons-input>
              <input type="hidden" value="<?=$s_sub_typelist->topic_th;?>" name="s_taxi[<?=$key;?>][typelist]"/>
              <!--        <ons-input id="name-input" float="" maxlength="20"  style="width: 100%;" onkeyup="calcost(this.value);" placeholder="กรอกจำนวนยอด" name="shop_cost" id="shop_cost">
                        <input type="number" class="text-input" maxlength="20"  style=" background-color: #ffa101; color: #fff !important;border-radius: 10px;    padding-left: 20px;
                               font-family: 'Playfair Display', serif;font-weight: 800;    font-size: 20px;
                               height: 35px;">
                        <span class="text-input__label">Name</span>
                      </ons-input>-->
            </label>
          </ons-list-item>
        <?php }?>
      </ons-col>
    </ons-row>
  </ons-card>

  <ons-card style="margin-top: 10px; margin-bottom: 10px;">
    <ons-list-header>ข้อมูลการโอน</ons-list-header>
    <ons-list-item class="input-items">
      <div class="left" style="width: 40%;">
        <span class="font-16">จำนวนที่โอน</span>
      </div>
      <div class="center">
        <span class="font-16">0.00</span>
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