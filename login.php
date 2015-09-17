<?php
session_start();
if(isset($_SESSION['admin']) && !empty($_SESSION['admin']))
{
		header('./admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆界面</title>
<link rel="stylesheet" type="text/css" href="./adminCss/css.css" media="screen">


</head>
<body class="bodyContainer">
<form action="./auth.php" method="post">
<table width="100%" border="0">
	<tr>
		<td width="18%" align="right">用户名</td>
		<td><input  type="text" name="user" value="" /></td>
	</tr>

	<tr>
		<td width="18%" align="right">密码</td>
		<td><input type="password" name="password" value="" /></td>
	</tr>

	<tr>
		<td width="18%" align="right">
		&nbsp;
		</td>
		<td>
		<input type="reset" name="reset" value="重置" />&nbsp;&nbsp;
		<input type="submit" name="submit" value="提交" />
		</td>
	</tr>
</table>
</form>
</body>
</html>
