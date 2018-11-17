<?

CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);

include("FCKeditor/fckeditor.php") ;

function removeDir($path) {

    // Normalise $path.
    $path = rtrim($path, '/') . '/';

    // Remove all child files and directories.
    $items = glob($path . '*');

    foreach($items as $item) {
        is_dir($item) ? removeDir($item) : unlink($item);
    }

    // Remove directory.
    rmdir($path);
}

?>

 <?php
function GetFolderSize($d ="." ) {
// ? kasskooye and patricia benedetto
$h = @opendir($d);
if($h==0)return 0;

while ($f=readdir($h)){
if ( $f!= "..") {
$sf+=filesize($nd=$d."/".$f);
if($f!="."&&is_dir($nd)){
$sf+=GetFolderSize ($nd);
}
}
}
closedir($h);
return $sf ;
}
?>

<SCRIPT LANGUAGE="JavaScript">

<!--

function showHide(elementid){

if (document.getElementById(elementid).style.display == 'none'){

document.getElementById(elementid).style.display = '';

} else {

document.getElementById(elementid).style.display = 'none';

}

}

//-->

</SCRIPT>









<script type="text/javascript">

function sum(){

var alphaExp = /[\@\#\%\/\\\^\&\*\(\)\_\+\.]/;

if (document.getElementById("paysms").value.match(alphaExp))

{

alert("͹حҵͧ¾ɤ");

document.getElementById('paysms').value="";

return false ;

}

if(document.getElementById('paysms').value == "") {

document.getElementById('result').value = parseInt(document.getElementById('allsms').value)  ;

return false ;

}



else if(document.getElementById('paysms').value > 0) {

document.getElementById('result').value = parseInt(document.getElementById('allsms').value) + parseInt(document.getElementById('paysms').value)   ;

return false ;

}



}

function  number() {

		if(document.getElementById('result').value < 0) {

		alert("ӹǹ SMS ͧ͹§ سкبӹǹ") ;

document.getElementById('paysms').value="";

return false ;



}

		}

		var iCountDown=setInterval("sum()",1000); 

				var iCountDown=setInterval("number()",1000); 

</script>

<script type="text/javascript" src="datepic.js"></script><TABLE cellSpacing=0 cellPadding=0 width=100% border=0>

      <TBODY>

        <TR>

          <TD width=100% vAlign=top><!-- Admin -->

            <TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>

				<TR>

					

				</TR>

				<TR>

					<TD valign="top"><table width="100%" border="0" cellpadding="0" bgcolor="#FFFFFF">

                          <tr>

                            <td  class="topic_h"><img src="imagesmenu/KoolAjax.png" width="16" height="16" align="absmiddle" />&nbsp;Document Management</span></span></td>

                          </tr>

                      </table>

				      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="topic_menu" style="display:none">
                        <tr>
                          <td><a href="?name=admin/detail&file=file_all&id=<?=$_GET[id];?>"><img src="images/admin/open.gif"  border="0" align="absmiddle" /> All Document </a> &nbsp;&nbsp;&nbsp;<a href="?name=admin/detail&file=file_all&op=account_add&id=<?=$_GET[id];?>"><img src="images/admin/book.png"  border="0" align="absmiddle" /> Add New Document</a></td>
                        </tr>
                      </table>
				     
                    <?

//////////////////////////////////////////// ʴ¡ Project   

if($_GET[op] ==""){

	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	$limit = 200 ;

	$SUMPAGE = $db->num_rows(TB_detail_doc,"id","");

	$page=$_GET[page];

	if (empty($page)){

		$page=1;

	}

	$rt = $SUMPAGE%$limit ;

	$totalpage_location = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 

	$goto = ($page-1)*$limit ;

?>
                    <br />
                    <br />
                    <form action="?name=admin/detail&file=file_all&op=dailytour_del&action=multidel" name="myform" method="post">

 <table width="100%" cellspacing="2" cellpadding="1" >

  <tr bgcolor="#990000" height=25>

   <td width="60" align="center" bgcolor="#999999"><CENTER>

          <font color="#FFFFFF">Option</font>     

   </CENTER></td>

   <td width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">View</font></td>
   <td align="center" bgcolor="#999999"><font color="#FFFFFF">File Name </font></td>
   
   <td width="100" align="center" bgcolor="#999999"><font color="#FFFFFF">Finish</font></td>
   <td width="100" align="center" bgcolor="#999999"><font color="#FFFFFF">Time Left </font></td>
   <td width="200" align="center" bgcolor="#999999"><font color="#FFFFFF">Company</font></td>
   <td width="100" align="center" bgcolor="#999999"><font color="#FFFFFF">Size</font></td>

   

   <td width="49" align="center" bgcolor="#999999"><font color="#FFFFFF">Type </font></td>
   </tr>  

<?

$res[project] = $db->select_query("SELECT * FROM ".TB_detail_doc." $atoz ORDER BY name ASC LIMIT $goto, $limit ");

while($arr[project] = $db->fetch($res[project])){



	$res[type] = $db->select_query("SELECT * FROM ".TB_detail_doc_group." WHERE id='".$arr[project][type]."' ");

	$arr[type] = $db->fetch($res[type]);




	$res[company] = $db->select_query("SELECT * FROM ".TB_admin." WHERE id='".$arr[project][company]."' ");

	$arr[company] = $db->fetch($res[company]);



			///////////////
 



	//Comment Icon

	if($arr[project][enable_comment]){

		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";

	}else{

		$CommentIcon = "";

	}

			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 

 echo "<tr bgcolor='$bgcolor'>\n";

?>



<td align="center">

      <a href="?name=admin/detail&file=file_all&op=dailytour_edit&id=<? echo $arr[project][id];?>"></a> 

      <a href="javascript:Confirm('?name=admin/detail&file=file_all&op=dailytour_del&id=<? echo $arr[project][id];?>&prefix=admin/admin/detail/file/<? echo $arr[project][company];?>/<? echo $arr[project][folder];?>','You are sure to be deleted!');"><img src="images/admin/trash.png"  border="0" alt="Delete" ></a>     </td> 

     <td align="center"><a href="?name=admin/detail&file=file_all&op=pic_view&id=<? echo $arr[project][id];?>" target="_blank"><img src="iconstatus/small/search.png" border="0" alt="Edit" /></a> </td>
     <td height="25" align="center"><? echo $arr[project][name];?></td>
     <td width="100" height="25" align="center"><? echo $arr[project][finish];?></td>
     <td width="100" height="25" align="center"><?
	   
	   
	 
	   
	   
	   $servtime = $arr[project][finish];
 
 
$date_diff = abs(strtotime(date('y-m-d')));
$date_diff2 = strtotime($servtime);

$num1=$date_diff / 86400;
$num2= $date_diff2 / 86400;
$sum=$num2 - $num1;
echo $dateall = number_format($sum,0)  ;



 
	   
	   ?></td>
     <td align="center"><? echo $arr[company][company];?> </td>
     <td align="center"><strong> </strong>
       <table width="100%" border="0" cellspacing="0" cellpadding="1">

         <tr>         </tr>
       </table>
       <? echo number_format( $fileall , 0 );?> Kb.</td>

     <td align="center"><? echo $arr[project][pictype];?></td>
     </tr>

	<TR>

		<TD colspan="17" height="1" class="dotline"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E6E6E6" id='ShowHideTable<? echo $arr[project][id];?>'  style='display:none<? if($_GET[location] ==$arr[project][id] ){ echo 'a';} ?>'>

  <tr>

    <td><? include"admin/admin/locationtlist_sub.php";?></td>
  </tr>

</table></TD>
	</TR>

<?

 } 

?>
 </table>

 <div align="right"></div>

 </form><span class="page"><?=button_page;?>: </span>

<?

	SplitPage($page,$totalpage_location,"?name=admin/detail&file=file_all");	echo $ShowSumPages ;

	echo $ShowPages ;

}



else if($_GET[op] == "useropen"){

	//////////////////////////////////////////// óź Multi

	if(1==1){

		



		echo $value;

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

		$db->update_db(TB_amphur,array(



			"transfer"=>"$_GET[status]"

		)," id=$_GET[id] ");

	$db->closedb ();

	

	

		$ProcessOutput .= "<BR><BR>";

		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";



		$ProcessOutput .= "</CENTER>";

		$ProcessOutput .= "<BR><BR>";

		echo "<meta http-equiv=refresh content=0;URL=?name=admin/detail&file=file_all&location=".$_GET[location].">";

	}else{

		//óҹ

		$ProcessOutput = $PermissionFalse ;

	}

	echo $ProcessOutput ;

} 

else if($_GET[op] == "account_add" AND $_GET[action] == "add"){

	//////////////////////////////////////////// ó Database

	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){


	$res[type] = $db->select_query("SELECT * FROM ".TB_detail_doc_group." WHERE id='".$_POST[type]."' ");

	$arr[type] = $db->fetch($res[type]);
	
	
$typename=$arr[type][logo];

$docname=$arr[type][category_name]._.$_POST[name];


 


$numfile = $db->num_rows(TB_detail_doc,"id"," type=".$_POST[type]." and company=".$_POST[company]." ");

$numfile=$numfile+1;


$folder=$typename.TIMESTAMP;




////////////// last id check 2

$tablename      = "web_detail_doc";
$next_increment     = 0;
$qShowStatus        = "SHOW TABLE STATUS LIKE '$tablename'";
$qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);
$member_in = $row['Auto_increment'];

		////////////
		
@mkdir("admin/admin/detail/file/".$_POST[company]."/$folder", 0777);  






	for($i=0;$i<count($_FILES["filUpload"]["name"]);$i++)
	{
		if($_FILES["filUpload"]["name"][$i] != "")
		{
		
		$sur = strrchr($_FILES["filUpload"]["name"][$i], "."); //ตัดนามสกุลไฟล์เก็บไว้
		
		 	
			
				//*** Insert Record ***//
				$topic=$_FILES["filUpload"]["name"][$i];
				
			 	
				$rand = substr(str_shuffle('123456789'),0,30);
				$newfilename =( $docname._.$_POST["number"][$i].$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
				
				
				
				//////////
				//@copy ("pic/galleryicon/".$_FILES["filUpload"]["name"][$i] , "pic/galleryicon/$rand.jpg" );


	



	@copy($_FILES["filUpload"]["tmp_name"][$i],"admin/admin/detail/file/".$_POST[company]."/$folder/".$newfilename); //แล้วค่อยเก็บลงไฟล์





		//ӡŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_detail_doc_list,array(
		"invoice"=>"$member_in",
		"name"=>"$newfilename",
		"start"=>"$_POST[start]",
		"finish"=>"$_POST[finish]",
		"post_date"=>"".TIMESTAMP."",
		"update_date"=>"".TIMESTAMP."",
		"posted"=>"$_SESSION[admin_user]",
		"type"=>"$_POST[type]",
		
		"pictype"=>"$sur",
		"number"=>$_POST["number"][$i],
		
		"company"=>"$_POST[company]"
		));
		$db->closedb ();

				}
 
	}

			

//	@copy ($FILE['tmp_name'] , "admin/admin/detail/file/".$_GET[id]."/".TIMESTAMP.".jpg" );
	
	

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);



////////////////

		$db->add_db(TB_detail_doc,array(
		
		
		"invoice"=>"$member_in",
		"name"=>"$docname",
		"start"=>"$_POST[start]",
		"finish"=>"$_POST[finish]",
		"post_date"=>"".TIMESTAMP."",
		"update_date"=>"".TIMESTAMP."",
		"posted"=>"$_SESSION[admin_user]",
		"type"=>"$_POST[type]",
		
		"pictype"=>"$sur",
		"folder"=>"$folder",
		"number"=>"$i",
		
		"company"=>"$_POST[company]"

			

		));

		$db->closedb ();









		///////////////
		
		
		
		
		
		////////////////





		$ProcessOutput .= "<BR><BR>";

		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";

		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Add Document complete</B></FONT><BR><BR>";

		$ProcessOutput .= "<A HREF=\"?name=admin/detail&file=file_all\"><B>Back to Document </B></A>";
		

		$ProcessOutput .= "</CENTER>";
		
	echo "<meta http-equiv=refresh content=1;URL=index.php?name=admin/detail&file=file_all&op=account_add&id=$_GET[id]>"; 	
		

		$ProcessOutput .= "<BR><BR>";

	}else{

		//óҹ

		$ProcessOutput = $PermissionFalse ;

	}

	echo $ProcessOutput ;

}

if($_GET[op] == "account_add"){


   
 




	//////////////////////////////////////////// ó Form

	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
	
			$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[product] = $db->select_query("SELECT * FROM ".TB_admin." WHERE id='".$_GET[id]."' ");
		$arr[product] = $db->fetch($res[product]);

?>
<br />
  <? include("admin/admin/detail/file_list.php") ;?>
<FORM NAME="myformtour" METHOD=POST ACTION="?name=admin/detail&file=file_all&id=<?=$_GET[id];?>&op=account_add&action=add" enctype="multipart/form-data" onsubmit="return checktour()">
  <br />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="topic_sup">
    <tr>
      <td><font size="+2"><?=$arr[product][company]?></td>
    </tr>
  </table>
  <br />
  

  
 

  <table width="100%" border="0" cellspacing="0" cellpadding="3">

    <tr>

      <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="3">

        <tr>

          <td width="150"><strong>Supplier : </strong></td>

          <td><input name="company" type="hidden" class="inputform" id="company" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="<?=$_GET[id]?>" />
            <b><?=$arr[product][company]?></td>
        </tr>
        <tr>
          <td><strong>Type : </strong></td>
          <td><span style="border-right:solid 0px #CCCCCC">
            <select name="type" id="type" onchange="Changesub(this.value);"  style="width: 380px; " >

              <?

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[category] = $db->select_query("SELECT * FROM ".TB_detail_doc_group."   ORDER BY sort ");

while ($arr[category] = $db->fetch($res[category])){

	   echo "<option value=\"".$arr[category][id]."\"";

	   if($arr[category][id] == $_GET[id]){echo " Selected";}

	   echo ">".$arr[category][category_name]."</option>";

}



?>
                            </select> <script type="text/javascript">
 
 function tour_over(){
 
		if(document.getElementById('type').value >4){
			document.getElementById('td_over').style.display = "";
			
		//	alert ("Your browser does not support AJAX!");
			
			
		}else{
 
		document.getElementById('td_over').style.display = "none";
		}
}
 
 var iCountDown=setInterval("tour_over()",1000);
</script>
          </span></td>
        </tr>
        <tr id="td_overs" style="display:nones">
          <td><strong>Name : </strong></td>
          <td><input name="name" type="text" id="name" value="<?=$arr[project][sub];?>" style="width: 380px; "/></td>
        </tr>

        <tr>

          <td><strong>Finish : </strong></td>

          <td><input name="finish" id="finish" style="width:120px; FONT-SIZE:13px; " value="<?=$arr[newsvc][ondate];?>" />
            <img src="images/admin/dateselect.gif" alt="ondate" border="0" align="absmiddle" onclick="return popUpCalendarSE(this, 'finish', 'yyyy-mm-dd', '','','',1);" />&nbsp;<span class="date-input">
            <label></label></td>
        </tr>
        <tr>
          <td><strong>File :</strong></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
            <tr>
              <td>1.&nbsp;
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="1" /></td>
            </tr>
            <tr>
              <td>2.&nbsp;
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="2" /></td>
            </tr>
            <tr>
              <td>3.&nbsp;
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="3" /></td>
            </tr>
            <tr>
              <td>4.&nbsp;
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="4" /></td>
            </tr>
            <tr>
              <td>5.&nbsp;
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="5" /></td>
            </tr>
            <tr>
              <td>6.&nbsp;
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="6" /></td>
            </tr>
            <tr>
              <td>7.&nbsp;
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="7" /></td>
            </tr>
            <tr>
              <td>8.&nbsp;
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="8" /></td>
            </tr>
            <tr>
              <td>9. &nbsp;
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="9" /></td>
            </tr>
            <tr>
              <td>10.
                <input name="filUpload[]" type="file" id="filUpload[]" />
                <input name="number[]" type="hidden" class="inputform" id="number[]" style="width:130px; FONT-SIZE:13px;  "  onclick="background-color:#000000" value="10" /></td>
            </tr>
          </table></td>
        </tr>

        <tr>

          <td>&nbsp;</td>

          <td><input name="submit" type="submit" class="myButton" id="submit" value=" Add Document" /></td>
        </tr>

      </table></td>

      </tr>

  </table>

 <script language="JavaScript" type="text/javascript">

function checktour() {
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

 if(document.myformtour.type.value < 6 && document.myformtour.finish.value=="" ) {
alert("please insert finish") 
document.myformtour.finish.focus() ;
return false ;
}

 



 
else if(document.myformtour.FILE.value=="") {
alert("please insert file") ;
document.myformtour.FILE.focus() ;
return false ;
}
 


}

 var iCountDown=setInterval("find_pick_tour()",2000); 
				
</script>

</FORM>



<?

	}else{

		//óҹ

		echo  $PermissionFalse ;

	}

}

else if($_GET[op] == "dailytour_edit" AND $_GET[action] == "edit"){

	//////////////////////////////////////////// ó Database Edit

	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){

		//֧

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

		$res[project] = $db->select_query("SELECT * FROM ".TB_detail_doc." WHERE id='".$_GET[id]."' ");

		$arr[project] = $db->fetch($res[project]);

		$db->closedb ();

		require("includes/class.resizepic.php");

		 

		if (!$_POST[Document] or !$_POST[name] or !$_POST[number]  ){

			echo "<script language='javascript'>" ;

			echo "alert('Please fill in the required information')" ;

			echo "</script>" ;

			echo "<script language='javascript'>javascript:history.back()</script>";

			exit();

		}

				//ӡ䢢ŧҵ

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

		$db->update_db(TB_detail_doc,array(

		"Document"=>"$_POST[Document]",
		"name"=>"$_POST[name]",
		"number"=>"$_POST[number]",
		"sub"=>"$_POST[sub]",
		"company"=>"$_POST[company]"

		)," id=$_GET[id] ");

		$db->closedb ();



		//ӡҧ text ͧ Project 

		$Filename = $arr[project][post_date].".txt";

		$txt_name = "data/projectdata/".$Filename."";

		$txt_open = @fopen("$txt_name", "w");

		@fwrite($txt_open, "".$_POST[DETAIL]."");

		@fclose($txt_open);



		$ProcessOutput .= "<BR><BR>";

		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";

		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Edit Document complete</B></FONT><BR><BR>";

		$ProcessOutput .= "<A HREF=\"?name=admin/detail&file=file_all\"><B>Back to Document</B></A>";

		$ProcessOutput .= "</CENTER>";

		$ProcessOutput .= "<BR><BR>";
		echo "<meta http-equiv=refresh content=1;URL=index.php?name=admin/detail&file=file_all>"; 

	}else{

		//óҹ

		$ProcessOutput = $PermissionFalse ;

	}

	echo $ProcessOutput ;

}

else if($_GET[op] == "dailytour_edit"){

	//////////////////////////////////////////// ó Form

	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){

		//֧

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

		$res[project] = $db->select_query("SELECT * FROM ".TB_detail_doc." WHERE id='".$_GET[id]."' ");

		$arr[project] = $db->fetch($res[project]);

		$db->closedb ();



		//ҹҨҡ Text 

		$FileprojectTopic = "data/projectdata/".$arr[project][post_date].".txt";

		$file_open = @fopen($FileprojectTopic, "r");

		$TextContent = @fread ($file_open, @filesize($FileprojectTopic));

		@fclose ($file_open);

		$TextContent = stripslashes($TextContent);

?>

<FORM NAME="myform" METHOD=POST ACTION="?name=admin/detail&file=file_all&op=dailytour_edit&action=edit&id=<?=$_GET[id];?>" enctype="multipart/form-data">&nbsp;</p>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr>

      <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td><strong>Company : </strong></td>
          <td><span style="border-right:solid 0px #CCCCCC">
            <select name="company" id="company" onchange="Changesub(this.value);"  style="width: 380px; background-color:<?

/////////////

if($arr[user][level] <5 ){

echo "#FFFFFF" ;

}?>" <?

/////////////

if($arr[user][level] <5 ){

 

}?>>
              <? if($adminlevel ==4){

		$ag="and id=$adminid" ;} ?>
              <? if($adminlevel ==1){

		$ag="and id=$agentcompany" ;} ?>
              <? if($adminlevel >4){

		$ag="" ;} ?>
              <?

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[category] = $db->select_query("SELECT * FROM ".TB_admin." where level=4 $ag ORDER BY id ");

while ($arr[category] = $db->fetch($res[category])){

	   echo "<option value=\"".$arr[category][id]."\"";

	   if($arr[category][id] == $_POST[agent]){echo " Selected";}

	   echo ">".$arr[category][company]."</option>";

}



?>
            </select>
          </span></td>
        </tr>

        <tr>
          <td><strong>Document Name </strong></td>
          <td><select name="Document"   id="Document" style="width: 380px; "  >
              <option value="<?=$arr[project][Document];?>" selected="selected"><?=$arr[project][Document];?></option>
              <option value="Bangkok Document" >Bangkok Document</option>
              <option value="Krungthai Document" >Krungthai Document</option>
              <option value="Siam Commercial Document" >Siam Commercial Document</option>
              <option value="Kasikorn Document" >Kasikorn Document</option>
              <option value="TMB Document" >TMB Document</option>
              <option value="Thanachart Document" >Thanachart Document</option>
              <option value="Document of Ayudhya" >Document of Ayudhya</option>
              <option value="Kiatnakin Document" >Kiatnakin Document</option>
              <option value="CIMB Thai" >CIMB Thai</option>
              <option value="Standard Chartered Document" >Standard Chartered Document</option>
              <option value="United Overseas Document" >United Overseas Document</option>
              <option value="Tisco Document" >Tisco Document</option>
              <option value="ICBC Document" >ICBC Document</option>
              </option>
          </select></td>
        </tr>
        <tr>
          <td><strong>Document Sub :</strong></td>
          <td><input name="name2" type="text" id="name2" value="<?=$arr[project][sub];?>" style="width: 380px; "/></td>
        </tr>
        <tr>
          <td><strong>Account Name </strong></td>
          <td><input name="name" type="text" id="name" value="<?=$arr[project][name];?>" style="width: 380px; "/></td>
        </tr>
        <tr>
          <td><strong>Document Number</strong></td>
          <td><input name="number" type="text" id="number" value="<?=$arr[project][number];?>" style="width: 380px; " /></td>
        </tr>


        <tr>

          <td width="150" bgcolor="#FFFFFF">&nbsp;</td>

          <td bgcolor="#FFFFFF"><input type="submit" class="myButton" value=" Edit Document" name="submit2" /></td>
        </tr>

      </table></td>

    </tr>

  </table>

  </FORM>



<?

	}else{

		//óҹ

		$ProcessOutput = $PermissionFalse ;

	}

	echo $ProcessOutput ;

}

else if($_GET[op] == "dailytour_del" AND $_GET[action] == "multidel"){

	//////////////////////////////////////////// óź Multi

	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){

		while(list($key, $value) = each ($_POST['list'])){

			$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

			$res[project] = $db->select_query("SELECT * FROM ".TB_project." WHERE id='".$value."' ");

			$arr[project] = $db->fetch($res[project]);

			$db->del(TB_detail_doc," id='".$value."' "); 

			$db->del(TB_dailytour," category='".$value."' "); 

			$db->closedb ();

		@unlink("pic/dailytouricon/icon/".$_GET[prefix]."_icon.jpg");

		@unlink("pic/dailytouricon/icon/".$_GET[prefix]."_icon2.jpg");

		@unlink("pic/dailytouricon/pic/".$_GET[prefix]."full.jpg");

		}

		$ProcessOutput .= "<BR><BR>";

		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";

		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Delete Document complete</B></FONT><BR><BR>";

		$ProcessOutput .= "<A HREF=\"?name=admin/detail&file=file_all\"><B>Back to Document </B></A>";

		$ProcessOutput .= "</CENTER>";

		$ProcessOutput .= "<BR><BR>";

	}else{

		//óҹ

		$ProcessOutput = $PermissionFalse ;

	}

	echo $ProcessOutput ;

}

else if($_GET[op] == "dailytour_del"){

	//////////////////////////////////////////// óź Form

	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

		$db->del(TB_detail_doc," id='".$_GET[id]."' "); 
		
		$db->del(TB_detail_doc_list," invoice='".$_GET[id]."' ");


	$res[type] = $db->select_query("SELECT * FROM ".TB_detail_doc_group." WHERE id='".$_GET[id]."' ");

	$arr[type] = $db->fetch($res[type]);
	

	removeDir("".$_GET[prefix]."");
 
 

$db->closedb ();


		$ProcessOutput .= "<BR><BR>";

		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";

		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Delete Document complete</B></FONT><BR><BR>";

			echo "<meta http-equiv=refresh content=1;URL=index.php?name=admin/detail&file=file_all&op=account_add&id=$_GET[com]>"; 	

		$ProcessOutput .= "</CENTER>";

		$ProcessOutput .= "<BR><BR>";

	}else{

		//óҹ

		$ProcessOutput = $PermissionFalse ;

	}

	echo $ProcessOutput ;

}

if($_GET[op] == "pic_view"){
	//////////////////////////////////////////// óź Multi

		
		
		include("admin/admin/detail/file_list_view.php") ;

 
		//echo "<meta http-equiv=refresh content=0;URL=index.php?name=admin/detail&file=file_all>";
	}
	
	
	
	
	else if($_GET[op] == "list_del"){

	//////////////////////////////////////////// óź Form

	if(1==1){

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

		//$db->del(TB_detail_doc," id='".$_GET[id]."' "); 
		
		$db->del(TB_detail_doc_list," id='".$_GET[id]."' ");
 
 

$db->closedb ();


		$ProcessOutput .= "<BR><BR>";

		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";

		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Delete Document complete</B></FONT><BR><BR>";

			echo "<meta http-equiv=refresh content=0;URL=?name=admin/detail&file=file_all&op=pic_view&id=$_GET[com]>"; 	

		$ProcessOutput .= "</CENTER>";

		$ProcessOutput .= "<BR><BR>";

	}else{

		//óҹ

		$ProcessOutput = $PermissionFalse ;

	}

	echo $ProcessOutput ;

}




else if($_GET[op] == "newpic_add" AND $_GET[action] == "add"){

	//////////////////////////////////////////// ó Database

	if(1==1){


	$res[type] = $db->select_query("SELECT * FROM ".TB_detail_doc_group." WHERE id='".$_POST[type]."' ");

	$arr[type] = $db->fetch($res[type]);
	
	
	$res[filename] = $db->select_query("SELECT * FROM ".TB_detail_doc." WHERE id='".$_GET[id]."' ");

	$arr[filename] = $db->fetch($res[filename]);
	
	
$typename=$arr[filename][name];

$docname=$arr[type][category_name];

 
 


 $fileall = $db->num_rows(TB_detail_doc_list,"id"," invoice='".$_GET[id]."' and type='".$_POST[type]."' and company='".$_POST[company]."' ");

echo $fileall=$fileall+1;




	for($i=0;$i<count($_FILES["filUpload"]["name"]);$i++)
	{
		if($_FILES["filUpload"]["name"][$i] != "")
		{
		
		$sur = strrchr($_FILES["filUpload"]["name"][$i], "."); //ตัดนามสกุลไฟล์เก็บไว้
		
		$fileall=$fileall+$i;
		
		//echo $i;
		 	
			
				//*** Insert Record ***//
				$topic=$_FILES["filUpload"]["name"][$i];
				
				$rand = substr(str_shuffle('123456789'),0,30);
				$newfilename =( $typename._.$fileall.$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
				//////////
				//@copy ("pic/galleryicon/".$_FILES["filUpload"]["name"][$i] , "pic/galleryicon/$rand.jpg" );

 
	



	@copy($_FILES["filUpload"]["tmp_name"][$i],"admin/admin/detail/file/".$_POST[company]."/".$_POST[folder]."/".$newfilename); //แล้วค่อยเก็บลงไฟล์





		//ӡŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_detail_doc_list,array(
		"invoice"=>"$_POST[invoice]",
		"name"=>"$newfilename",
		"start"=>"$_POST[start]",
		"finish"=>"$_POST[finish]",
		"post_date"=>"".TIMESTAMP."",
		"update_date"=>"".TIMESTAMP."",
		"posted"=>"$_SESSION[admin_user]",
		"type"=>"$_POST[type]",
		
		"pictype"=>"$sur",
 
		
		"company"=>"$_POST[company]"
		));
		$db->closedb ();

				}
 
	}

			

//	@copy ($FILE['tmp_name'] , "admin/admin/detail/file/".$_GET[id]."/".TIMESTAMP.".jpg" );
	
	
 



////////////////

	 






		///////////////
		
		
		
		
		
		////////////////





		$ProcessOutput .= "<BR><BR>";

		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";

		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Add Document complete</B></FONT><BR><BR>";

		$ProcessOutput .= "<A HREF=\"?name=admin/detail&file=file_all\"><B>Back to Document </B></A>";
		

		$ProcessOutput .= "</CENTER>";
		
	echo "<meta http-equiv=refresh content=0;URL=?name=admin/detail&file=file_all&op=pic_view&id=$_GET[id]>"; 	
		

		$ProcessOutput .= "<BR><BR>";

	}else{

		//óҹ

		$ProcessOutput = $PermissionFalse ;

	}

	echo $ProcessOutput ;

}






	
	
?>

 









</TD>

				</TR>

			</TABLE>

			

		  <!-- Admin -->		  </TD>

        </TR>

      </TBODY>

</TABLE>

