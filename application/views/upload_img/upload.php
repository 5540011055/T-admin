<?php
if ($_GET[type] == "slipt_inform") {
  $path = "../data/fileupload/pay/".$_GET[id].".jpg";
  $result = move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$path);
  $return[result] = $result;
  $return[path] = $path;
  $return[tmp] = $_FILES["fileUpload"]["tmp_name"];
  echo json_encode($return);
}

if ($_GET[type] == "slipt_withdraw") {
  $path = "../data/fileupload/doc_pay_driver/transfer/slip_withdraw/".$_GET[id].".jpg";
  $result = move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$path);
  $return[result] = $result;
  $return[path] = $path;
  $return[tmp] = $_FILES["fileUpload"]["tmp_name"];
  echo json_encode($return);
}
?>