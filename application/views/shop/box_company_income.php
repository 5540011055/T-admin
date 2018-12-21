<?php
//echo $id;
$_where = array();
$_where['i_shop'] = $id;
// $_where['i_shop'] = 1;
$_select = array('*');
$_order = array();
$_order['id'] = 'asc';
$region = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COMPANY,$_where,$_select,$_order);

foreach ($region as $key => $val) {
//  $_where = array();
//  $_where['i_shop_country'] = $val->id;
//  $_select = array('*');
//  $_order = array();
//  $_order['id'] = 'asc';
//  $arr[region] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON_COMPANY,$_where,$_select,$_order);
//
//  if ($val->status == 1) {
//    $btn_color = 'btn-success';
//    $text_status = 'เปิด';
//    # code...
//  }
//  else {
//    $btn_color = 'btn-danger';
//    $text_status = 'ปิด';
//  }
  ?>
  <div class="row" style="display: none;">
    <div class="form-group form-group-md">
      <div class="col-md-1">
        <div class="form-group form-group-md">
          <span class="btn btn-support3 btn-rounded btn-outline btn-equal"><?=$key + 1;?></span>
        </div>
      </div>
      <div class="col-md-11 ">
        <?php
        foreach ($arr[region] as $key => $val2) {
          ?>
          <!-- <div class="form-group form-group-md"> -->
          <div class="col-md-3">
            <?php
            if ($val->id == $val2->i_shop_country) {
              ?>
              <img class="img-region" src="<?=base_url();?>assets/img/flag/icon/<?=$val2->s_country_code;?>.png">
              <span style="font-size: 16px">
                <?=$val2->s_topic_th;?>
              </span>
              <?php
            }
            ?>
          </div>
          <!-- </div> -->
        <?php }?>
      </div>
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
//      echo "<pre>";
//      print_r($data['list_plan']);
//      echo "</pre>";
//      exit();
      foreach ($data['list_plan'] as $key => $val) {
        $_where = array();
        $_where['i_shop_country_com_list'] = $val->id;
        $this->db->select('*');
        $query = $this->db->get_where(TBL_SHOP_COUNTRY_COM_LIST_PRICE_COMPANY,$_where);
        $list_price = $query->result();
        ?>
        <div  class="form-group ">
        </div>
        <div class="col-md-12">
          <?php
          foreach ($list_price as $key => $val2) {
            echo "<pre>";
            echo $val2->i_shop_country_com_list;
            echo "</pre>";
//            continue;
            if ($val2->s_topic_en == 'comision') {
              $curen = '%';
            }
            else {
              $curen = '';
            }
            ?>
            <div  class="col-md-12 " style="margin-right: 5px">
        
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
                      $_where[product] = $id;
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
                  ?>
                </div>
              </div>
            </div>
          <?php }?>
        </div>

      <?php }
      ?>
    </div>
  </div>
  </div>
  <!-- end comision -->
  <!-- <option value="<?=$key;?>" ><?=$val->name_th;?></option> -->
  <?php
}?>