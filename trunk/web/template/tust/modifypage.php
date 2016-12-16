<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title?></title>
	<link rel=stylesheet href='./template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>
	<link rel=stylesheet href='bootstrap/css/bootstrap.css' type='text/css'>
	<script language="javascript" type="text/javascript" src="include/jquery-latest.js"></script>
	<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
	<script language="javascript" type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div id="wrapper">
	<?php require_once("oj-header.php");?>
<div id=main>
	<form action="modify.php" method="post">
	<br><br>
	<center><table>
		<tr><td colspan=2 height=40 width=500>&nbsp;&nbsp;&nbsp;Update Information</tr>
		<tr><td width=25%>User ID:
			<td width=75%><?php echo $_SESSION['user_id']?>
			<?php require_once('./include/set_post_key.php');?>
		</tr>
		<tr><td>Nick Name:
			<td><input name="nick" size=50 type=text value="<?php echo htmlentities($row->nick,ENT_QUOTES,"UTF-8")?>" >
		</tr>
		<tr><td>Old Password:
			<td><input name="opassword" size=20 type=password>
		</tr>
		<tr><td>New Password:
			<td><input name="npassword" size=20 type=password>
		</tr>
		<tr><td>Repeat New Password::
			<td><input name="rptpassword" size=20 type=password>
		</tr>
		<tr><td>School:
			<td><input name="school" size=30 type=text value="<?php echo htmlentities($row->school,ENT_QUOTES,"UTF-8")?>" >
		</tr>
		<tr><td>Email:
			<td><input name="email" size=30 type=text value="<?php echo htmlentities($row->email,ENT_QUOTES,"UTF-8")?>" >
		</tr>
		<tr><td>
			<td><input value="Submit" name="submit" type="submit">
				&nbsp; &nbsp;
				<input value="Reset" name="reset" type="reset">
		</tr>
	</table></center>
	<br>
	<a href=export_ac_code.php>Download All AC Source</a>
	<br>
<div id=foot>

</div><!--end foot-->
</div><!--end main-->
</div><!--end wrapper-->
<?php require_once("oj-footer.php");?>
</body>
</html>
