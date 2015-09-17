<?php
class Index
{
	public static $model = null;

	public function __construct()
	{
		if(is_null(self::$model))
		{
			self::$model = new Model();
		}

	}

	/**
	 * 首页展示
	 */
	function index()
	{
		$view = array();
		$cate = array();
		// 分类名称
		$sql = "select * from sz_cate";
		$res = self::$model->query($sql);
		if($res)
		{
			foreach($res as $k => $v)
			{
				$cate[$v['id']] = $v['cate'];
			}
			$view['cate'] = $cate;
		}
		
		//文章列表
		$query = "select * from sz_article order by id desc";
		$resArticle = self::$model->query($query);
		$view['list'] = $resArticle;
		$this->display('index', $view);
	}
	/**
	 * 文章详情
	 */
	function artile()
	{
		// 文章内容
		$id = intval($_GET['id']);
		$sql = "select * from sz_article where id = " . $id;
		$resArticle = self::$model->query($sql);
		$view['artile'] = $resArticle[0];

		// 文章分类信息
		$query = "select * from sz_cate where id = " .$resArticle[0]['cate'];
		$resCate = self::$model->query($query);
		$view['cate'] = $resCate[0];

		// 文章相关评论数
		$commentCount = "select * from sz_comment where article_id = " . $resArticle[0]['id'] . " order by id desc";
	
		$count = self::$model->query($commentCount);
		$view['count'] = $count;
		$this->display('artile', $view);
	}


	/**
	 *	发表评论
	 */
	function addComment()
	{	
		header("Content-type:text/html;charset=utf-8");
		if(isset($_POST) && ($_POST))
		{
			$id = intval($_POST['id']);
			$comment = addslashes($_POST['comment']);
			$user = addslashes($_POST['user']);
			$comment_time = time();
			$sql = "insert into sz_comment (comment,comment_time,user_name, article_id) values 
							('".$comment."', '".$comment_time."', '". $user . "',
							'".$id."')";
			
			self::$model->add($sql); 
			header("Location:index.php?a=Index&m=artile&id=" . $id);
		}else
		{
			header("Location:index.php");
		}
	}
	/**
	 * 展示模板
	 */
	private function display($template = null, $arr = array())
	{
		if($arr)
		{
			extract($arr);
		}
		if(!($template))
		{
				$template = __CLASS__;
		}
		require_once(ROOT . 'view/index/' .$template . '.php');
	}




}