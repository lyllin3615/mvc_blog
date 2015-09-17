<?php
class Model
{
	public static $conn = null;
	function __construct()
	{
		if(is_null(self::$conn))
		{
			$link = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
			if(mysqli_connect_errno())
			{
				die('error: ' . mysqli_connect_error());
			}
			$link->query("set names " . DB_CHARSET);
			self::$conn = $link;
		}
		return self::$conn;
	}

	// 增加内容
	function add($sql)
	{
			self::$conn->query($sql);
			return self::$conn->insert_id;
	}

	// 删除
	function del($sql)
	{
			self::$conn->query($sql);
			return self::$conn->affected_rows;
	}

	// 修改
	function update($sql)
	{
		self::$conn->query($sql);
		return self::$conn->affected_rows;
	}
	
	// 查找
	function query($sql)
	{
		$arr = array();
		$res = self::$conn->query($sql);
		if(!$res)
		{
			return 0;
		}
		
		while($row = $res->fetch_assoc())
		{
			$arr[] = $row;
		}
		return $arr;
	}
	// 析构函数
	function __destruct()
	{
		self::$conn->close();
	}
}