var type_status;
function shopJobmonitor() {

      fn.pushPage({
        'id': 'shop_monitor.html',
        'title': 'งานส่งแขก'
      }, 'slide-ios');
      setTimeout(function () {
      shopManage()
    },2000);
      // var url = "shop/list_trans?filter_type=" + filter_type;
      // console.log(url);
      // $.post(url, function (ele) {
      //   $('#body_shop').html(ele);
      // });
     
    }
function shopManage() {
//    $('#shop_manage').html(progress_circle);
  console.log("Load Shop Manage page");
  all_data

  var url = "shop/shop_manage_mo";
  
//console.log(array_ma);
  var pass = {
    data: all_data
  };
  console.log(pass);
  $.ajax({
    url: url,
    data: pass,
    type: 'post',
    success: function (ele) {
//          console.log(ele);
      $('#body_shop_monitor').html(ele);
    }
  });
}

function historyShop() {
  modal.show();
   countHistoryTypeAll();
  if ($('#cehck_filter_date').val() == 1) {
    var date = $('#date_shop_his').val();
    var date_rp = date.replace("-", "/");
    date_rp = date_rp.replace("-", "/");
  } else {
    var date_rp = "";
  }
  

  // var url_his = "api/shop_history_fix";
  var pass = {
    'date': date_rp,
    'status': type_status,
  };
  console.log(pass)

    var url = "shop/shop_manage_his";

  // console.log(pass);
  $.ajax({
    url: url,
    data: pass,
    type: 'post',
    success: function (ele) {
         // console.log(ele);
         modal.hide();
      $('#body_shop_monitor_his').html(ele);
    }
  });
    // $.post(url,pass, function (html) {
    //   console.log(html)
    //   $('#body_shop_monitor_his').html(html);
    // });

}
function countHistoryTypeAll() {
  var date_rp = "";
  if ($('#cehck_filter_date').val() == 1) {
    var date = $('#date_shop_his').val();
    var date_rp = date.replace("-", "/");
    date_rp = date_rp.replace("-", "/");
  }
  var param = {
    class_name: class_user,
    driver: detect_user,
    date: date_rp
  };
  // $.ajax({
  //   url: "shop/count_his_all_status",
  //   data: param,
  //   dataType: 'json',
  //   type: 'post',
  //   success: function (value) {
  //     console.log(value);
  //     $('#num_his_com').text("(" + value.success + ")");
  //     $('#num_his_cancel').text("(" + value.fail + ")");
  //     $('#num_his_all').text("(" + value.all + ")");
  //   }
  // });
}

function showFilterdate() {
  $('#btn_toshow_date').hide();
  $('#box-shop_date').fadeIn(500);
  $('#cehck_filter_date').val(1);
  historyShop();
}

function hideFilterdate() {
  $('#box-shop_date').hide();
  $('#btn_toshow_date').show();
  $('#cehck_filter_date').val(0);
  historyShop();
}
function filterHistoryStatus(type, id) {
  console.log(type);
  type_status = type;
  $('#check_filter_his').val(type);
  $('.shop-his-btn').removeClass('his-shop-active');
  $('#' + id).addClass('his-shop-active');
  historyShop($('#date_shop_his').val());
}
function js_yyyy_mm_dd_hh_mm_ss() {
  now = new Date();
  year = "" + now.getFullYear();
  month = "" + (now.getMonth() + 1);
  if (month.length == 1) {
    month = "0" + month;
  }
  day = "" + now.getDate();
  if (day.length == 1) {
    day = "0" + day;
  }
  hour = "" + now.getHours();
  if (hour.length == 1) {
    hour = "0" + hour;
  }
  minute = "" + now.getMinutes();
  if (minute.length == 1) {
    minute = "0" + minute;
  }
  second = "" + now.getSeconds();
  if (second.length == 1) {
    second = "0" + second;
  }
  return year + "/" + month + "/" + day + " " + hour + ":" + minute + ":" + second;
}
function CheckTimeV2(d1, d2) {
  //      console.log(d1+" = "+d2);
  datetime1 = d1;
  datetime2 = d2;
  //Set date time format
  var startDate = new Date(datetime1);
  var endDate = new Date(datetime2);
  var seconds = (endDate.getTime() - startDate.getTime()) / 1000;
  //Calculate time
  var days = Math.floor(seconds / (3600 * 24));
  var hrs_d = Math.floor((seconds - (days * (3600 * 24))) / 3600);
  var hrs = Math.floor(seconds / 3600);
  var mnts = Math.floor((seconds - (hrs * 3600)) / 60);
  var secs = seconds - (hrs * 3600) - (mnts * 60);
  //old
  var hrs_d_bc = hrs_d;
  var mnts_bc = mnts;
  var secs_bc = secs;
  //Add 0 if one digit
  if (hrs_d < 10)
    hrs_d = "0" + hrs_d;
  if (mnts < 10)
    mnts = "0" + mnts;
  if (secs < 10)
    secs = "0" + secs;
  var final_txt, day_txt, h_txy, m_txt, old_txt;
  if (days == 0) {
    day_txt = '';
  } else {
    day_txt = days + ' วัน';
  }
  if (hrs_d_bc == 0) {
    h_txy = '';
  } else {
    h_txy = ' ' + hrs_d_bc + ' ชั่วโมง.';
  }
  if (mnts_bc == 0) {
    m_txt = '';
  } else {
    m_txt = ' ' + mnts_bc + ' นาที';
  }

  final_txt = day_txt + h_txy + m_txt
  old_txt = days + ' ' + hrs_d + ':' + mnts + ':' + secs;

  if (days <= 0 && hrs_d_bc <= 0 && mnts_bc <= 0) {
    return "ไม่กี่วินาทีที่ผ่านมา";
  }
  if (hrs_d_bc < 1) {
    return final_txt + "ที่ผ่านมา";
  } else {
    var str = timestampToDate(startDate.getTime(), "time");
    var res = d1.split(" ");
    var res = res[1].split(":");
    return "ทำรายการเมื่อ " + res[0] + ":" + res[1] + " น.";
    //    return  d1;
  }


}
function timestampToDate(unix_timestamp, type) {
  var date = new Date(unix_timestamp * 1000);
  var day = date.getDate();
  var month = date.getMonth() + 1;
  if (month <= 10) {
    month = "0" + month;
  }
  if (day <= 10) {
    day = "0" + day
  }
  var year = date.getFullYear();
  var txt_date = year + "-" + month + "-" + day;

  var hours = date.getHours();
  var minutes = "0" + date.getMinutes();
  var seconds = "0" + date.getSeconds();
  var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
  //return formattedTime;
  if (type == "date") {
    return txt_date;
  } else if (type == "time") {
    return hours + ':' + minutes.substr(-2) + ' น.';
  } else {
    return txt_date + " " + formattedTime;
  }

}
function formatDate(date) {
  var d = new Date(date),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();
  if (month.length < 2)
    month = '0' + month;
  if (day.length < 2)
    day = '0' + day;
  return [year, month, day].join('-');
}

function formatTime(date) {
  var d = new Date(date),
          hour = '' + d.getHours(),
          minutes = d.getMinutes();
  if (hour < 10) {
    hour = "0" + hour;
  }
  if (minutes < 10) {
    minutes = "0" + minutes;
  }
  return [hour, minutes].join(':');
}
function modalShowImg(i) {

  var imgSrc = i.src,

  highResolutionImage = $(this).data('high-res-img');
   console.log(imgSrc)
    ImageViewer().show(imgSrc, highResolutionImage);
     // viewer.show(img, highResolutionImage);
}

     
    $('.chat_gallery_items').click(function () {
        console.log('aaaaa')
        var imgSrc = this.src,
        highResolutionImage = $(this).data('high-res-img');

        ImageViewer().show(imgSrc, highResolutionImage);
    });
    // function load_list_trans_shop() {
    //   $('#body_shop').html(progress_circle);
    //   var filter_type = $('#filter_type_trans_shop').val();
    //   var url = "shop/list_trans?filter_type=" + filter_type;
    //   console.log(url);
    //   $.post(url, function (ele) {
    //     $('#body_shop').html(ele);
    //   });
    // }