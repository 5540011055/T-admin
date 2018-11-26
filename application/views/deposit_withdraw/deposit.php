<style>
  ons-list-header{
    color: #ffa101 !important;
  }
</style>
<?php
$date = $_GET[date];
$date = explode("-",$date);
$year = $date[0];
$month = $date[1];
//echo $year." ".$month;
//exit();
$select = "select * from deposit_history where type = 'ADD' and (MONTH(post_date_f) = '".$month."' and YEAR(post_date_f) = '".$year."')  order by deposit_date desc, id desc  ";

$query = $this->db->query($select);
$befordate = '';
$i = 0;
?>
<ons-list id="body_list_ic_shop" >	 
  <?php
  foreach ($query->result() as $row) {
    $tras_d_time = date_create($row->deposit_date);
    if ($row->type == "ADD") {
      $type_txt = "เติมเงิน (แจ้งโอน)";
//				$icons = "+";
    }
    else if ($row->type == "WITHDRAW") {
      $type_txt = "ถอนเงิน (แจ้งถอน)";
//				$icons = "-";
    }
    if ($row->status == 0) {
      $txt_status = "รอยืนยัน";
      $class_plate = "bg-wait";
    }
    else if ($row->status == 1) {
      $txt_status = "อนุมัติ";
      $class_plate = "bg-approve";
    }
    else {
      $txt_status = "ปฏิเสธ";
      $class_plate = "bg-reject";
    }

    $this->db->select('*');
    $where = array();
    $where[deposit_id] = $data->id; 
    $query = $this->db->get_where(TBL_DEPOSIT_HISTORY_LOG,$where);
    $log = $query->row();

    if ($befordate != $row->deposit_date) {
      $befordate = $row->deposit_date;
      ?>
      <ons-list-header style="font-size: 12px;font-weight: 500;"><?="วันที่ ".date_format($tras_d_time,"Y-m-d");?></ons-list-header>
    <?php }?>
    <div style="border-bottom: 1px solid #ccc; padding: 15px 5px;" onclick="openDetailHisWallet('<?=$row->id;?>');">
      <table width="100%">
        <tr>
            <!--<td width="70"><?=$row->invoice;?></td>-->
          <td width="170">
            <span><?=$type_txt;?></span><br/>
            <span class="font-14"><?=date('Y-m-d h:i',$row->post_date);?></span>
          </td>
          <td>
            <div class="plate-approve <?=$class_plate;?>"><?=$txt_status;?></div>
          </td>
          <td align="right" width="80"><b><?=$icons." ".number_format($row->deposit,2);?></b></td>
        </tr>
      </table>
    </div>

  <?php }
  ?>
</ons-list>
<input type="hidden" id="id_reject_dp" value="" />
<input type="hidden" id="id_approve_dp" value="" />

<template id="confirm_reject_ds.html">
  <ons-alert-dialog id="confirm_reject_ds-dialog" modifier="rowfooter">
    <div class="alert-dialog-title">ปฏิเสธการเติมเงิน</div>
    <div class="alert-dialog-content">
      กรุณากรอกเหตุผล
      <input id="cause_reject_dp" class="text-input text-input--underbar" type="text" placeholder="" value="" style="width: 100%; margin-top: 10px;color: #000;">
    </div>
    <div class="alert-dialog-footer">
      <ons-alert-dialog-button onclick="document.getElementById('confirm_reject_ds-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
      <ons-alert-dialog-button onclick="submitRejectDs();document.getElementById('confirm_reject_ds-dialog').hide();"><b style="color:#FF0000;">ปฏิเสธ</b></ons-alert-dialog-button>
    </div>
  </ons-alert-dialog>
</template>

<template id="confirm_approve_ds.html">
  <ons-alert-dialog id="confirm_approve_ds-dialog" modifier="rowfooter">
    <div class="alert-dialog-title">อนุมัติเติมเงิน</div>
    <div class="alert-dialog-content">
      แน่ใจหรือไม่ว่าต้องการยืนยันการเติมเงินนี้?
    </div>
    <div class="alert-dialog-footer">
      <ons-alert-dialog-button onclick="document.getElementById('confirm_approve_ds-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
      <ons-alert-dialog-button onclick="submitApproveDs();document.getElementById('confirm_approve_ds-dialog').hide();"><b>ยืนยัน</b></ons-alert-dialog-button>
    </div>
  </ons-alert-dialog>
</template>