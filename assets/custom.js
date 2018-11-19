function logOut() {
  modal.show();
  $('#signout-alert-dialog').hide();
  /*$.removeCookie('detect_user', {
   path: '/'
   });
   $.removeCookie('detect_userclass', {
   path: '/'
   });
   $.removeCookie('detect_username', {
   path: '/'
   });*/
  //                    clearCookieAll();
  /*ons.notification.alert({
   message: 'ออกจากระบบสำเร็จ',
   title: "สำเร็จ",
   buttonLabel: "ปิด"
   })
   .then(function() {
   
   
   });*/
  clearCookieAll();
  deleteTagOs("Test Text");
  deleteTagIOS(class_user, username);

  setTimeout(function () {
    window.location = "../TShare_new/material/login/index.php";
  }, 2000);
}

function callpop() {
  console.log(appNavigator)
  appNavigator.popPage()
}

function filterShopTrans(id) {
  $('.ex').removeClass('active-btn_shoptype');
  $('#' + id).addClass('active-btn_shoptype');
  load_list_trans_shop();
}

function shopJob() {
  fn.pushPage({
    'id': 'shop.html',
    'title': 'งานส่งแขก'
  }, 'slide-ios');
  load_list_trans_shop();
}

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
//
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

function readURLslip(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#pv_slip').attr('src', e.target.result);
      $('#pv_slip').fadeIn(500);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function performClick(elemId) {
  console.log(elemId);
  var elem = document.getElementById(elemId);
  if (elem && document.createEvent) {
    var evt = document.createEvent("MouseEvents");
    evt.initEvent("click", true, false);
    elem.dispatchEvent(evt);
  }
}

function hideAlertDialog(id) {
  document
          .getElementById(id)
          .hide();
}