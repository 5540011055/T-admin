function chat_gallery_items(item) {
  console.log(item)
  var imgSrc = item.src,
          highResolutionImage = $(this).data('high-res-img');

//            viewer.show(imgSrc, highResolutionImage);
  ImageViewer().show(imgSrc, highResolutionImage);
}
function logOut() {
  modal.show();
  $('#signout-alert-dialog').hide();

  clearCookieAll();
  deleteTagOs("Test Text");
  deleteTagIOS(class_user, username);

  setTimeout(function () {
    window.location = "../T-share";
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

function sendSocket(id) {
  console.log('Click ' + id);
  //   var message = "";
  var dataorder = {
    order: parseInt(id),
  };
  socket.emit('sendchat', dataorder);
}

function createSignOut() {
  var dialog = document.getElementById('signout-alert-dialog');

  if (dialog) {
    dialog.show();
  } else {
    ons.createElement('signout-dialog.html', {
      append: true
    })
            .then(function (dialog) {
              dialog.show();
            });
  }
}

function sendTagIOS(classname, username) {
  var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
  if (iOS == true) {
    var url_xcode = "send://ios?class=" + classname + "&username=" + username + "&test=0";
    console.log(url_xcode);
    window.location = url_xcode;
  }
}

function deleteTagIOS(classname, username) {
  var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
  if (iOS == true) {
    var url_xcode = "delete://ios?class=" + classname + "&username=" + username + "&test=0";
    console.log(url_xcode);
    window.location = url_xcode;
  }
}

function clearCookieAll() {
  var cookies = $.cookie();
  for (var cookie in cookies) {
    console.log(cookie);
    if (cookie != "app_remember_user" && cookie != "app_remember_pass") {
      $.removeCookie(cookie, {
        path: '/'
      });
    }
    //	   $.removeCookie(cookie);

  }
}

function sendTagOs(txt, username) {
  if (typeof Android !== 'undefined') {
    Android.sendTag(txt, username);
  }
}

function deleteTagOs(txt) {
  if (typeof Android !== 'undefined') {
    Android.deleteTag(txt);
  }
}

function CurrencyFormatted(amount) {
  var i = parseFloat(amount);
  if (isNaN(i)) {
    i = 0.00;
  }
  var minus = '';
  if (i < 0) {
    minus = '-';
  }
  i = Math.abs(i);
  i = parseInt((i + .005) * 100);
  i = i / 100;
  s = new String(i);
  if (s.indexOf('.') < 0) {
    s += '.00';
  }
  if (s.indexOf('.') == (s.length - 2)) {
    s += '0';
  }
  s = minus + s;
  return s;
}

function apiRecordActivityAndNotification(param_aan, param_aan2) {

  var param_all = {
    activity: param_aan,
    notification: param_aan2
  };
  console.log(param_all);
  $.ajax({
    url: "main/recordActivityAndNoti", // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    data: param_all,
    success: function (res) {
      console.log(res);
      //							return res;
    }
  });

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