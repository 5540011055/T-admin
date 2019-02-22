<ons-col>
  <?php
  $_where = array();
  $_where[product] = $id;
//  $_where[i_list_price] = $val->id;
  $_where[i_status] = 1;
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