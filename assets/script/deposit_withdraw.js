function depositWithdraw() {
  fn.pushPage({
    'id': 'deposit_withdraw.html',
    'title': 'เติม - ถอน'
  }, 'slide-ios');
  setTimeout(function () {
    deposit_list();
  }, 300);
}

function deposit_list() {
  $('#deposit').html(progress_circle);
  var date = $('#date_his_deposit').val();
  $.post("deposit_withdraw/deposit?date=" + date, function (ele) {
    $('#deposit').html(ele);
  });
}

function withdraw_list() {
  $('#withdraw').html(progress_circle);
  var date = $('#date_his_withdraw').val();
  var url = "deposit_withdraw/withdraw?date=" + date;
  console.log(url);
  $.post(url, function (ele) {
    $('#withdraw').html(ele);
  });
}

function openDetailHisWallet(id) {

  fn.pushPage({
    'id': 'popup1.html',
    'title': 'รายละเอียด'
  }, 'lift-ios');
  var url = "deposit_withdraw/deposit_detail?deposit_id=" + id;
  setTimeout(function () {
    $('#body_popup1').html(progress_circle);
    $.post(url, function (ele) {
      $('#body_popup1').html(ele);
    });
  }, 200);
}

function openDetailHisWithdraw(id) {

  fn.pushPage({
    'id': 'popup1.html',
    'title': 'รายละเอียด'
  }, 'lift-ios');
  var url = "deposit_withdraw/withdraw_detail?deposit_id=" + id;
  console.log(url);
  setTimeout(function () {
    $('#body_popup1').html(progress_circle);
    $.post(url, function (ele) {
      $('#body_popup1').html(ele);
    });
  }, 200);
}

function checkPicWallet(path, id) {
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

function checkPicWithdraw(path, id) {
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

function readURLslip(input, id_ele) {


  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {

      $('#pv_' + id_ele).attr('src', e.target.result);

      var data = new FormData($('#form_withdraw')[0]);
      data.append('fileUpload', $('#' + id_ele)[0].files[0]);

      var param_id = $('#rand_withdraw').val();

//            var url_upload = "application/views/upload_img/upload.php?id=" + param_id + "&type=slipt_inform";
      var url_upload = "upload/index?id=" + param_id + "&type=slipt_withdraw";
      console.log(url_upload);
      $.ajax({
        url: url_upload, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function (php_script_response) {
          console.log(php_script_response);
          $('#box_img_' + id_ele).fadeIn(200);
          $('#txt-img-has-' + id_ele).show();
          $('#txt-img-nohas-' + id_ele).hide();
//                    $('.'+param_id+'_pic_car_'+num).attr('src', "../data/pic/car/"+param_id+"_"+num+".jpg?v="+$.now());

        },
        error: function (e) {
          console.log(e)
        }
      });
    }
    reader.readAsDataURL(input.files[0]);

  }

}

function rejectDeposit(id) {
  var dialog = document.getElementById('confirm_reject_ds-dialog');
  $('#id_reject_dp').val(id);
  if (dialog) {
    dialog.show();
    $('#cause_reject_dp').val('');
  } else {
    ons.createElement('confirm_reject_ds.html', {append: true})
            .then(function (dialog) {
              dialog.show();
              $('#cause_reject_dp').val('');
            });
  }
}

function submitRejectDs() {

  modal.show();
  var ps = {
    id: $('#id_reject_dp').val(),
    cause: $('#cause_reject_dp').val(),
    deposit: $('#deposit_dp').val(),
    type: "Add"
  };
  var url = "deposit_withdraw/reject_deposit";
  $.ajax({
    url: url, // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    data: ps,
    type: 'post',
    success: function (res) {
      console.log(res);
      modal.hide();
      deposit_list();
      var url = "deposit_withdraw/find_deposit_id?driver=" + $('#driver').val();
      $.post(url, function (res) {
        console.log(res);
        activeSocketDepositWithdraw(res);
      });
      var data = {
        content: "รายการแจ้งโอนของท่านถูกปฏเสธ",
        header: "ปฏิเสธการแจ้งโอน",
        driver: $('#driver').val()
      };
      onesignalDepositWithdraw(data);
      var ac = {};
      var txt_long_nc = "รายการแจ้งโอนของท่านถูกปฏเสธ";
      var nc = {
        i_type: 5,
        i_event: $('#id_reject_dp').val(),
        i_user: $('#driver').val(),
        s_class_user: "taxi",
        s_topic: "กระเป๋าเงิน",
        s_sub_topic: "ปฏิเสธการแจ้งโอน",
        s_message: txt_long_nc,
        s_posted: detect_usernamename
      };

      apiRecordActivityAndNotification(ac, nc);

      if (res.dp.result == true) {
        ons.notification.alert({
          message: 'ปฏิเสธสำเร็จ',
          title: "สำเร็จ",
          buttonLabel: "ปิด"
        })
                .then(function () {
                  callpop();
                });
      }

    },
    error: function (err) {
      console.log(err);
      modal.hide();
      ons.notification.alert({
        message: 'กรุณาลองใหม่อีกครั้ง',
        title: "ล้มเหลว",
        buttonLabel: "ปิด"
      })
              .then(function () {
//                callpop();
              });
      //your code here
    }
  });
}

function approvedDeposit(id) {
  var dialog = document.getElementById('confirm_approve_ds-dialog');
  $('#id_approve_dp').val(id);
  if (dialog) {
    dialog.show();
  } else {
    ons.createElement('confirm_approve_ds.html', {append: true})
            .then(function (dialog) {
              dialog.show();
            });
  }
}

function submitApproveDs() {
  modal.show();
  var ps = {
    id: $('#id_approve_dp').val(),
    deposit: $('#deposit_dp').val(),
    driver: $('#driver').val(),
    type: "Add"
  };
  var url = "deposit_withdraw/approve_deposit";
  $.ajax({
    url: url, // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    data: ps,
    type: 'post',
    success: function (res) {
      console.log(res);
//      return;
      modal.hide();
      deposit_list();
      var url = "deposit_withdraw/find_deposit_id?driver=" + $('#driver').val();
      $.post(url, function (res) {
        console.log(res);
        activeSocketDepositWithdraw(res);
      });
      var data = {
        content: "รายการแจ้งโอนของท่านได้รับการอนุมัติแล้ว",
        header: "อนุมัตการแจ้งโอน",
        driver: $('#driver').val()
      };
      onesignalDepositWithdraw(data);
      if (res.update.dp.result == true) {
        ons.notification.alert({
          message: 'อนุมัติสำเร็จ',
          title: "สำเร็จ",
          buttonLabel: "ปิด"
        })
                .then(function () {
                  callpop();
                });
      }

      var ac = {};
      var txt_long_nc = "รายการแจ้งโอนของท่านได้รับอนุมัติ";
      var nc = {
        i_type: 5,
        i_event: $('#id_approve_dp').val(),
        i_user: $('#driver').val(),
        s_class_user: "taxi",
        s_topic: "กระเป๋าเงิน",
        s_sub_topic: "อนุมัติการเติมเงิน",
        s_message: txt_long_nc,
        s_posted: detect_username
      };

      apiRecordActivityAndNotification(ac, nc);

    },
    error: function (err) {
      console.log(err);
      modal.hide();
      ons.notification.alert({
        message: 'กรุณาลองใหม่อีกครั้ง',
        title: "ล้มเหลว",
        buttonLabel: "ปิด"
      })
              .then(function () {
//                callpop();
              });
      //your code here
    }
  });
}

function approvedWithdraw() {
  var dialog = document.getElementById('confirm_approve_wd-dialog');
  $('#id_approve_wd').val(id);
  if (dialog) {
    dialog.show();
  } else {
    ons.createElement('confirm_approve_wd.html', {append: true})
            .then(function (dialog) {
              dialog.show();
            });
  }
}

function submitApproveWd() {

  modal.show();

  var url = "deposit_withdraw/approve_withdraw";
  $.ajax({
    url: url, // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    data: $('#form_withdraw').serialize(),
    type: 'post',
    success: function (res) {
      console.log(res);
      modal.hide();
      withdraw_list();
      var url = "deposit_withdraw/find_deposit_id?driver=" + $('#driver').val();
      $.post(url, function (res) {
        console.log(res);
        activeSocketDepositWithdraw(res);
      });
      var data = {
        content: "รายการถอนเงินของท่านได้รับการอนุมัติแล้ว",
        header: "อนุมัตการถอนเงิน",
        driver: $('#driver').val()
      };
      onesignalDepositWithdraw(data);
      if (res.his.result == true) {
        ons.notification.alert({
          message: 'ยืนยันการโอนสำเร็จ',
          title: "สำเร็จ",
          buttonLabel: "ปิด"
        })
                .then(function () {
                  callpop();
                });
      }
      var ac = {};
      var txt_long_nc = "รายการแจ้งถอนของท่านได้รับอนุมัติ";
      var nc = {
        i_type: 5,
        i_event: $('#id_approve_wd').val(),
        i_user: $('#driver').val(),
        s_class_user: "taxi",
        s_topic: "กระเป๋าเงิน",
        s_sub_topic: "อนุมัติการถอนเงิน",
        s_message: txt_long_nc,
        s_posted: detect_username
      };

      apiRecordActivityAndNotification(ac, nc);
    },
    error: function (err) {
      console.log(err);
      modal.hide();
      ons.notification.alert({
        message: 'กรุณาลองใหม่อีกครั้ง',
        title: "ล้มเหลว",
        buttonLabel: "ปิด"
      })
              .then(function () {
//                callpop();
              });
      //your code here
    }
  });
}

function rejectWithdraw(id) {
  var dialog = document.getElementById('confirm_reject_wd-dialog');
  if (dialog) {
    dialog.show();
    $('#cause_reject_wd').val('');
  } else {
    ons.createElement('confirm_reject_wd.html', {append: true})
            .then(function (dialog) {
              dialog.show();
              $('#cause_reject_wd').val('');
            });
  }
}

function submitRejectWd() {
  modal.show();
  var ps = {
    id: $('#deposit_id').val(),
    cause: $('#cause_reject_wd').val(),
    deposit: $('#deposit_wd').val(),
    type: "Withdraw",
    driver: $('#driver').val()
  };
  var url = "deposit_withdraw/reject_withdraw";
  $.ajax({
    url: url, // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    data: ps,
    type: 'post',
    success: function (res) {
      console.log(res);
      modal.hide();
      withdraw_list();
      var url = "deposit_withdraw/find_deposit_id?driver=" + $('#driver').val();
      $.post(url, function (res) {
        console.log(res);
        activeSocketDepositWithdraw(res);
      });
      var data = {
        content: "รายการถอนของท่านถูกปฏเสธ",
        header: "ปฏิเสธการถอนเงิน",
        driver: $('#driver').val()
      };
      onesignalDepositWithdraw(data);
      if (res.main.result == true) {
        ons.notification.alert({
          message: 'ปฏิเสธสำเร็จ',
          title: "สำเร็จ",
          buttonLabel: "ปิด"
        })
                .then(function () {
                  callpop();
                });
      }

      var ac = {};
      var txt_long_nc = "รายการแจ้งถอนของท่านถูกปฏิเสธ";
      var nc = {
        i_type: 5,
        i_event: $('#deposit_id').val(),
        i_user: $('#driver').val(),
        s_class_user: "taxi",
        s_topic: "กระเป๋าเงิน",
        s_sub_topic: "ปฏิเสธการถอนเงิน",
        s_message: txt_long_nc,
        s_posted: detect_username
      };

      apiRecordActivityAndNotification(ac, nc);

    },
    error: function (err) {
      console.log(err);
      modal.hide();
      ons.notification.alert({
        message: 'กรุณาลองใหม่อีกครั้ง',
        title: "ล้มเหลว",
        buttonLabel: "ปิด"
      })
              .then(function () {
//                callpop();
              });
      //your code here
    }
  });
}

function onesignalDepositWithdraw(data) {
  var url = "send_onesignal/deposit_withdraw";
  $.ajax({
    url: url, // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    data: data,
    type: 'post',
    success: function (obj) {
      console.log(obj);
    },
    error: function (err) {
      console.log(err);
    }
  });
}