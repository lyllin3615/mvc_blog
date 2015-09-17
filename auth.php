<?php
session_start(); 
define('ROOT', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once(ROOT . 'common/config.php');
require_once(ROOT . 'common/function.php');
if(!isset($_POST) || empty($_POST))
{
	header('location:./login.php');
}
if(!isset($_POST['submit']) || empty($_POST['submit']) || empty($_POST['user']) || empty($_POST['password']))
{
	header('location:./login.php');
}

$name = addslashes(trim($_POST['user']));
$pass = md5(addslashes(trim($_POST['password'])));
$model = new Model();
$sql = "select * from sz_admin where name = '".$name."' and password = '".$pass."'";
$res = $model->query($sql);

if($res)
{
	
	$_SESSION['admin'] = $res[0]['id'];
	$_SESSION['name'] = $res[0]['name'];
	header('location:./admin.php');
}else
{
	header('location:./login.php');
}
