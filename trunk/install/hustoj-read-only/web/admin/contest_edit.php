<?php require("admin-header.php");
include_once("kindeditor.php") ;
include_once("../include/const.inc.php");
if (isset($_POST['syear']))
{
	require_once("../include/check_post_key.php");
	
	$starttime=intval($_POST['syear'])."-".intval($_POST['smonth'])."-".intval($_POST['sday'])." ".intval($_POST['shour']).":".intval($_POST['sminute']).":00";
	$endtime=intval($_POST['eyear'])."-".intval($_POST['emonth'])."-".intval($_POST['eday'])." ".intval($_POST['ehour']).":".intval($_POST['eminute']).":00";
//	echo $starttime;
//	echo $endtime;
	 
        $title=mysqli_real_escape_string($mysqli,$_POST['title']);
        $password=mysqli_real_escape_string($mysqli,$_POST['password']);
        $description=mysqli_real_escape_string($mysqli,$_POST['description']);
        $private=mysqli_real_escape_string($mysqli,$_POST['private']);
        if (get_magic_quotes_gpc ()) {
      		  $title = stripslashes ( $title);
	          $password = stripslashes ( $password);
        //$description = stripslashes ( $description);
        }

   $lang=$_POST['lang'];
   $langmask=0;
   foreach($lang as $t){
			$langmask+=1<<$t;
	} 
	$langmask=((1<<count($language_ext))-1)&(~$langmask);
	echo $langmask;	

	$cid=intval($_POST['cid']);
	if(!(isset($_SESSION["m$cid"])||isset($_SESSION['administrator']))) exit();
	$sql="UPDATE `contest` set `title`='$title',description='$description',`start_time`='$starttime',`end_time`='$endtime',`private`='$private',`langmask`=$langmask  ,password='$password' WHERE `contest_id`=$cid";
	//echo $sql;
	mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
	$sql="DELETE FROM `contest_problem` WHERE `contest_id`=$cid";
	mysqli_query($mysqli,$sql);
	$plist=trim($_POST['cproblem']);
	$pieces = explode(',', $plist);
	if (count($pieces)>0 && strlen($pieces[0])>0){
		$sql_1="INSERT INTO `contest_problem`(`contest_id`,`problem_id`,`num`) 
			VALUES ('$cid','$pieces[0]',0)";
		for ($i=1;$i<count($pieces);$i++)
			$sql_1=$sql_1.",('$cid','$pieces[$i]',$i)";
		mysqli_query($mysqli,"update solution set num=-1 where contest_id=$cid");
		for ($i=0;$i<count($pieces);$i++){
			$sql_2="update solution set num='$i' where contest_id='$cid' and problem_id='$pieces[$i]';";
			mysqli_query($mysqli,$sql_2);
		}
		//echo $sql_1;
		
		mysqli_query($mysqli,$sql_1) or die(mysqli_error($mysqli));
		$sql="update `problem` set defunct='N' where `problem_id` in ($plist)";
		mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
	
	}
	
	$sql="DELETE FROM `privilege` WHERE `rightstr`='c$cid'";
	mysqli_query($mysqli,$sql);
	$pieces = explode("\n", trim($_POST['ulist']));
	if (count($pieces)>0 && strlen($pieces[0])>0){
		$sql_1="INSERT INTO `privilege`(`user_id`,`rightstr`) 
			VALUES ('".trim($pieces[0])."','c$cid')";
		for ($i=1;$i<count($pieces);$i++)
			$sql_1=$sql_1.",('".trim($pieces[$i])."','c$cid')";
		//echo $sql_1;
		mysqli_query($mysqli,$sql_1) or die(mysqli_error($mysqli));
	}
	
	echo "<script>window.location.href=\"contest_list.php\";</script>";
	exit();
}else{
	$cid=intval($_GET['cid']);
	$sql="SELECT * FROM `contest` WHERE `contest_id`=$cid";
	$result=mysqli_query($mysqli,$sql);
	if (mysqli_num_rows($result)!=1){
		mysqli_free_result($result);
		echo "No such Contest!";
		exit(0);
	}
	$row=mysqli_fetch_assoc($result);
	$starttime=$row['start_time'];
	$endtime=$row['end_time'];
	$private=$row['private'];
	$password=$row['password'];
	$langmask=$row['langmask'];
	$description=$row['description'];
	$title=htmlentities($row['title'],ENT_QUOTES,"UTF-8");
	mysqli_free_result($result);
	$plist="";
	$sql="SELECT `problem_id` FROM `contest_problem` WHERE `contest_id`=$cid ORDER BY `num`";
	$result=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
	for ($i=mysqli_num_rows($result);$i>0;$i--){
		$row=mysqli_fetch_row($result);
		$plist=$plist.$row[0];
		if ($i>1) $plist=$plist.',';
	}
	$ulist="";
	$sql="SELECT `user_id` FROM `privilege` WHERE `rightstr`='c$cid' order by user_id";
	$result=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
	for ($i=mysqli_num_rows($result);$i>0;$i--){
		$row=mysqli_fetch_row($result);
		$ulist=$ulist.$row[0];
		if ($i>1) $ulist=$ulist."\n";
	}
	
	
}
?>

<form method=POST >
<?php require_once("../include/set_post_key.php");?>
<p align=center><font size=4 color=#333399>Edit a Contest</font></p>
<input type=hidden name='cid' value=<?php echo $cid?>>
<p align=left>Title:<input class=input-xxlarge type=text name=title size=71 value='<?php echo $title?>'></p>
<p align=left>Start Time:<br>&nbsp;&nbsp;&nbsp;
Year:<input class=input-mini  type=text name=syear value=<?php echo substr($starttime,0,4)?> size=4 >
Month:<input class=input-mini  type=text name=smonth value='<?php echo substr($starttime,5,2)?>' size=2 >
Day:<input class=input-mini  type=text name=sday size=2 value='<?php echo substr($starttime,8,2)?>'>
Hour:<input class=input-mini  type=text name=shour size=2 value='<?php echo substr($starttime,11,2)?>'>
Minute:<input class=input-mini  type=text name=sminute size=2 value=<?php echo substr($starttime,14,2)?>></p>
<p align=left>End Time:<br>&nbsp;&nbsp;&nbsp;

Year:<input class=input-mini  type=text name=eyear value=<?php echo substr($endtime,0,4)?> size=4 >
Month:<input class=input-mini  type=text name=emonth value=<?php echo substr($endtime,5,2)?> size=2 >
Day:<input class=input-mini  type=text name=eday size=2 value=<?php echo substr($endtime,8,2)?>>
Hour:<input class=input-mini  type=text name=ehour size=2 value=<?php echo substr($endtime,11,2)?>> 
Minute:<input class=input-mini  type=text name=eminute size=2 value=<?php echo substr($endtime,14,2)?>></p>

Public/Private:<select name=private>
	<option value=0 <?php echo $private=='0'?'selected=selected':''?>>Public</option>
	<option value=1 <?php echo $private=='1'?'selected=selected':''?>>Private</option>
</select>
Password:<input type=text name=password value="<?php echo htmlentities($password,ENT_QUOTES,'utf-8')?>">
<br>Problems:<input class=input-xxlarge type=text size=60 name=cproblem value='<?php echo $plist?>'>

 Language:<select name="lang[]"  multiple="multiple"    style="height:220px">
<?php
$lang_count=count($language_ext);


  $lang=(~((int)$langmask))&((1<<$lang_count)-1);
if(isset($_COOKIE['lastlang'])) $lastlang=$_COOKIE['lastlang'];
 else $lastlang=0;
 for($i=0;$i<$lang_count;$i++){
               
                 echo  "<option value=$i ".( $lang&(1<<$i)?"selected":"").">
                        ".$language_name[$i]."
                 </option>";
  }

?>
	
   </select>
	

<br>
<p align=left>Description:<br><textarea class="kindeditor" rows=13 name=description cols=80><?php echo htmlentities($description,ENT_QUOTES,"UTF-8")?></textarea>


Users:<textarea name="ulist" rows="20" cols="20"><?php if (isset($ulist)) { echo $ulist; } ?></textarea>
<p><input type=submit value=Submit name=submit><input type=reset value=Reset name=reset></p>

</form>
<?php require_once("../oj-footer.php");?>
