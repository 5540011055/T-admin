<?php $v = time();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/ultimate/flaticon.css?v=<?=$v;?>" />
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/airport/flaticon.css?v=<?=$v;?>" />
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/payment/css/fontello.css?v=<?=$v;?>" />
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/icomoon/demo-files/demo.css?v=<?=$v;?>" />
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app/css/app-icon.css?v=<?=$v;?>" />
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app-new/css/app-icon.css?v=<?=$v;?>" /> 
  <link rel="stylesheet" href="<?=base_url();?>assets/extra.main.css?v=<?=$v;?>" />
  <link rel="stylesheet" href="<?=base_url();?>assets/custom.css?v=<?=$v;?>" />
  <link rel="stylesheet" href="<?=base_url();?>assets/imageViewer/imageviewer.css?v=<?=$v;?>" />

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsenui.css?v=<?=time()?>">
  <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/dark-onsen-css-components.css?v=<?=time()?>">
  <script src="<?=base_url();?>assets/onsenui/js/onsenui.min.js?v=<?=time()?>"></script>
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="https://www.welovetaxi.com:3443/socket.io/socket.io.js?v=<?=time()?>"></script>
<script type="text/javascript">
  var today = "<?=date('Y-m-d');?>";
    var detect_mb = "<?=$detectname;?>";
    var detect_user = $.cookie("detect_user");
    var class_user = $.cookie("detect_userclass");
    var username = $.cookie("detect_username");
    console.log(detect_mb+" : "+class_user+" : "+username);
     var array_data = [];
     var all_data;
</script>
<script src="<?=base_url();?>assets/custom.js?v=<?=time()?>"></script>
<script src="<?=base_url();?>assets/socket.js?v=<?=time()?>"></script>
<script src="<?=base_url();?>assets/monitor.js?v=<?=time()?>"></script>

  <style>
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: #eacb96 !important;
      font-weight: 400 !important;
      opacity: 1; /* Firefox */
    }

    .active-btn_shoptype{
      background-color: #ffa101 !important;
      color : #fff !important;
    }
    .ex{
          background: #424242;
      padding: 10px;
      color : #ffa101;
    }
    .txt-orange{
      color: #ffa101;
    }

    .box {
      /*width: 300px;*/
      height: 300px;
      /*border-radius: 5px;*/
      box-shadow: 0 2px 30px rgba(black, .2);
      background: lighten(#f0f4c3, 10%);
      position: relative;
      overflow: hidden;
      transform: translate3d(0, 0, 0);
    }

    .wave {
      opacity: .4;
      position: absolute;
      top: 3%;
      left: 50%;
      /*background: #0af;*/
      width: 500px;
      height: 500px;
      margin-left: -250px;
      margin-top: -250px;
      transform-origin: 50% 48%;
      border-radius: 43%;
      animation: drift 3000ms infinite linear;
      background: linear-gradient(270deg, #ffffff, #0af);
      background-size: 400% 400%;

      -webkit-animation: AnimationName 30s ease infinite;
      -moz-animation: AnimationName 30s ease infinite;
      animation: AnimationName 30s ease infinite;

      @-webkit-keyframes AnimationName {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
      }
      @-moz-keyframes AnimationName {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
      }
      @keyframes AnimationName { 
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
      } 
    }

    .wave.-three {
      animation: drift 5000ms infinite linear;
    }

    .wave.-two {
      animation: drift 7000ms infinite linear;
      opacity: .1;
      background: yellow;
    }

    .box:after {
      content: '';
      display: block;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom, rgba(#e8a, 1), rgba(#def, 0) 80%, rgba(white, .5));
      z-index: 11;
      transform: translate3d(0, 0, 0);
    }

    .title {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      z-index: 1;
      /*line-height: 300px;*/
      text-align: center;
      transform: translate3d(0, 0, 0);
      color: white;
      text-transform: uppercase;
      font-family: 'Playfair Display', serif;
      letter-spacing: .4em;
      font-size: 24px;
      text-shadow: 0 1px 0 rgba(black, .1);
      text-indent: .3em;
    }
    @keyframes drift {
      from { transform: rotate(0deg); }
      from { transform: rotate(360deg); }
    }

    .toolbar-color-full{
      background-color: #2783a1 !important;
      background-image: none;
    }
    .txt-upload-slip{
      margin-top: -23px;
      margin-left: -40px;
      color: #ffffff;
      background-color: #ffa101;
      padding: 0px 10px;
      position: absolute;
      border-top-left-radius: 5px;
    }
  </style>
  <ons-modal direction="up" id="modal_load" class="modal-load">
    <div style="text-align: center;">
      <p sty>
      <ons-icon icon="md-spinner" size="25px" spin></ons-icon> <span size="18px">Loading...</span>
      </p>
    </div>
  </ons-modal>
  <script>
    var progress_circle = '<div align="center" style="margin: 20%;"><svg style="height: 72px;width: 72px;" class="progress-circular progress-circular--indeterminate">'
            + '<circle class="progress-circular__background"/>'
            + '<circle class="progress-circular__primary progress-circular--indeterminate__primary"/>'
            + '<circle class="progress-circular__secondary progress-circular--indeterminate__secondary"/>'
            + '</svg></div>';
    var modal = document.querySelector('#modal_load');
    modal.show();
    var base_url = "";
  </script>
  <body>
  <ons-navigator id="appNavigator" swipeable swipe-target-width="80px" page="home.html">
    <ons-page>
      <ons-splitter id="appSplitter">
        <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="left" collapse="" width="260px"></ons-splitter-side>
        <ons-splitter-content page="home.html"></ons-splitter-content>
      </ons-splitter>
    </ons-page>
  </ons-navigator>

<!--  <template id="tabbar.html">
    <ons-page id="tabbar-page">
      <ons-toolbar>
        <div class="center"></div>
        <div class="left">
          <ons-toolbar-button onclick="fn.toggleMenu()">
            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
          </ons-toolbar-button>
        </div>
      </ons-toolbar>
      <ons-tabbar swipeable id="appTabbar" position="auto">
        <ons-tab label="Home" icon="ion-home" page="home.html" active></ons-tab>
        <ons-tab label="Forms" icon="ion-edit" page="forms.html"></ons-tab>
        <ons-tab label="Animations" icon="ion-film-marker" page="animations.html"></ons-tab>
      </ons-tabbar>

      <script>
        ons.getScriptPage().addEventListener('prechange', function (event) {
          if (event.target.matches('#appTabbar')) {
            if( event.tabItem.getAttribute('label')=="Home"){
              var tabTle = "";
            }else{
              var tabTle = event.tabItem.getAttribute('label');
            }
            event.currentTarget.querySelector('ons-toolbar .center').innerHTML = tabTle;
          }
        });
      </script>
    </ons-page>
  </template>-->

  <template id="sidemenu.html">
    <ons-page>
      <div class="profile-pic">
        <img src="https://monaca.io/img/logos/download_image_onsenui_01.png">
      </div>

      <ons-list-title>Access</ons-list-title>
      <ons-list>
        <ons-list-item onclick="fn.loadView(0)">
          <div class="left">
            <ons-icon fixed-width class="list-item__icon" icon="ion-home, material:md-home"></ons-icon>
          </div>
          <div class="center">
            Home
          </div>
          <div class="right">
            <ons-icon icon="fa-link"></ons-icon>
          </div>
        </ons-list-item>
        <ons-list-item onclick="fn.loadView(1)">
          <div class="left">
            <ons-icon fixed-width class="list-item__icon" icon="ion-edit, material:md-edit"></ons-icon>
          </div>
          <div class="center">
            Forms
          </div>
          <div class="right">
            <ons-icon icon="fa-link"></ons-icon>
          </div>
        </ons-list-item>
        <ons-list-item onclick="fn.loadView(2)">
          <div class="left">
            <ons-icon fixed-width class="list-item__icon" icon="ion-film-marker, material: md-movie-alt"></ons-icon>
          </div>
          <div class="center">
            Animations
          </div>
          <div class="right">
            <ons-icon icon="fa-link"></ons-icon>
          </div>
        </ons-list-item>
      </ons-list>

      <ons-list-title style="margin-top: 10px">Links</ons-list-title>
      <ons-list>
        <ons-list-item onclick="fn.loadLink('https://onsen.io/v2/docs/guide/js/')">
          <div class="left">
            <ons-icon fixed-width class="list-item__icon" icon="ion-document-text"></ons-icon>
          </div>
          <div class="center">
            Docs
          </div>
          <div class="right">
            <ons-icon icon="fa-external-link"></ons-icon>
          </div>
        </ons-list-item>
        <ons-list-item onclick="fn.loadLink('https://github.com/OnsenUI/OnsenUI')">
          <div class="left">
            <ons-icon fixed-width class="list-item__icon" icon="ion-social-github"></ons-icon>
          </div>
          <div class="center">
            GitHub
          </div>
          <div class="right">
            <ons-icon icon="fa-external-link"></ons-icon>
          </div>
        </ons-list-item>
        <ons-list-item onclick="fn.loadLink('https://community.onsen.io/')">
          <div class="left">
            <ons-icon fixed-width class="list-item__icon" icon="ion-chatboxes"></ons-icon>
          </div>
          <div class="center">
            Forum
          </div>
          <div class="right">
            <ons-icon icon="fa-external-link"></ons-icon>
          </div>
        </ons-list-item>
        <ons-list-item onclick="fn.loadLink('https://twitter.com/Onsen_UI')">
          <div class="left">
            <ons-icon fixed-width class="list-item__icon" icon="ion-social-twitter"></ons-icon>
          </div>
          <div class="center">
            Twitter
          </div>
          <div class="right">
            <ons-icon icon="fa-external-link"></ons-icon>
          </div>
        </ons-list-item>
      </ons-list>

      <script>
        ons.getScriptPage().onInit = function () {
          // Set ons-splitter-side animation
          this.parentElement.setAttribute('animation', ons.platform.isAndroid() ? 'overlay' : 'reveal');
        };
      </script>

      <style>
        .profile-pic {
          width: 200px;
          background-color: #fff;
          margin: 20px auto 10px;
          border: 1px solid #999;
          border-radius: 4px;
        }

        .profile-pic > img {
          display: block;
          max-width: 100%;
        }

        ons-list-item {
          color: #444;
        }
      </style>
    </ons-page>
  </template>

  <template id="home.html" >
    <ons-page>
      <ons-toolbar class="toolbar-color-full">
        <div class="center"></div>
        <div class="left">
          <ons-toolbar-button onclick="fn.toggleMenu()">
            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
          </ons-toolbar-button>
        </div>
      </ons-toolbar>
      <div class='box'>
        <div class='wave -one'></div>
        <div class='wave -two'></div>
        <div class='wave -three'></div>
        <div class='title'>

        </div>

      </div>
      <div style=" margin-top: -305px; padding: 5px; position: relative;" >
        <ons-row style="margin: 10px 0px;">
          <ons-col style="margin: 10px;">
            
            <?php if ($_COOKIE[detect_userclass] == 'monitor' ) {
              $headder_title = 'monitor';

            }
            else{
              $headder_title = 'Accouting';
            }
          ?>
            <div class='title'><?=$headder_title;?></div>
          </ons-col>
        </ons-row>
        <?php if ($_COOKIE[detect_userclass] == 'monitor' ) {
          ?>

           <ons-row style="margin: 10px 0px;">
          <ons-col style="margin: 10px;">
            <center>
              <div onclick="shopJobmonitor();" class="circle-menu-home" style="background-color: #34A0E7;" >
                <span id="number_shop" class="badge badge-custom font-18 pulse" style="display: none;">0</span>
                <div class="content">
                  <i class="icon-new-uniF14D" style="font-size: 24px;position: relative; top: 7px; left: 2px;"></i>
                </div>
              </div>
              <span class="txt-orange">ส่งแขก</span>
            </center>
          </ons-col>

                    <ons-col style="margin: 10px;">
                      <center>
                        <div onclick="sendTransfermonitor();" class="circle-menu-home" style="    background-color: #F7941D;">
                          <span id="number_tbooking" class="badge badge-custom font-18 pulse" style="display: none;">0</span>
                          <div class="content">
                            <i class="icon-new-uniF10A-9" style="font-size: 28px;position: relative; top: 7px; left: 0px;"></i>
                          </div>
                        </div>
                        <span class="txt-orange">ให้บริการรถ</span>
                      </center>
                    </ons-col>
        </ons-row>
          <?php
          
        }else{
          ?>
        <ons-row style="margin: 10px 0px;">
          <ons-col style="margin: 10px;">
            <center>
              <div onclick="shopJob();" class="circle-menu-home" style="background-color: #34A0E7;" >
                <span id="number_shop" class="badge badge-custom font-18 pulse" style="display: none;">0</span>
                <div class="content">
                  <i class="icon-new-uniF14D" style="font-size: 24px;position: relative; top: 7px; left: 2px;"></i>
                </div>
              </div>
              <span class="txt-orange">ส่งแขก</span>
            </center>
          </ons-col>

          <!--          <ons-col style="margin: 10px;">
                      <center>
                        <div onclick="sendTransfer();" class="circle-menu-home" style="    background-color: #F7941D;">
                          <span id="number_tbooking" class="badge badge-custom font-18 pulse" style="display: none;">0</span>
                          <div class="content">
                            <i class="icon-new-uniF10A-9" style="font-size: 28px;position: relative; top: 7px; left: 0px;"></i>
                          </div>
                        </div>
                        <span class="txt-orange">ให้บริการรถ</span>
                      </center>
                    </ons-col>-->
        </ons-row>
      <?php } ?>
      </div>
    </ons-page>
  </template>

  <template id="shop.html">
    <ons-page>
      <ons-toolbar>
        <div class="left" onclick="">
          <ons-back-button>กลับ</ons-back-button>
        </div>
        <div class="center"></div>
        <div class="right">
          <ons-toolbar-button onclick="reloadApp();">
            <ons-icon icon="ion-home, material:md-home"></ons-icon>
          </ons-toolbar-button>
        </div>
      </ons-toolbar>
      <div style=" padding: 1px; text-align: center; margin: 5px;">
        <span class="font-18">รอแจ้งโอน</span>
      </div>
      <ons-row>
        <ons-col class="active-btn_shoptype ex" id="no-trans" onclick="$('#filter_type_trans_shop').val(1);filterShopTrans('no-trans');">
          <div align="center">ยังไม่แจ้งโอน</div>
        </ons-col>
        <ons-col  class="ex" id="pass-trans" onclick="$('#filter_type_trans_shop').val(2);filterShopTrans('pass-trans');">
          <div align="center">แจ้งโอนแล้ว</div>
        </ons-col>

      </ons-row>
      <div id="body_shop">
      </div>
      <template id="confirm-trans_shop.html">
        <ons-alert-dialog id="confirm-trans_shop-dialog" modifier="rowfooter">
          <div class="alert-dialog-title">ยืนยันแจ้งโอน</div>
          <div class="alert-dialog-content">
            คุณต้องการยืนยันการแจ้งโอนนี้ใช่หรือไม่?
          </div>
          <div class="alert-dialog-footer">
            <ons-alert-dialog-button onclick="hideAlertDialog('confirm-trans_shop-dialog');">ยกเลิก</ons-alert-dialog-button>
            <ons-alert-dialog-button onclick="hideAlertDialog('confirm-trans_shop-dialog');submitTransShop();"><b>ยืนยัน</b></ons-alert-dialog-button>
          </div>
        </ons-alert-dialog>
      </template>
      <script>
        ons.getScriptPage().onInit = function () {
          this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        }
      </script>
    </ons-page>
  </template>
  <template id="shop_monitor.html">
    <ons-page>
      <ons-toolbar>
        <div class="left" onclick="">
          <ons-back-button>กลับ</ons-back-button>
        </div>
        <div class="center"></div>
        <div class="right">
          <ons-toolbar-button onclick="reloadApp();">
            <ons-icon icon="ion-home, material:md-home"></ons-icon>
          </ons-toolbar-button>
        </div>
      </ons-toolbar>
      <ons-tabbar swipeable position="top">
                <ons-tab page="body_shop_monitor.html" label="ดำเนินการ">
                </ons-tab>
               <!--  <ons-tab page="tab2.html" label="จองทัวร์" active>
                </ons-tab> -->
                <ons-tab page="body_shop_monitor_his.html" label="สำเร็จ">
                </ons-tab>
            </ons-tabbar>
            <ons-card id="box-shop_filter" class="card" style="display:none;padding: 0px 8px;position: absolute;width: 100%;z-index: 9;margin-top: 48px;margin-left: 0px;border-radius: 0px;display: none;    padding-left: 0; padding-right: 0px;">
                <ons-row style="width: 100%;/*margin-top: 48px; margin-bottom: 20px;*/">
                    <ons-col>
                        <ons-button class="shop-his-btn font-16 his-shop-active " id="btn_shop_his_com" onclick="filterHistoryStatus('COMPLETED','btn_shop_his_com');" style="border-radius: 0; width: 100%;text-align: center; background-color: #e6e6e6;padding: 2px 10px;color: #000;">สำเร็จ <span id="num_his_com"></span></ons-button>
                    </ons-col>
                    <ons-col>
                        <ons-button class="shop-his-btn font-16" id="btn_shop_his_cancel" onclick="filterHistoryStatus('CANCEL','btn_shop_his_cancel');" style="border-radius: 0; width: 100%;text-align: center; background-color: #e6e6e6;padding: 2px 10px;color:#000;">ยกเลิก <span id="num_his_cancel"></span></ons-button>
                    </ons-col>
                    <ons-col>
                        <ons-button onclick="filterHistoryStatus('','btn_shop_his_all');" id="btn_shop_his_all" style="border-radius: 0; width: 100%;text-align: center; background-color: #e6e6e6;padding: 2px 10px;color:#000;" class="shop-his-btn font-16" >ทั้งหมด <span id="num_his_all"></span>

                        </ons-button>
                    </ons-col>
                </ons-row>     
                <ons-row>
                    <ons-col>
                        <ons-button id="btn_toshow_date" onclick="showFilterdate();" class="button button--outline" style="width:100%;text-align: center;"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> ดูตามวันที่</ons-button>
                    </ons-col>
                </ons-row>
                <ons-list-item class="input-items list-item p-l-0" id="box-shop_date" style="display:none;">
                    <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
                        <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
                    </div>
                    <div class="center list-item__center" style="background-image: none;padding: 0px 6px 0px 0;">
                        <input class="ap-date" type="date" id="date_shop_his" name="date_shop_his" value="<?=date('Y-m-d',time());?>" style="font-size: 17px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;" onchange="historyShop();$('#first_run_his').val(0);" max="<?=date('Y-m-d',time());?>" />

                        <input class="ap-date" type="date" id="date_shop_wait" name="date_shop_his" value="<?=date('Y-m-d',time());?>" style="font-size: 17px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;display: none;" onchange="waitTransShop();" max="<?=date('Y-m-d',time());?>" />
                    </div>
                    <div class="right list-item__right" style="padding: 5px;" >
                      <ons-button onclick="hideFilterdate();" style="padding: 0px 5px;">ทั้งหมด</ons-button>
                  </div>
              </ons-list-item>
              <input type="hidden" value="0" id="cehck_filter_date" />
          </ons-card>

      <!-- <div style=" padding: 1px; text-align: center; margin: 5px;">
        <span class="font-18">รอแจ้งโอน</span>
      </div> -->
      <ons-row>
        <ons-col class="active-btn_shoptype ex" >
          <div align="center">จัดการ</div>
        </ons-col>
        <ons-col  class="ex" >
          <div align="center">ประวัติ</div>
        </ons-col>
        
      </ons-row>
      <div id="body_shop">
      
      <script>
        ons.getScriptPage().onInit = function () {
          this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        }
      </script>
    </ons-page>
      <template id="body_shop_monitor_his.html">
                <ons-page >
                  <div id="body_shop_monitor_his" style="margin-top: 80px;">
                    
                  </div>
                   
                  <!-- <div id="shop_filter" style="display:none;"> </div> -->
                </ons-page>
                
            </template>

            <template id="body_shop_monitor.html">
                <ons-page id="body_shop_monitor">

                </ons-page>
            </template>
            </div>
      
  </template>


  <template id="forms.html">
    <ons-page id="forms-page">
      <ons-list>
        <ons-list-header>Text input</ons-list-header>
        <ons-list-item class="input-items">
          <div class="left">
            <ons-icon icon="md-face" class="list-item__icon"></ons-icon>
          </div>
          <label class="center">
            <ons-input id="name-input" float maxlength="20" placeholder="Name"></ons-input>
          </label>
        </ons-list-item>
        <ons-list-item class="input-items">
          <div class="left">
            <ons-icon icon="fa-question-circle-o" class="list-item__icon"></ons-icon>
          </div>
          <label class="center">
            <ons-search-input id="search-input" maxlength="20" placeholder="Search"></ons-search-input>
          </label>
        </ons-list-item>
        <ons-list-item>
          <div class="right right-label">
            <span id="name-display">Hello anonymous!</span>
            <ons-icon icon="fa-hand-spock-o" size="lg" class="right-icon"></ons-icon>
          </div>
        </ons-list-item>

        <ons-list-header>Switches</ons-list-header>
        <ons-list-item>
          <label class="center" for="switch1">
            Switch<span id="switch-status">&nbsp;(on)</span>
          </label>
          <div class="right">
            <ons-switch id="model-switch" input-id="switch1" checked="true"></ons-switch>
          </div>
        </ons-list-item>
        <ons-list-item>
          <label id="enabled-label" class="center" for="switch2">
            Enabled switch
          </label>
          <div class="right">
            <ons-switch id="disabled-switch" input-id="switch2"></ons-switch>
          </div>
        </ons-list-item>

        <ons-list-header>Select</ons-list-header>
        <ons-list-item>
          <div class="center">
            <ons-select id="select-input" style="width: 120px">
              <option value="Vue">
                Vue
              </option>
              <option value="React">
                React
              </option>
              <option value="Angular">
                Angular
              </option>
            </ons-select>

          </div>
          <div class="right right-label">
            <span id="awesome-platform">Vue&nbsp;</span>is awesome!
          </div>
        </ons-list-item>

        <ons-list-header>Radio buttons</ons-list-header>
        <ons-list-item tappable>
          <label class="left">
            <ons-radio class="radio-fruit" input-id="radio-0" value="Apples"></ons-radio>
          </label>
          <label for="radio-0" class="center">Apples</label>
        </ons-list-item>
        <ons-list-item tappable>
          <label class="left">
            <ons-radio class="radio-fruit" input-id="radio-1" value="Bananas" checked></ons-radio>
          </label>
          <label for="radio-1" class="center">Bananas</label>
        </ons-list-item>
        <ons-list-item tappable modifier="longdivider">
          <label class="left">
            <ons-radio class="radio-fruit" input-id="radio-2" value="Oranges"></ons-radio>
          </label>
          <label for="radio-2" class="center">Oranges</label>
        </ons-list-item>
        <ons-list-item>
          <div id="fruit-love" class="center">
            I love Bananas!
          </div>
        </ons-list-item>

        <ons-list-header>Checkboxes - <span id="checkboxes-header">Green,Blue</span></ons-list-header>
        <ons-list-item tappable>
          <label class="left">
            <ons-checkbox class="checkbox-color" input-id="checkbox-0" value="Red"></ons-checkbox>
          </label>
          <label class="center" for="checkbox-0">
            Red
          </label>
        </ons-list-item>
        <ons-list-item tappable>
          <label class="left">
            <ons-checkbox class="checkbox-color" input-id="checkbox-1" value="Green" checked></ons-checkbox>
          </label>
          <label class="center" for="checkbox-1">
            Green
          </label>
        </ons-list-item>
        <ons-list-item tappable>
          <label class="left">
            <ons-checkbox class="checkbox-color" input-id="checkbox-2" value="Blue" checked></ons-checkbox>
          </label>
          <label class="center" for="checkbox-2">
            Blue
          </label>
        </ons-list-item>

        <ons-list-header>Range slider</ons-list-header>
        <ons-list-item>
          Adjust the volume:
          <ons-row>
            <ons-col width="40px" style="text-align: center; line-height: 31px;">
              <ons-icon icon="md-volume-down"></ons-icon>
            </ons-col>
            <ons-col>
              <ons-range id="range-slider" value="25" style="width: 100%;"></ons-range>
            </ons-col>
            <ons-col width="40px" style="text-align: center; line-height: 31px;">
              <ons-icon icon="md-volume-up"></ons-icon>
            </ons-col>
          </ons-row>
          Volume:<span id="volume-value">&nbsp;25</span> <span id="careful-message" style="display: none">&nbsp;(careful, that's loud)</span>
        </ons-list-item>
      </ons-list>

      <script>
        ons.getScriptPage().onInit = function () {
          if (ons.platform.isAndroid()) {
            const inputItems = document.querySelectorAll('.input-items');
            for (i = 0; i < inputItems.length; i++) {
              inputItems[i].hasAttribute('modifier') ?
                      inputItems[i].setAttribute('modifier', inputItems[i].getAttribute('modifier') + ' nodivider') :
                      inputItems[i].setAttribute('modifier', 'nodivider');
            }
          }
          var nameInput = document.getElementById('name-input');
          var searchInput = document.getElementById('search-input');
          var updateInputs = function (event) {
            nameInput.value = event.target.value;
            searchInput.value = event.target.value;
            document.getElementById('name-display').innerHTML = event.target.value !== '' ? `Hello ${event.target.value}!` : 'Hello anonymous!';
          }
          nameInput.addEventListener('input', updateInputs);
          searchInput.addEventListener('input', updateInputs);
          document.getElementById('model-switch').addEventListener('change', function (event) {
            if (event.value) {
              document.getElementById('switch-status').innerHTML = `&nbsp;(on)`;
              document.getElementById('enabled-label').innerHTML = `Enabled switch`;
              document.getElementById('disabled-switch').disabled = false;
            } else {
              document.getElementById('switch-status').innerHTML = `&nbsp;(off)`;
              document.getElementById('enabled-label').innerHTML = `Disabled switch`;
              document.getElementById('disabled-switch').disabled = true;
            }
          });
          document.getElementById('select-input').addEventListener('change', function (event) {
            document.getElementById('awesome-platform').innerHTML = `${event.target.value}&nbsp;`;
          });
          var currentFruitId = 'radio-1';
          const radios = document.querySelectorAll('.radio-fruit')
          for (var i = 0; i < radios.length; i++) {
            var radio = radios[i];
            radio.addEventListener('change', function (event) {
              if (event.target.id !== currentFruitId) {
                document.getElementById('fruit-love').innerHTML = `I love ${event.target.value}!`;
                document.getElementById(currentFruitId).checked = false;
                currentFruitId = event.target.id;
              }
            })
          }
          var currentColors = ['Green', 'Blue'];
          const checkboxes = document.querySelectorAll('.checkbox-color')
          for (var i = 0; i < checkboxes.length; i++) {
            var checkbox = checkboxes[i];
            checkbox.addEventListener('change', function (event) {
              if (!currentColors.includes(event.target.value)) {
                currentColors.push(event.target.value);
              } else {
                var index = currentColors.indexOf(event.target.value);
                currentColors.splice(index, 1);
              }
              document.getElementById('checkboxes-header').innerHTML = currentColors;
            })
          }
          document.getElementById('range-slider').addEventListener('input', function (event) {
            document.getElementById('volume-value').innerHTML = `&nbsp;${event.target.value}`;
            if (event.target.value > 80) {
              document.getElementById('careful-message').style.display = 'inline-block';
            } else {
              document.getElementById('careful-message').style.display = 'none';
            }
          })
        }
      </script>

      <style>
        .right-icon {
          margin-left: 10px;
        }

        .right-label {
          color: #666;
        }
      </style>
    </ons-page>
  </template>

  <template id="animations.html">
    <ons-page>
      <ons-list>
        <ons-list-header>Transitions</ons-list-header>
        <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'none'}, 'none')">
          none
        </ons-list-item>
        <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'default'}, 'default')">
          default
        </ons-list-item>
        <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'slide-ios'}, 'slide-ios')">
          slide-ios
        </ons-list-item>
        <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'slide-md'}, 'slide-md')">
          slide-md
        </ons-list-item>
        <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'lift-ios'}, 'lift-ios')">
          lift-ios
        </ons-list-item>
        <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'lift-md'}, 'lift-md')">
          lift-md
        </ons-list-item>
        <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'fade-ios'}, 'fade-ios')">
          fade-ios
        </ons-list-item>
        <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'fade-md'}, 'fade-md')">
          fade-md
        </ons-list-item>
      </ons-list>
    </ons-page>
  </template>

  <template id="popup1.html">
    <ons-page>
      <ons-toolbar>
        <div class="left" onclick="$('#check_open_shop_id').val(0);">
          <ons-back-button>กลับ</ons-back-button>
        </div>
        <div class="center"></div>
        <div class="right">
          <ons-toolbar-button onclick="reloadApp();">
            <ons-icon icon="ion-home, material:md-home"></ons-icon>
          </ons-toolbar-button>
        </div>
      </ons-toolbar>
      <div id="body_popup1">
      </div>
      <script>
        ons.getScriptPage().onInit = function () {
          this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        }
      </script>
    </ons-page>
  </template>

  <input type="hidden" value="1" id="filter_type_trans_shop" />
  <style>
    ons-splitter-side[animation=overlay] {
      border-left: 1px solid #bbb;
    }
  </style>
  <script>
    function reloadApp() {
      var newURL = window.location.protocol + "//" + window.location.host + "" + window.location.pathname + window.location.search;
      //	console.log(newURL);
      //	location.replace(reloadApp)
      var pathname = new URL(newURL).pathname;
      //return;
      window.location = pathname;
    }
    window.fn = {};

    window.fn.toggleMenu = function () {
      document.getElementById('appSplitter').left.toggle();
    };

    window.fn.loadView = function (index) {
      document.getElementById('appTabbar').setActiveTab(index);
      document.getElementById('sidemenu').close();
    };

    window.fn.loadLink = function (url) {
      window.open(url, '_blank');
    };

    window.fn.pushPage = function (page, anim) {
      console.log(page);
      if (anim) {
    document.getElementById('appNavigator').pushPage(page.id, {
        data: {
            title: page.title
        },
        animation: anim
    });
} 
else {
    document.getElementById('appNavigator').pushPage(page.id, {
        data: {
            title: page.title
        }
    });
}
    };
    $(window).on('load', function () {
      modal.hide();
    });
    // window.fn.pushPage = function(page, anim) {
    // console.log(page);
    // console.log(page.id);
    // if(page.id=="option.html"){
    //     console.log("option");
    //     if(page.open=="car_brand"){
    //         $.ajax({
    //             url: "main/data_car_brand", // point to server-side PHP script 
    //             dataType: 'json', // what to expect back from the PHP script, if anything
    //             type: 'post',
    //             success: function(res) {
    //                 var d1 = [],d2 = [];
    //                 $.each(res, function( index, value ) {
    //                     if(value.popular>0){
    //                         d1.push(value);
    //                     }else{
    //                         d2.push(value);
    //                     }
    //                 });
    //                 var param = { data2 : d2, data1 : d1};
    //                 console.log(param);
    //                 $.post("component/cpn_car_brand",param,function(el){
    //                     $('#body_option').html(el);
    //                 });
    //             }
    //         });
    //     }
    //   }
    // }
    // 
    // 
    document.addEventListener('prechange', function (event) {
  console.log(event);
  var page = event.tabItem.getAttribute('page');
    console.log(page)
  // if (page == "shop_manage.html") {
  //   shopManage();
  //   $('#open_shop_manage').val(1);
  //   $('#open_shop_wait_trans').val(0);
  //   $('#box-shop_filter').fadeOut(300);
  // } 
if (page == "body_shop_monitor_his.html") {
  // box-shop_filter
    // $('#open_shop_manage').val(0);
    // $('#open_shop_wait_trans').val(0);
    $('#box-shop_filter').fadeIn(300);
    // $('#date_shop_his').show();
    // $('#date_shop_wait').hide();
    // $('#date_shop_his').val(today);
    historyShop();
  }
  if (page == "body_shop_monitor.html") {
  // box-shop_filter
    // $('#open_shop_manage').val(0);
    // $('#open_shop_wait_trans').val(0);
    $('#box-shop_filter').hide();
    // $('#date_shop_his').show();
    // $('#date_shop_wait').hide();
    // $('#date_shop_his').val(today);
    // shopManage();
  }
  // else {
  //   $('#open_shop_manage').val(0);
  //   $('#open_shop_wait_trans').val(0);
  //   $('#box-shop_filter').fadeOut(300);
  // }
  /*document.querySelector('ons-toolbar .center')
   .innerHTML = event.tabItem.getAttribute('label');*/
});
  </script>
</body>
</html>