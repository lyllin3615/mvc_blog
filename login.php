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
<meta name="keywords" content="seo keyword" />
<meta name="description" content="description" />

</head>
<body>
<form action="./auth.php" method="post">
用户名：<input  type="text" name="user" value="" /><br />
密码:<input type="password" name="password" value="" /><br />
<input type="reset" name="reset" value="重置" />&nbsp;&nbsp; 
<input type="submit" name="submit" value="提交" />
</form>
</body>
</html>
