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
