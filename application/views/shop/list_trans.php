<ons-list>
  <?php
  if ($_GET[filter_type] == 1) {
    $trans_money = "and transfer_money = 0";
  }
  else if ($_GET[filter_type] == 2) {
    $trans_money = "and transfer_money = 1";
  }
  $query = $this->db->query("select i_company from web_driver where id = ".$_COOKIE[detect_user]);
  $i_com = $query->row()->i_company;
  $i_com = 1;
  $sql = "select * from order_booking where program = ".$i_com." and check_tran_job = 1"
          ." and check_guest_register = 1 ".$trans_money;
  $query = $this->db->query($sql);
//  echo $sql;
  $befordate = '';
  foreach ($query->result() as $row) {
    $query_dv = $this->db->query("select username,name,nickname,phone from web_driver where id = ".$row->drivername);
    $row_dv = $query_dv->row();
    if($row->transfer_money >0){
      $status_show = '<div class="plate-approve bg-approve" style="width: 80px;">แจ้งโอนแล้ว</div>';
    }else{
      $status_show = '<div class="plate-approve bg-wait" style="width: 80px;">รอแจ้งโอน</div>';
    }
    $date_row = date('Y-m-d',$row->post_date);
    if ($row->s_post_date != "") {
      $save_time = date('H:i:s',$row->post_date)." น.";
    }
    else {
      $save_time = "-";
    }
    if ($befordate != $date_row) {
      $befordate = $date_row;
      ?>
      <ons-list-header style="font-weight: 500;"  class="font-13"><?="วันที่ ".$date_row;?></ons-list-header>
    <?php }?>

    <ons-list-item onclick="openManageShopTrans('<?=$row->id;?>');">
      <div class="left">
        <img style="height: 40px;" class="list-item__thumbnail" src="../data/pic/driver/small/<?=$row_dv->username;?>.jpg?v=<?=time();?>">
      </div>
      <div class="center">
        <span class="list-item__title"><?=$row->invoice;?></span>
        <span class="font-16"><?=$row_dv->name;?></span>
        <span class="list-item__subtitle">เวลา <?=date("H:i",$row->post_date)." น.";?></span>
      </div>
      <div class="right">
        <?=$status_show;?>
      </div>
    </ons-list-item>
  <?php }
  ?>
</ons-list>
