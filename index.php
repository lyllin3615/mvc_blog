<?php
session_start();
define('ROOT', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once(ROOT . 'common/config.php');
require_once(ROOT . 'common/function.php');
$arr = $_REQUEST;

$action = 'index';
$method = 'index';
if($arr)
{
	extract($arr);
}
if(isset($a) && !empty($a))
{
	$action = $a;
	unset($arr[$a]);
}

if(isset($m) && !empty($m))
{
	$method = $m;
	unset($arr[$m]);
}

$obj = new $action();
$obj->$method($arr);
