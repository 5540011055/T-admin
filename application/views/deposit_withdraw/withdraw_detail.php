<?php
$rand = time().generateRandomString();

function generateRandomString($length = 10) {
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0,$charactersLength - 1)];
  }
  return $randomString;
}

$data = $this->Main_model->rowdata('deposit_history',array('id' => $_GET[deposit_id]),'');
if ($data->type == "ADD") {
  $text_type = "เติมเงิน (แจ้งโอน)";
  $img = "../data/fileupload/pay/slip_trans_".$_GET[deposit_id].".jpg";
}
else if ($data->type == "WITHDRAW") {
  $text_type = "ถอนเงิน (แจ้งถอน)";
  $img = "../data/fileupload/doc_pay_driver/transfer/slip_withdraw/".$_GET[deposit_id].".jpg";
}

$txt_bank = $data->bank_number;
if ($data->status == 0) {
  $txt_status = "รอยืนยัน";
  $class_plate = "bg-wait";
}
else if ($data->status == 1) {
  $txt_status = "อนุมัติ";
  $class_plate = "bg-approve";
}
else {
  $txt_status = "ถูกปฏิเสธ";
  $class_plate = "bg-reject";
}

$where = array();
$this->db->select('id, name, username, phone');
$where[id] = $data->driver;
$query = $this->db->get_where(TBL_WEB_DRIVER,$where);
$dv = $query->row();

$where = array();
$this->db->select('approved, cause, post_date');
$where[deposit_id] = $data->id;
$query_log = $this->db->get_where(TBL_DEPOSIT_HISTORY_LOG,$where);
$logs = $query_log->row();
?>

<div style="padding: 0px 10px; ">
  <ons-list-item>
    <table width="100%">
      <tr>
        <td><span class="font-14" style="color: #908e8e;">ชื่อผู้ใช้</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=$dv->username;?></span>
          <input type="hidden" value="<?=$dv->id;?>" id="driver" />
        </td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td><span class="font-14" style="color: #908e8e;">ชื่อ - นามสกุล</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=$dv->name;?></span></td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td><span class="font-14" style="color: #908e8e;">โทร.</span></td>
      </tr>
      <tr>
        <td><a href="tel:<?=$dv->phone;?>" style="color: #da8a03; text-decoration: underline;" class="font-18"><?=$dv->phone;?></a></td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td><span class="font-14" style="color: #908e8e;">สถานะ</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=$txt_status;?></span></td>
      </tr>
    </table>
  </ons-list-item>
  <?php
  if ($data->status > 1) {
    ?>
    <ons-list-item>
      <table width="100%">
        <tr>
          <td><span class="font-14" style="color: #908e8e;">สาเหตุ</span></td>
        </tr>
        <tr>
          <td><span class="font-18"><?=$logs->cause;?></span>&nbsp;&nbsp;<span class="font-14"><?=date('Y-m-d : H:i:s',$logs->post_date);?></span></td>
        </tr>
      </table>
    </ons-list-item>
<?php }?>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td><span class="font-14" style="color: #908e8e;">ประเภท</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=$text_type;?></span></td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td colspan="2"><span class="font-14" style="color: #908e8e;">ธนาคาร</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=$data->deposit_bank;?></span></td>
        <td><span class="font-18"><?=$txt_bank;?></span></td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td colspan="2"><span class="font-14" style="color: #908e8e;">เวลาแจ้งถอน</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=$data->deposit_date." ".$data->deposit_time;?></span></td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td colspan="2"><span class="font-14" style="color: #908e8e;">จำนวนเงิน</span></td>
      </tr>
      <tr>
        <td><span class="font-18" ><span ><?=number_format($data->deposit,2);?></span> บาท</span>
          
        </td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td colspan="2"><span class="font-14" style="color: #908e8e;">อัพโหลดสลิป</span></td>
      </tr>
      <tr>
        <td align="center">
      <ons-card class="card">
        <ons-list-header class="list-header"><b>เอกสารการโอน</b></ons-list-header>
        <div align="center" style="margin-top: 10px;">
          <span id="txt-img-has-img_slip" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
          <span id="txt-img-nohas-img_slip" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
          <div class="box-preview-img" id="box_img_car_2" onclick="performClick('img_slip');" style="    height: 190px;">
            <img src="" class="img-preview-show" id="pv_img_slip" style="    max-height: 190px;"> 
          </div> 
          <span style="background-color: #f4f4f4;
                padding: 0px 10px;
                position: absolute;
                margin-left: -28px;
                margin-top: -25px;
                border-top-left-radius: 5px; pointer-events: none;color: #000;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
        </div>
      </ons-card>
      </td>
      </tr>
    </table>
  </ons-list-item>
  <?php
  if ($data->status == 0) {
    ?>
    <ons-row style="margin-bottom: 20px;">
      <ons-col style="margin: 10px;">
        <ons-button style="background-color: #f00;"  class="button-margin button button--large" 
                    onclick="rejectWithdraw(<?=$data->id;?>);">ปฏิเสธ</ons-button>
      </ons-col>
      <ons-col style="margin: 10px;">
        <ons-button style=" background-color: #0cab17;" class="button-margin button button--large" 
                    onclick="approvedWithdraw(<?=$data->id;?>);">ยืนยันโอนเงิน</ons-button>
      </ons-col>
    </ons-row>
<?php }?>
</div>

<script>
  checkPicWallet('<?=$img;?>', 'img_slip_preview');
</script>
<form id="form_withdraw" enctype="multipart/form-data">
  <input type="hidden" value="<?=$rand;?>" id="rand_withdraw" name="rand_withdraw" />
  <input type="hidden" value="<?=$_GET[deposit_id];?>" id="deposit_id" name="deposit_id" />
  <input type="hidden" value="<?=$data->deposit;?>" id="deposit_wd" name="deposit_wd" />
  <input type="file" class="cropit-image-input" accept="image/*" id="img_slip" style="opacity: 0;position: absolute;" onchange="readURLslip(this, 'img_slip');">
</form>