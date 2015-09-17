<?php
function __autoload($class)
{
	if(file_exists(ROOT.'model/'.ucfirst($class).'.class.php'))
	{
		require_once(ROOT.'model/'.ucfirst($class).'.class.php');
	}

	if(file_exists(ROOT.'controller/'.ucfirst($class).'Controller.class.php'))
	{
		require_once(ROOT.'controller/'.ucfirst($class).'Controller.class.php');
	}

	if(file_exists(ROOT.'view/'.ucfirst($class).'.class.php'))
	{
		require_once(ROOT.'view/'.ucfirst($class).'.class.php');
	}
}
