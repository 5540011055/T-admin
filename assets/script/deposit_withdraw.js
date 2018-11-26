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
  $.post("deposit_withdraw/withdraw", function (ele) {
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

function rejectDeposit(id) {
  var dialog = document.getElementById('confirm_reject_ds-dialog');
  $('#id_reject_dp').val(id);
  if (dialog) {
    dialog.show();
  } else {
    ons.createElement('confirm_reject_ds.html', {append: true})
            .then(function (dialog) {
              dialog.show();
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
      modal.hide();
      deposit_list();
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

    },
    error: function (err) {
      console.log(err);
      modal.hide();
      //your code here
    }
  });
}