function load_list_trans_shop() {
  $('#body_shop').html(progress_circle);
  var filter_type = $('#filter_type_trans_shop').val();
  var url = "shop/list_trans?filter_type=" + filter_type;
  console.log(url);
  $.post(url, function (ele) {
//        console.log(ele);
    $('#body_shop').html(ele);
  });
}

function openManageShopTrans(id) {
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'งานส่งแขก'
  }, 'lift-ios');
//      $('#body_popup1').html(progress_circle);
  $.post("shop/detail_trans?order_id=" + id, function (ele) {
    $('#body_popup1').html(ele);
  });

}

function openHistoryShopTrans(id) {
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'งานส่งแขก'
  }, 'lift-ios');
//      $('#body_popup1').html(progress_circle);
  $.post("shop/detail_trans_his?order_id=" + id, function (ele) {
    $('#body_popup1').html(ele);

  });

}

function calcost(cost) {
  if (cost == "") {
    cost = 0;
  }
  $('#price').text(cost);
  var persen_com = parseInt($('#persen_com').text());
  var persen_taxi = parseInt($('#persen_taxi').text());
//  console.log(persen_com);
  var total_price_com = (parseInt(cost) * persen_com) / 100;
  var total_price_taxi = (parseInt(cost) * persen_taxi) / 100;
  console.log(total_price_com);
  $('#price_company').text(total_price_com);
  $('#price_taxi').text(total_price_taxi);

  $('#company_cost').val(total_price_com);
  $('#taxi_cost').val(total_price_taxi);
}

function confirmTransferMoneyShop() {
  var dialog = document.getElementById('confirm-trans_shop-dialog');
  if ($('#name-input').val() == "") {
    ons.notification.alert({
      message: "กรุณากรอกจำนวนยอดซื้อ",
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ปิด"
    }).then(function () {

    });
    return;
  }
  if (dialog) {
    dialog.show();
  } else {
    ons.createElement('confirm-trans_shop.html', {append: true})
            .then(function (dialog) {
              dialog.show();
            });
  }
}

function submitTransShop() {
  modal.show();
  var data = new FormData($('#form_acc_trans_shop')[0]);
  data.append('slip_trans', $('#img_upload')[0].files[0]);
//  var data = $("#form_acc_trans_shop").serialize();
  var url = base_url + "shop/complete_trans_shop";

  $.ajax({
    url: url, // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function (res) {
      console.log(res);
      modal.hide();
//      return false;
      var res = res.res;
      if (res.data.result == true) {
//       
//        filterShopList();
//        sendSocket(res.update.order_id);
//        modal.hide();
        sendSocket(res.update.order_id);
        callpop();
        load_list_trans_shop();
        $.ajax({
          url: base_url + "send_onesignal/transfer_shop_completed?id=" + res.update.order_id, // point to server-side PHP script 
          dataType: 'json', // what to expect back from the PHP script, if anything
          type: 'post',
          success: function (res) {
            console.log(res);
          }
        });
        var ac = {};
        var txt_long_nc = $('#invoice').val() + " : แจ้งโอนเงินค่าคอมมิชชั่น กรุณาตรวจสอบ";
        var nc = {
          i_type: 1,
          i_event: $('#order_id').val(),
          i_user: $('#driver_id').val(),
          s_class_user: "taxi",
          s_topic: "ส่งแขก",
          s_sub_topic: "แจ้งค่าคอมมิชชั่น",
          s_message: txt_long_nc,
          s_posted: username
        };
        
        apiRecordActivityAndNotification(ac, nc);
        
      } else {
//        
      }
    },
    error: function (err) {
      console.log(err);
      modal.hide();
      //your code here
    }
  });
}

function readURLslipShop(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#pv_slip').attr('src', e.target.result);
      $('#pv_slip').fadeIn(500);
    }

    reader.readAsDataURL(input.files[0]);
  }
}


function checkPicShop(path, id) {
  console.log(path);
  $.ajax({
    url: path,
    type: 'HEAD',
    error: function () {
      console.log('Error file');
//            $('#'+id).attr('src', path);
    },
    success: function () {
      $('#' + id).attr('src', path + "?v=" + $.now());
    }
  });
}

var timer1;
function calculateShopProduct(val, id) {
  clearTimeout(timer1);
  console.log(id);
  timer1 = setTimeout(function validate() {
    var taxi_persent = 0, com_persent = 0;
    taxi_persent = $('#taxi_persent_' + id).val();
    com_persent = $('#company_persent_' + id).val();
    console.log(val + " | " + taxi_persent + " | " + com_persent);

    var total_taxi = 0, total_company = 0;
    if (taxi_persent > 0 || taxi_persent != '') {
      total_taxi = (val * parseFloat(taxi_persent)) / 100;
    }
    if(com_persent > 0 || com_persent != ''){
      total_company = (val * parseFloat(com_persent)) / 100;
    }
    console.log("Company : " + total_company+" ||"+com_persent);
    console.log("Taxi : " + total_taxi+" ||"+taxi_persent);
//    var total = 0;
//    total = (val * parseFloat(present)) / 100;
    console.log(total_taxi+" ** "+total_company);
    $('#last_price_taxi_' + id).val(total_taxi);
    $('#last_price_company_' + id).val(total_company);
    calculateShopAllProduct();
  }, 500);
}

function calculateShopAllProduct() {
  var total_taxi = 0,
      total_company = 0;
  $('.price-taxi').each(function () {
    var val = $(this).val();
//      console.log(val+" "+ this.id);
    total_taxi = total_taxi + parseFloat(val);
  });
  
  $('.price-company').each(function () {
    var val = $(this).val();
//      console.log(val+" "+ this.id);
    total_company = total_company + parseFloat(val);
  });
  console.log(total_taxi+" "+total_company);
  $('#txt_price_total').text(total_taxi);
  $('#taxi_cost').val(total_taxi);
  $('#company_cost').val(total_company);
}