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