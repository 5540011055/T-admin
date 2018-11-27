<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESCTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/

define('TBL_SHOPPING_PRODUCT', 'shopping_product');
define('TBL_SHOPPING_PRODUCT_MAIN', 'shopping_product_main');
define('TBL_PLAN_PRODUCT_PRICE_NAME', 'plan_product_price_name');
define('TBL_PLAN_PRODUCT_PRICE_SETTING', 'plan_product_price_setting');
define('TBL_PRODUCT_PRICE_LIST_ALL', 'product_price_list_all');
define('TBL_ORDER_BOOKING', 'order_booking');
define('TBL_WEB_CARALL', 'web_carall');
define('TBL_WEB_DRIVER', 'web_driver');
define('TBL_SHOPPING_OPEN_TIME', 'shopping_open_time');
define('TBL_SHOPPING_CONTACT', 'shopping_contact');
define('TBL_SHOPPING_CONTACT_TYPE', 'shopping_contact_type');
define('TBL_SHOPPING_PRODUCT_SUB', 'shopping_product_sub');
define('TBL_WEB_AREA', 'web_area');
define('TBL_WEB_REGION', 'web_region');
define('TBL_WEB_PROVINCE', 'web_province');
define('TBL_WEB_AMPHUR', 'web_amphur');
define('TBL_WEB_COUNTRY', 'web_country');
define('TBL_SHOP_COUNTRY_TAXI', 'shop_country_taxi');
define('TBL_SHOP_COUNTRY_COM', 'shop_country_com_taxi');
define('TBL_SHOP_COUNTRY_COM_LIST_TAXI', 'shop_country_com_list_taxi');
define('TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI', 'shop_country_com_list_price_taxi');
define('TBL_SHOP_COUNTRY_ICON_TAXI', 'shop_country_icon_taxi');
define('TBL_SHOP_PLAN_COM', 'shop_plan_com');
define('TBL_SHOP_PAYMENT_CHANNEL','shop_payment_channel');
define('TBL_PLACE_CAR_STATION','place_car_station');
define('TBL_PLACE_CAR_STATION_OTHRET','place_car_station_other');
define('TBL_PLACE_CAR_STATION_TYPE','place_car_station_type');
define('TBL_SHOP_STATION','shop_station');
define('TBL_SHOP_STATION_FIELD','shop_station_field');
define('TBL_SHOP_DOCCUMENT_FILE_IMG','shop_document_file_img');
define('TBL_CHAT_IMAGE','chat_image');
define('TBL_CHAT_MESSAGE','chat_message');

define('TBL_DEPOSIT','deposit');
define('TBL_DEPOSIT_HISTORY','deposit_history');
define('TBL_DEPOSIT_HISTORY_LOG','deposit_history_logs');











defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


define("t_n"," น.");  
define("t_send_to_customer","ส่งแขก");  
define("t_customer_history"," ประวัติส่งแขก");  
define("t_job_received","งานรถรับส่ง");  
define("t_tour_booking","จองทัวร์ ");  
define("t_receipts","รายรับ");  
define("t_expenses","รายจ่าย");  
define("t_my_account","บัญชีของฉัน");  
define("t_help_tools","เครื่องมือช่วยเหลือ");  
define("t_all_jobs","งานทั้งหมด");  
define("t_transfer_record","โอนเงิน-แจ้งโอน");  
define("t_province_you","คุณอยู่จังหวัด ");  
define("t_friends","แนะนำเพื่อน");  
define("t_maps","แผนที่");  
define("t_login_province","ล็อกอินจังหวัดที่คุณอยู่");  
define("t_login_another_province","ล็อกอินจังหวัดอื่น");  
define("t_shopping","ช้อปปิ้ง");  
define("t_provinces","จังหวัดอื่น");  
define("t_guest_shopping","แขกช็อปปิ้ง");  
define("t_customer","แขกรับส่ง");  
define("t_yesterday","เมื่อวาน");  
define("t_today","วันนี้ ");  
define("t_no_guest_list"," ไม่มีรายการส่งแขก");  
define("t_transfer_customer","แขกรับส่ง");  
define("t_pick_up_place","สถานที่รับ");  
define("t_exports"," ส่งออก");  
define("t_private","ไพรเวท");  
define("t_pickup_customer","รับแขก");  
define("t_agents","เอเย่นต์");  
define("t_name_guest","ชื่อแขก");  
define("t_phone","โทรศัพท์");  
define("t_voucher_number","วอเชอร์");  
define("t_drop_place","สถานที่ส่ง");  
define("t_type_of_vehicle","ประเภทรถ");  
define("t_arrive_drop_place"," ถึงสถานที่ส่ง");  
define("t_check_customer_name"," เช็คชื่อแขก");  
define("t_check_vehicle"," งานสำเร็จ  | เช็ครถ");  
define("t_check_luggage"," ตรวจเช็คสัมภาระในรถ");  
define("t_photo","ภาพ");  
define("t_time_taking_photo"," ถ่ายเมื่อ ");  
define("t_in_advance","ล่วงหน้า");  
define("t_no_job","ไม่มีงาน");  
define("t_now","ตอนนี้");  
define("t_navigation","นำทาง");  
define("t_details","รายละเอียด");  
define("","ระยะทาง 10.3 กม");  
define("","เวลา 20 นาที");  
define("t_pay_deposit","กรุณาจ่ายเงินมัดจำ");  
define("t_ok","ตกลง");  
define("t_please_confirm_selection","โปรดยืนยันการเลือกงานของคุณ");  
define("t_not","ไม่เเลือก");  
define("t_select","เลือก");  
define("t_jobs","งาน");  
define("t_total","รวม");  
define("t_total_expenses","รายจ่ายรวม");  
define("t_balances","ยอดคงเหลือ");  
define("t_transfers","โอนเงิน");  
define("t_transfer_notice","แจ้งโอน");  
define("t_transferred_account_details","รายละเอียดบัญชีรับโอน");  
define("t_bank_name","ชื่อธนาคาร");  
define("t_account_number","เลขที่บัญชี");  
define("t_account_name","ชื่อบัญชี");  
define("t_your_balance","ยอดเงินคงเหลือของคุณ");  
define("t_transfer_details","รายละเอียดบัญชีรับโอน");  
define("t_transfer_banks","ธนาคารที่โอน");  
define("t_amount","จำนานเงิน");  
define("t_money_transfer_slip","อับโหลดสลิปโอนเงิน");  
define("t_take_photos"," ถ่ายภาพ");  
define("t_cancel","ยกเลิก");  
define("t_no_photo_available","ไม่มีภาพถ่าย");  
define("t_unsubscribe","ยกเลิกส่งแขก");  
define("t_booking_number","เลขจอง");  
define("t_reservation_information"," ข้อมูลการจอง");  
define("t_car_driver_information"," ข้อมูลรถและคนขับ");  
define("t_check_in_information"," ข้อมูลการเช็คอิน");  
define("t_place_of_delivery"," ถึงสถานที่ส่งแขก");  
define("t_reception"," พนักงานรับแขก");  
define("t_income"," รายได้");  
define("t_parking_fee","ค่าจอด");  
define("t_nationality","สัญชาติ");  
define("t_not_paid","ยังไม่จ่ายเงิน");  
define("t_documents","เอกสาร ");  
define("t_pay_cash","จ่ายเงินสด");  
define("t_register","ลงทะเบียน");  
define("t_per_person","รายรับต่อหัว");  
define("t_Welcome_t-share","ยินดีต้อนรับเข้าสู่ T-Share");  
define("t_navigation_map","แสดงแผนที่นำทาง");  
define("t_flight","เที่ยวบิน");  
define("t_number","จำนวน");  
define("t_customer_not_go","แขกไม่ไป");  
define("t_customer_no_register","แขกลงทะเบียนไม่ได้");  
define("t_wrong_selected_place","เลือกสถานที่ผิด");  
define("t_are_you_sure","คุณแน่ใจหรือไม่ ");  
define("t_need_cancel_transfer","ว่าต้องการยกเลิกการส่งแขก");  
define("t_want_confirm_payment","ว่าต้องการยืนยันการจ่ายเงิน");  
define("t_upload_the_document_picture","กรุณาอัพโหลดเอกสารหรือภาพถ่าย");  
define("t_success","สำเร็จ");  
define("t_process","จัดการ");  
define("t_amend","แก้ไข");  
define("t_confirm","ยืนยัน");  
define("t_delivery_time","เวลาส่ง");  
define("t_number_customers","จำนวนแขก");  
define("t_adult","ผู้ใหญ่");  
define("t_child","เด็ก");  
define("t_infant","ทารก");  
define("t_edit_data","แก้ไขข้อมูล");  
define("t_confirm_registration","ยืนยันการลงทะเบียน");  
define("t_registration_failed","ลงทะเบียนไม่ได้");  
define("t_work_history","ประวัติการจัดการงาน");  
define("t_payment","ชำระเงิน");  
define("t_status","สถานะ");  
define("t_colleague","เพื่อนร่วมงาน");  
define("t_today_job","งานวันนี้");  
define("t_add_new_job","เพิ่มงานใหม่");  
define("t_send","ส่ง");  
define("t_remind","เตือน");  
define("t_voice_dialing","โทรออกด้วยเสียง");  
define("t_message","ข้อความ");  
define("t_car_information","ข้อมูลรถ");  
define("t_add_new_car","เพิ่มรถใหม่");  
define("t_all_car","รถทั้งหมด");  
define("t_income_details","บัญชีรายรับ");  
define("t_receipt_of_parking_fee","รายรับ ค่าจอด ค่าหัว");  
define("t_withdrawal_record","ประวัติการถอนเงิน");  
define("t_bank_account","บัญชีธนาคาร");  
define("t_personal_information","ข้อมูลส่วนตัว");  
define("t_important_data_file","ข้อมูลและเอกสาร");  
define("t_change_profile_picture","เปลี่ยนภาพประจำตัว");  
define("t_contact_information","ข้อมูลการติดต่อสื่อสาร");  
define("t_phone_number_the","เบอร์โทรศัพท์ส่วนตัว");  
define("t_change_password","เปลี่ยนรหัสผ่าน");  
define("t_documents","ไฟล์เอกสาร");  
define("t_work_information","ข้อมูลการทำงาน");  
define("t_missed_meal_fee","ค่าเที่ยว เบี้ยเลี้ยง");  
define("t_overtime_pay","เงินเดือน ค่าโอที");  
define("t_phone_number","เบอร์โทรศัพท์");  
define("t_driver_phone_no","เบอร์โทรศัพท์คนขับรถ");  
define("t_helpdesk","โปรแกรมช่วยเหลือ");  
define("t_find_hotel","ค้นหาโรงแรม");  
define("t_check_flight","เช็คเที่ยวบิน");  
define("t_language","ภาษา");  
define("t_sign_out","ออกจากระบบ");  
define("t_sign_out_successfully","ออกจากระบบสำเร็จ");  
define("t_started_waiting_for_customer","แจ้งรอรับแขก");  
define("t_go_with_king_power","ไปกับรถคิงส์ พาวเวอร์");  
define("t_car_shifts","รอบส่งกลับ");  
define("t_choose_car_shifts","เลือกรอบ");  
define("t_send_back_location","ส่งกลับที่");  
define("t_select_area","เลือกพื้นที่");  
define("t_send_airport_shifts","รอบไปสนามบิน");  
define("t_airport","สนามบิน");  
define("t_home_page","หน้าแรก");  
define("t_user_information","ข้อมูลผู้ใช้งาน");  
define("t_chat","แชท");  
define("t_financial_accounting","บัญชี การเงิน");  
define("t_add_colleague","เพิ่มเพื่อนร่วมงาน");  
define("t_manage_car","จัดการรถ");  
define("t_check_condition_car","ตรวจเช็คสภาพรถ");  
define("t_inform_car_repair","แจ้งซ่อมรถ");  
define("t_service_and_insurance","ศูนย์บริการและประกันภัย");  
define("t_new_applier","รายชื่อสมัครใหม่");  
define("t_all_colleagues","เพื่อนร่วมงานทั้งหมด");  
define("t_handle_task","จัดการงาน");  
define("t_open_for_business","เปิดให้ บริการ");  
define("t_everyday","ทุกวัน");  
define("t_work_remuneration","ค่าตอบแทน");  
define("t_look_work_remuneration","ดูค่าตอบแทน");  
define("t_location","ตำแหน่งที่ตั้ง");  
define("t_query","สอบถาม");  
define("t_marketing","การตลาด");  
define("t_download","ดาวน์โหลด");  
define("t_bouchure","โบร์ชัวร์");  
define("t_go_shopping","ไปช็อปปิ้ง");  
define("t_out_of_service","ปิดให้บริการ");  
define("t_select_region","เลือกภูมิภาค");  
define("t_place","สถานที่");  
define("t_select_province","เลือกจังหวัด");  
define("t_remaining_time","เหลือเวลา");  
define("t_send_to_shopping","  ส่งแขกช็อปปิ้ง");  
define("t_duty_free","ดิวตี้ฟรี");  
define("t_all_transfer_job","งานส่งแขกทั้งหมด");  
define("t_nearest_location","ต่ำแหน่งใกล้สุด");  
define("t_price","ราคา");  
define("t_accept_order","รับงาน");  
define("t_previous_day","วันก่อน");  
define("t_job_date","งานวันที่");  
define("t_transfer_to_account","โอนเงินเข้าบัญชี");  
define("t_yes","ใช่");  
define("t_no","ไม่ใช่");  
define("t_load_data","โหลดข้อมูล");  
define("t_THB","บาท");  
define("t_extra_use_car","งานใช้รถเพิ่ม");  
define("t_hour","ชั่วโมง");  
define("t_close","ปิด");  
define("t_total_allowance","รวมค่าเที่ยว เบี้ยเลี้ยง");  
define("t_phone_fee","ค่าโทรศัพท์");  
define("t_net_total_income","รายได้สุทธิ");  
define("t_payment_account","บัญชีรายจ่าย");  
define("t_job_management","การจัดการงาน");  
define("t_car_scheduling_time","ลำดับเวลาการเดินรถ");  
define("t_chat_room","ห้องสนทนา");  
define("t_back_to_previous_page","ย้อนกลับหน้าที่แล้ว");  
define("t_guest_registration","แขกลงทะเบียน");  
define("t_income_statement","แจ้งยอดรายได้");  
define("t_new_jobs","มีงานเข้ามาใหม่");  
define("t_please_check","กรุณาตรวจสอบ");  
define("t_previous_day","วันก่อน");  
define("t_pass_re_in","ข้อมูลการส่งแขกกลับ");  
define("t_time_period","รอบเวลา");  
define("t_phuket_airport","สนามบินภูเก็ต");  
define("t_termenal_finish","ส่งถึงปลายทางแล้ว");  
define("t_already_received","ได้รับเงินแล้ว");  
define("t_get_paid","คุณได้รับเงินแล้ว");  
define("t_on_the_car","ว่ามารถขึ้นรถแล้ว");  
define("t_profile","โปรไฟล์");  
define("t_alert","แจ้งเตือน");  
define("t_take_photo_regis","ถ่ายภาพใบลงทะเบียน");  
define("t_please_take_photo_regis","กรุณาถ่ายภาพใบลงทะเบียน");  
define("t_photo_passports","ถ่ายภาพพาสปอร์ตแขก");  
define("t_please_take_photo_drop_place","ถ่ายภาพสถานที่ส่งแขก");  
define("t_please_take_recep_photo","ถ่ายภาพพนักงานรับแขก");  
define("t_please_take_guest_regis","ถ่ายภาพแขกลงทะเบียน");  
define("t_take_photo_income_slip","ถ่ายภาพแจ้งยอดรายได้");  
define("t_passport","พาสปอร์ต");  
define("t_payment","จ่ายเงิน");  
define("t_open_ser","เปิดบริการ");  
define("t_open_now","เปิดให้บริการ");  
define("t_calende_sunday","อาทิตย์");  
define("t_calende_monday","จันทร์");  
define("t_calende_tuesday","อังคาร");  
define("t_calende_wednesday","พุธ");  
define("t_calende_thursday","พฤหัสบดี");  
define("t_calende_friday","ศุกร์");  
define("t_calende_saturday","เสาร์");  
define("t_show_detail","แสดงรายละเอียด");  
define("t_day","วัน");  
define("t_register_18y_full_txt","ผู้ลงทะเบียนต้องอายุ 18 ปี ขึ้นไป");  
define("t_china","จีน");  
define("t_person_fee","ค่าหัว");  
define("t_minutes","นาที");  
define("t_km","กิโลเมตร");  
define("t_distance","ระยะทาง");  
define("t_time","เวลา");  
define("t_office_hours","เวลาทำการ");  
define("t_advance_service","ล่วงหน้า");  
define("t_open_over","เปิดตลอด 24 ชม.");  
define("t_close_time","เวลาปิด");  
define("t_remuneration_type","ประเภทค่าตอบแทน");  
define("t_com_fee","ค่าคอมมิชชั่น");  
define("t_foreign","ชาติอื่น");  
define("t_timeout_service","หมดเวลาให้บริการ");  
define("t_person","คน");  
define("t_company","บริษัท");  
define("t_driver","คนขับ");  
define("t_counter","เคาน์เตอร์");  
define("t_member","สมาชิก");  
define("t_log_in","เข้าสู่ระบบ");  
define("t_forgot_password","ลืมข้อมูลเข้าสู่ระบบ");  
define("t_recovery_password","กู้รหัสผ่าน");  
define("t_recovery_username","กู้ชื่อผู้ใช้งาน");  
define("t_use_phone_number","ทางเบอร์มือถือ");  
define("t_please_enter_phone_number","กรุณากรอกเบอร์มือถือ");  
define("t_please_enter_email","กรุณากรอกอีเมล์");  
define("t_user_name","ใช้ชื่อผู้ใช้งาน");  
define("t_please_enter_username","กรุณากรอกชื่อผู้ใช้งาน");  
define("t_register_member","สมัครสมาชิกใหม่");  
define("t_username","ชื่อผู้ใช้งาน");  
define("t_confirm_signout","ว่าต้องการออกจากระบบ?");  
define("t_password","รหัสผ่าน");  
define("t_remember_me","จดจำข้อมูลเข้าสู่ระบบ");  
define("t_first_name","ชื่อ");  
define("t_last_name","นามสกุล");  
define("t_nick_name","ชื่อเล่น");  
define("t_current_address","ที่อยู่ปัจจุบัน");  
define("t_province","จังหวัด");  
define("t_email","อีเมล์");  
define("t_not_mandatory","ไม่บังคับกรอก");  
define("t_take_photo","ถ่ายภาพคุณ");  
define("t_save_data","บันทึกข้อมูล");  
define("t_send_password","ส่งรหัส");  
define("t_open_time","เวลาเปิด");  
define("t_contact","ติดต่อ");  
define("t_south_area","ภาคใต้");  
define("t_search_by_name","ค้นหาจากชื่อ");  
define("t_search_by_place","ค้นหาจากชื่อสถานที่");  
define("t_calende","มกราคม");  
define("t_calende","กุมภาพันธ์");  
define("t_calende","มีนาคม");  
define("t_calende","เมษายน");  
define("t_calende","พฤษภาคม");  
define("t_calende","มิถุนายน");  
define("t_calende","กรกฏาคม");  
define("t_calende","สิงหาคม");  
define("t_calende","กันยายน");  
define("t_calende","ตุลาคม");  
define("t_calende","พฤศจิกายน");  
define("t_calende","ธันวาคม");  
define("t_calende","ม.ค.");  
define("t_calende","ก.พ.");  
define("t_calende","มี.ค.");  
define("t_calende","เม.ย.");  
define("t_calende","พ.ค.");  
define("t_calende","มิ.ย.");  
define("t_calende","ก.ค.");  
define("t_calende","ส.ค.");  
define("t_calende","ก.ย.");  
define("t_calende","	ต.ค.");  
define("t_calende","พ.ย.");  
define("t_calende","ธ.ค.");  
define("t_calende","อา");  
define("t_calende","จ");  
define("t_calende","อ");  
define("t_calende","พ");  
define("t_calende","พฤ");  
define("t_calende","ศ");  
define("t_calende","ส");  
define("t_date","วันที่");  
define("t_all","ทั้งหมด");  
define("t_time_to_place","เวลาถึงโดยประมาณ");  
define("t_delete","ลบ");  
define("t_select_car_brand","เลือกยี่ห้อรถ");  
define("t_car_brand","ยี่ห้อรถ");  
define("t_model_year_manufacture","รุ่น / ปีที่ผลิต");  
define("t_choose_color","เลือกสีรถ");  
define("t_black","ดำ");  
define("t_yellow","เหลือง");  
define("t_green","เขียว");  
define("t_red","แดง");  
define("t_gray","เทา");  
define("t_bronce_gold","บรอนด์ทอง");  
define("t_silver","บรอนด์เงิน");  
define("t_car_registration_number","เลขทะเบียนรถ");  
define("t_license_plate_color","สีป้ายทะเบียน");  
define("t_choose_license_plate_color","เลือกสีป้ายทะเบียน");  
define("t_take_picture_inside_car","ถ่ายภาพด้านในรถ");  
define("t_reset","รีเซ็ต");  
define("t_correct_information","ว่าข้อมูลถูกต้อง");  
define("t_save_succeed","บันทึกสำเร็จ");  
define("t_press_button_close","กดปุ่มเพื่อปิด!");  
define("t_select_a_vehicle_type","เลือกประเภทรถ");  
define("t_car_coloring","สีรถ");  
define("t_region","ภูมิภาค");  
define("t_please_take_pictures_car_side	","ถ่ายภาพด้านข้างรถ");  
define("t_cancelled","ยกเลิก");  
define("t_error","ผิดพลาด");  
define("t_white","ขาว");  
define("t_please_take_pictures_front_car","ถ่ายภาพด้านหน้ารถ");  
define("t_select_car_brand","กรุณาเลือกยี่ห้อรถ");  
define("t_please_enter_car_registration_number.","กรุณากรอกหมายเลขทะเบียนรถ");  
define("t_please_take_pictures_front_car","กรุณาถ่ายภาพด้านหน้ารถ");  
define("t_please_take_pictures_car_side","กรุณาถ่ายภาพด้านข้างรถ");  
define("t_please_take_picture_inside_car","กรุณาถ่ายภาพข้างในรถ");  
define("t_type","ประเภท");  
define("t_deletess","ว่าต้องการลบ");  
define("t_open","เปิด");  
define("t_category","หมวดหมู่");  
define("t_address","ที่อยู่");  
define("t_latitude","ละติดจูด");  
define("t_longitude","ลองติจูด");  
define("t_link_maps","เชื่อมโยงแผนที่");  
define("t_recommend_friend","QR CODE แนะนำให้เพื่อน");  
define("t_recommended_driver","แนะนำให้คนขับรถ");  
define("t_please_select_province","กรุณาเลือกจังหวัด");  
define("t_no_products_your_province","ไม่มีสินค้าในจังหวัดที่คุณอยู่");  
define("t_kings_power _phuket","คิงส์ พาวเวอร์ (ภูเก็ต)");  
define("t_end_of_service","สิ้นสุดให้บริการ");  
define("t_bus","รถบัส");  
define("t_van","รถตู้");  
define("t_saloon","รถเก๋ง");  
define("t_edit_car_info","แก้ไขข้อมูลรถ");  
define("t_add_car","เพิ่มรถ");  
define("t_ancel_commonly_used","เลิกใช้ประจำ ");  
define("t_disable","เลิกใช้งาน ");  
define("t_brand","ยี่ห้อ");  
define("t_model","รุ่น");  
define("t_use_regularly","ใช้ประจำ ");  
define("t_cancel_often_used","ว่าต้องการเลิกใช้ประจำ");  
define("t_want_to_use_regularly","ว่าต้องการใช้ประจำ");  
define("t_cancel_use","ว่าต้องการเลิกใช้งาน");  
define("t_edit","แก้ไข");  
define("t_month","เดือน ");  
define("t_buddhist_calendar","พ.ศ. ");  
define("t_shopping","งานช็อปปิ้ง");  
define("t_bank"," ธนาคาร ");  
define("t_bank_branch"," สาขาธนาคาร");  
define("t_bank_account_information","ข้อมูลบัญชีธนาคาร");  
define("t_name_last_name_thai","ชื่อ - นามสกุล (ไทย)");  
define("t_name_last_name_english","ชื่อ - นามสกุล (อังกฤษ)");  
define("t_identity_card_number","เลขบัตรประจำตัวประชาชน");  
define("t_driver_license_number","หมายเลขใบขับขี่");  
define("t_emergency_telephone_numbers","เบอร์โทรฉุกเฉิน");  
define("t_user_info","ข้อมูลส่วนตัวผู้ใช้งาน");  
define("t_identity_card"," บัตรประจำตัวประชาชน ");  
define("t_driver_license"," ใบอนุญาตขับขี่");  
define("t_upload_file","อัพไฟล์");  
define("t_income_sort","ประเภทรายรับ");  
define("t_need_to_open","ว่าต้องการเปิด");  
define("t_district","อำเภอ/เขต");  
define("t_select_district","เลือกเขต/อำเภอ");  
define("t_search","ค้นหา");  
define("t_wrong_links","ลิงค์ ผิดพลาด!");  
define("t_select_compensation_sort","เลือกประเภทค่าตอบแทน");  
define("t_VAT","ภาษีมูลค่าเพิ่ม");  
define("t_have_VAT","มีภาษีมูลค่าเพิ่ม");  
define("t_pay_comission","จ่ายค่าคอมมิชชั่น");  
define("t_customer_go_back","แขกเดินทางกลับ");  
define("t_VAT_refund","คืนภาษามูลค่าเพิ่ม");  
define("t_VAT_can_refund_to_customer","ลูกค้าสามารถคืนภาษามูลค่าเพิ่มได้");  
define("t_default","ค่าเริ่มต้น");  
define("t_show_business_time","แสดงเวลาทำการ ");  
define("t_open_daily","เปิดทุกวัน");  
define("t_open_24_hr","เปิด 24 ชม");  
define("t_additional_time","เวลาเพิ่มเติม");  
define("t_logo","โลโก้");  
define("t_select_picture","เลือกภาพถ่าย");  
define("t_select_brochure","เลือกโบรชัวร์");  
define("t_please_fill_with_thai","กรุณากรอกชื่อภาษาไทย");  
define("t_please_fill_in_address","กรุณากรอกที่อยู่");  
define("t_please_fill_in_phont_no","กรุณากรอกเบอร์โทรศัพท์");  
define("t_add_document","เพิ่มเอกสาร");  
define("t_select_document_type","เลือกประเภทเอกสาร");  
define("t_have_document_expire_date ","มีวันหมดอายุเอกสาร");  
define("t_date_of_issue_expire","วันเริ่ม-หมดอายุ");  
define("t_to","ถึง");  
define("t_files","ไฟล์");  
define("t_please_select_document_type","กรุณาเลือกประเภทเอกสาร");  
define("t_upload_file_success","อัพโหลดไฟล์สำเร็จ");  
define("t_province_log_in","ล็อกอินจังหวัด");  
define("t_please_select_region","กรุณาเลือกภูมิภาค");  
define("t_apply_new_colleague","สมัครเพื่อนร่วมงานใหม่");  
define("t_new_shopping_customer","งานพาแขกช็อปปิ้งใหม่");  
define("t_new_shopping_customer","ว่าต้องการยืนยันการลงทะเบียน");  
define("t_need_to_cancel","ว่าต้องการยกเลิก");  
define("t_new","ใหม่");  
define("t_booking_no","เลขการจอง");  
define("t_boarding_time","เวลาเดินทาง");  
define("t_name_last_name","ชื่อ-นามสกุล");  
define("t_check_detail","ตรวจสอบข้อมูล");  
define("t_reject","ปฏิเสธ");  
define("t_enable","เปิดใช้งาน");  
define("t_using","ใช้งาน");  
define("t_need_to_enable","ว่าต้องการเปิดใช้งาน");  
define("t_edit_car","แก้ไขรถ");  
define("t_SUV","suv");  
define("t_tuk_tuk","รถตุ๊กๆ");  
define("t_mini_bus","รถสองแถว");  
define("t_other","อื่นๆ");  
define("t_set_up_car","ตั้งค่าการใช้งานรถ");  
define("t_regular_car","ใช้รถประจำ");  
define("t_cancel_car","ยกเลิกใช้รถ");  
define("t_number_of_using_car","จำนวนรถที่ใช้งาน");  
define("t_not_have_car","ยังไม่มีรถให้เลือก");  
define("t_car","คัน");  
define("t_total_revenue","รายได้รวม");  
define("t_enable_number","เปิดใช้งานจำนวน");  
define("t_no_enable_nationality","ยังไม่มีสัญชาติที่เปิดใช้งาน");  
define("t_user","ผู้ใช้งาน");  
define("t_number_of_people","จำนวนคน");  
define("t_from","จาก");  
define("t_update","อัพเดท");  
define("t_update_price","อัพเดทราคา");  
define("t_please_select_initial_number_of_people.","กรุณาเลือกจำนวนคนเริ่มต้น");  
define("t_please_select_end_number_people","กรุณาเลือกจำนวนคนสิ้นสุด");  
define("t_please_fill_in_price","กรุณากรอกราคา");  
define("t_show_all_price","แสดงราคาทั้งหมด");  
define("t_show_price_by_nationality","แสดงราคาตามสัญชาติ");  
define("t_set_up_standard_price","ตั้งราคามาตรฐาน");  
define("t_you_did_not_have_bank_account","คุณยังไม่มีข้อมูลบัญชีธนาคาร");  
define("t_add_new_bank_account","เพิ่มบัญชีธนาคารใหม่");  
define("t_please_select_bank","กรุณาเลือกธนาคาร");  
define("t_please_fill_in_bank_account_name","กรุณากรอกชื่อบัญชีธนาคาร");  
define("t_please_fill_in_bank_branch","กรุณากรอกสาขาธนาคาร");  
define("t_please_fill_in_bank_account_number","กรุณากรอกเลขที่บัญชีธนาคาร");  
define("t_save_personal_info_was_successed","บันทึกข้อมูลส่วนตัวสำเร็จ");  
define("t_save_personal_info_was_failed","บันทึกข้อมูลส่วนตัวผิดพลาด");  
define("t_please_fill_in_password","กรุณากรอกรหัสผ่าน");  
define("t_please_fill_in_nickname","กรุณากรอกชื่อเล่น");  
define("t_error","เกิดข้อผิดพลาด");  
define("t_public_bus_info","ข้อมูลรถรับส่งสาธารณะ");  
define("t_take_photo_ID_card","ถ่ายภาพบัตรประชาชน");  
define("t_take_photo_driver_license","ถ่ายภาพใบขับขี่");  
define("t_vehicle_registration","เอกสารจดทะเบียนรถยนต์");  
define("t_number","หมายเลข");  
define("t_vehicle_insurance","ประกันภัยนรถยนต์");  
define("t_insurance_company","บริษัทประกันภัย");  
define("t_insurance_number","หมายเลขประกันภัย");  
define("t_take_photo_insurance","ถ่ายภาพประกันภัย");  
define("t_please_fill_in_driver_license_number","กรุณากรอกหมายเลขใบขับขี");  
define("t_please_fill_in_driver_license_expire","กรุณากรอกวันหมดอายุใบขับขี");  
define("t_please_take_photo_driver_license","กรุณาถ่ายภาพใบขับขี่");  
define("t_please_select_u_address","กรุณาเลือกพื้นที่ที่อยู่ประจำ");  
define("t_please_take_photo","กรุณาถ่ายภาพคุณ");  
define("t_please_u_pv","กรุณาเลือกจัวหวัดที่อยู่ประจำ");  
define("t_view_job_date","เลือกดูงานจากวันที่");  
define("t_please_select_hour","กรุณาเลือกชั่วโมง");  
define("t_please_select_minute","กรุณาเลือกนาที");  
define("t_pease_select_car","กรุณาเลือกรถที่ใช้งาน");  
define("t_please_select_num_adult","กรุณาเลือกจำนวนผู้ใหญ่หรือเด็กอย่างน้อย 1 คน");  
define("t_please_select_remuneration","กรุณาเลือกประเภทค่าตอบแทน");  
define("t_please_select_num_adult","กรุณาเลือกจำนวนแขกผู้ใหญ่");  
define("t_please_select_num_child","กรุณาเลือกจำนวนแขกเด็ก");  
define("t_select_num_adult","เลือกจำนวนผู้ใหญ่");  
define("t_select_num_child","เลือกจำนวนเด็ก");  
define("t_your_car_infor","ข้อมูลรถของท่าน");  
define("t_arrival_time","เวลาถึง");  
define("t_get_paid_type","วิธีรับเงิน");  
define("t_get_cash","รับเงินสด");  
define("t_no_bank_acc","ไม่มีบัญชี");  
define("t_back_previous","ย้อนกลับ");  
define("t_not_verify_u_pv","ไม่สามารถตรวจสอบจังหวัดของคุณได้");  
define("t_call","โทร");  
define("t_view_passport","ดูในพาสปอร์ต");  
define("t_hiden","ซ่อน");  
define("t_show","แสดง");  
define("t_dv_name","ชื่อคนขับ");  
define("t_receptionist","พนักงานต้อนรับ");  
define("t_history","ประวัติ");  
define("t_pay_on","จ่ายเงินเมื่อวันที่");  
define("t_paid","จ่ายเงินแล้ว");  
define("t_no_history","ไม่มีประวัติ");  
define("t_pending","รอดำเนินการ");  
define("t_amount","จำนวนเงิน");  
define("t_confirm_or_receipt","ยืนยันการได้รับเงิน");  
define("t_no_file_upload","ไม่มีการอัพโหลดไฟล์");  
define("t_cause","สาเหตุ");  
define("t_guest_agent","แขกเอเย่นต์");  
define("t_photo","ภาพถ่าย");  
define("t_select_your_car","เลือกรถที่จะใช้งาน");  
define("t_want_get_job","ว่าต้องการรับงานนี้");  
define("t_his_transfer","ประวัติรับ-ส่ง");  
define("t_car_request","รถที่ต้องการ");  
define("t_capacity","ความจุ");  
define("t_use_car","รถที่ใช้");  
define("t_take_pic_guest","ถ่ายภาพเช็คชื่อแขก");  
define("t_no_guests","ไม่เจอแขก");  
define("t_manage","จัดการ");  
define("t_transfer_his","ประวัติงานรถรับส่ง");  
define("t_complete_job","เสร็จงาน");  
define("t_year","ปี");  
define("t_u_balance","ยอดเงินของคุณ");  
define("t_job_confirmation","ยืนยันการรับงาน");  
define("t_booking","จองรถ");  