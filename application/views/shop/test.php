<?php 
$order = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_GET[id]),array('*'));
//echo $order->plan_setting;
$where = array();
$where[i_shop_country] = $order->plan_setting;
$this->db->select('*');
$query_od = $this->db->get_where(TBL_SHOP_COUNTRY_ICON_TAXI);
$res_od_ct = $query_od->row();

?>

<div class="col-md-12">
  <!-- <form class="form-horizontal form-banded form-bordered" id="form_region" > -->
  <!-- <div class="col-md-12"> -->
  <div class="row">
    <div class="col-md-12">
        <!-- <select name="select_country" class="form-control" id="select_country" onchange="change_region(this.value)"> -->
      <!-- <option value="">- เลือกสัญชาติ -</option> -->
      <?php
      // print_r(json_encode($region));
      
      foreach ($region as $key => $val) {
//        if()
        $_where = array();
        $_where['i_shop_country'] = $val->id;
        $_select = array('*');
        $_order = array();
        $_order['id'] = 'asc';
//        $arr[region] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON_COMPANY,$_where,$_select,$_order);
        $arr[region] = $this->Main_model->rowdata(TBL_SHOP_COUNTRY_ICON_COMPANY, $_where, $_select);
//        echo $arr[region]->s_country_code." || ".$res_od_ct->s_country_code;
        if($arr[region]->s_country_code != $res_od_ct->s_country_code){
          continue;
        }
        if ($val->status == 1) {
          $btn_color = 'btn-success';
          $text_status = 'เปิด';
          # code...
        }
        else {
          $btn_color = 'btn-danger';
          $text_status = 'ปิด';
        }
        ?>
        <div class="row">
          <div class="form-group form-group-md">
            <div class="col-md-1">
              <div class="form-group form-group-md">
                <span class="btn btn-support3 btn-rounded btn-outline btn-equal"><?=$key + 1;?></span>
              </div>
            </div>
            <div class="col-md-11 ">
              <?php
             
//echo $arr[region][0]->s_topic_th." ++";
//              foreach ($arr[region] as $key => $val2) {
                ?>
                <!-- <div class="form-group form-group-md"> -->
                <div class="col-md-3">
                  <?php
                  if ($val->id == $arr[region]->i_shop_country) {
                    ?>
                    <img class="img-region" src="<?=base_url();?>assets/img/flag/icon/<?=$arr[region]->s_country_code;?>.png">
                    <span style="font-size: 16px">
                      <?=$arr[region]->s_topic_th;?>
                    </span>
                    <?php
                  }
                  ?>
                </div>
                <!-- </div> -->
              <?php // }?>
            </div>
            <!-- <div class="col-md-12">
                    <div class="box_sub_region<?=$val->id;?>">
                    </div>
                </div> -->
          </div>
        </div>
        <!-- start comision -->
        <div class="row">
          <div class="form-group form-group-md">
            <?php
            $_where = array();
            $_where['i_shop_country_icon'] = $val->id;
            $_select = array('*');
            $_order = array();
            $_order['id'] = 'asc';
            $data['list_plan'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_COMPANY,$_where,$_select,$_order);
            foreach ($data['list_plan'] as $key => $val) {
              $_where = array();
              $_where['i_shop_country_com_list'] = $val->id;
              $_select = array('*');
              $_order = array();
              $_order['id'] = 'asc';
              $data['list_price'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE_COMPANY,$_where,$_select,$_order);
              ?>
              <div  class="form-group ">
                  <!-- <span><?=$key + 1;?></span> -->
                <!-- <div class="col-md-1">
                    <span class="pull-right"> * </span> 
                </div> -->
                <div class="col-md-12">
                  <?php
                  foreach ($data['list_price'] as $key => $val2) {
                    if ($val2->s_topic_en == 'comision') {
                      $curen = '%';
                    }
                    else {
                      $curen = '';
                    }
                    ?>
                    <div  class="col-md-12 " style="margin-right: 5px">
                      <div  class="form-group " style="    margin-bottom: 15px;">
                        <div class="input-group"  style="height: 32px;">
                          <span  class="input-group-addon" style="width: 64px"><?=$val2->s_topic_th;?>  </span>
                          <?php
                          if ($val2->i_plan_product_price_name == 6) {
                            ?>
                            <input  type="text" class="form-control" value="<?=$val2->i_price;?> <?=$curen;?>" disabled>
                          <?php }?>
                          <span  class="input-group-addon" style="width: 64px"><?=$val2->s_payment;?>  </span>
                          <!-- <i class="fa fa-chevron-up" aria-hidden="true" onclick="carusepark('<?$row->id;?>')"></i> -->
                          <?php
                          if ($val2->i_plan_product_price_name != 6) {
                            ?>
                            <button type="button" class="btn btn-md btn-default btn-equal pull-right" onclick="carusepark('<?=$val2->id;?>', '<?=$_GET[option];?>')"> 
                              <i class="fa fa-chevron-up btn_use<?=$_GET[option];?>_<?=$val2->id;?>"  ></i>
                            </button>
                          <?php }?>
                        </div>
                      </div>
                      <?php
                      if ($val2->i_plan_product_price_name == 5) {
//                        $TYPE_PAY = $this->Main_model->rowdata(TBL_SHOP_TYPE_PAY,array('id' => $val2->i_type_pay));
                        ?>
                        <div  class="form-group ">
                          <div class="input-group" >
                            <span class=" " style="width: 65px;" >จ่ายเงินตาม</span>:
                            <span class=" " style="width: 65px;" ><?=$TYPE_PAY->s_topic_th;?></span>
                          </div>
                        </div>
                      <?php }?>
                      <div  class="form-group caruse<?=$_GET[option];?>_<?=$val2->id;?>">
                        <div style="margin-left: 15px">
                          <?php
                          if ($val2->i_plan_product_price_name == 7) {
                            
                            ?>
                            <table width="100%">
                              <tr>
                                <td style=" font-weight: bold;">รายการ</td>
                                <td style="font-weight: bold;width: 100px;">ค่าคอม (%)</td>
                              </tr>
                              <?php
                              $_where = array();
                              $_where[product] = $_GET[id];
                              $_where[i_list_price] = $val2->id;
                              $_select = array('*');
                              $_order = array();
                              $_order['id'] = 'asc';
                              $PERCENT_TAXI = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT_COMPANY,$_where,$_select,$_order);
                              foreach ($PERCENT_TAXI as $dataTL) {
                                $s_sub_typelist = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,array('id' => $dataTL->i_main_typelist));
                                ?>
                                <tr>
                                  <td width="150">
                                    <label class="btn checkbox-inline btn-checkbox-success-inverse active "><?=$s_sub_typelist->topic_th;?>
                                    </label>
                                  </td>
                                  <td  class="td_percent"><?=$dataTL->f_percent;?> </td>
                                </tr>
                              <?php }?>
                            </table>
                            <?php
                          }
                          else if ($val2->i_plan_product_price_name == 5) {
                            if ($val2->i_type_pay == 1) {
                              ?>
                              <table width="100%" class="tb_<?=$row->id;?>" >
                                <tr>
                                  <td width="100" style=" font-weight: bold;">รายการ</td>
                                  <td style="font-weight: bold;width: 100px;">ค่าจอด (บ.)</td>
                                </tr>
                                <?php
                                $_where = array();
                                $_where[i_list_price] = $val2->id;
                                $_where[i_status] = 1;
                                $_select = array('*');
                                $_order = array();
                                $_order['id'] = 'asc';
                                $USE_TYPE = $this->Main_model->fetch_data('','',TBL_SHOP_CAR_PRICE_COMPANY,$_where,$_select,$_order);
                                // print_r(json_encode($USE_TYPE));
                                foreach ($USE_TYPE as $row) {
                                  $_where = array();
                                  $_where[id] = $row->i_car_type;
                                  $CAR_USE = $this->Main_model->rowdata(TBL_WEB_CAR_USE_TYPE,$_where);
                                  ?>
                                  <tr>
                                    <td>
                                      <div data-toggle="buttons"  >
                                        <label class="btn checkbox-inline btn-checkbox-success-inverse active"><?=$CAR_USE->name_th;?>
                                          <input type="checkbox"  checked> </label>
                                      </div>
                                    </td>
                                    <td  class="td_percent">
                                      <div class="input-group">
                                        <label class="btn "><?=$row->i_price_park;?>
                                        </label>
                                      </div></td>
                                  </tr>
                                <?php }?>
                              </table>
                              <?php
                            }
                            else {
                              ?>
                              <!-- <div class="col-md-12"> -->
                              <div  class="form-group ">
                                <table>
                                  <tr>
                                    <td style=" font-weight: bold;">รายการ</td>
                                                                                                      <!-- <td style="font-weight: bold;width: 100px;">จำนวนคน</td> -->
                                  </tr>
                                  <?php
                                  $_where = array();
                                  $sub_typelist = $this->Main_model->fetch_data('','',TBL_SHOP_TYPE_PAY_LIST,array('i_status' => 1));
                                  foreach ($sub_typelist as $dataTL) {
                                    $_where = array();
                                    $_where[product] = $_GET[id];
                                    $_where[i_list_price] = $val2->id;
                                    $_where[i_type_pay_list] = $dataTL->id;
                                    $_where[i_type_pay] = $val2->i_type_pay;
                                    $sub_type_list = $this->Main_model->rowdata(TBL_SHOP_TYPE_PAY_LIST_PERCENT_COMPANY,$_where);
                                    // print_r(json_encode($_where));
                                    $chk_box_type = ($sub_type_list->i_status > 0) ? 'checked' : '';
                                    $chk_box_type_active = ($sub_type_list->i_status > 0) ? 'active' : '';
                                    $td_percent = ($sub_type_list->i_status > 0) ? '' : 'none';
                                    ?>
                                    <tr>
                                      <td>
                                        <div data-toggle="buttons" >
                                          <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$chk_box_type_active;?> "><?=$dataTL->topic_th;?>
                                            <input type="checkbox" value="1" id="i_check_type_<?=$val2->id;?>_park" name="i_check_type<?=$val2->id;?>_park" <?=$chk_box_type;?>> </label>
                                        </div>
                                      </td>
                                    </tr>
                                  <?php }?>
                                </table>
                              </div>
                              <!-- </div> -->
                            <?php
                            }
                          }
                          ?>
                        </div>
                      </div>
                    </div>
    <?php }?>
                </div>
              </div>
            <?php }
            ?>
          </div>
        </div>
        <!-- end comision -->
        <!-- <option value="<?=$key;?>" ><?=$val->name_th;?></option> -->
<?php }?>
      <!-- </select> -->
    </div>
  </div>
  <!-- </div> -->
  <!-- </form> -->
</div>
<br/>
<br/>
<br/>
<br/>
<?php
echo "<pre>";
print_r($region);
echo "</pre>";
//echo 88;
?>