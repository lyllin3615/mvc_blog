<?php
class Admin
{
	public static $model = null;

	public function __construct()
	{
		if(is_null(self::$model))
		{
			self::$model = new Model();
		}
		if(!isset($_SESSION['admin']) || empty($_SESSION['admin']))
		{
				header('location:login.php');
		}
		
	}

	/**
	 *文章列表
	 */
	function articleList()
	{
		//文章列表
		$query = "select * from sz_article order by id desc";
		$resArticle = self::$model->query($query);
		
		// 分类列表
		$sql = "select * from sz_cate";
		$res = self::$model->query($sql);
		$cateArr = array();
		if($res)
		{
			foreach($res as $v)
			{
				$cateArr[$v['id']] = $v['cate'];
			}
		}
		$view['cate'] = $cateArr;

		$view['article'] = $resArticle;
		$this->display('articleList', $view);
	}

	/**
	 * 删除文章
	 */
	function delArticle()
	{
		$id = intval($_GET['id']);
		$sql = "delete from sz_article where id = " . $id;
		$resArticle = self::$model->del($sql);
		header('location:admin.php?a=Admin');
	}

	
	function index()
	{
		$view = array();
		// 分类名称
		$sql = "select * from sz_cate";
		$res = self::$model->query($sql);
		$view['cate'] = $res;

		//文章列表
		$query = "select id,title,description from sz_article order by id desc";
		$resArticle = self::$model->query($query);
		$view['cate'] = $resArticle;
		$this->display('index', $view);
	}

	/**
	 * 增加文章
	 */
	function addArticle()
	{
		$sql = "select * from sz_cate";
		$res = self::$model->query($sql);	
		$view = array();
		$view['cate'] = $res;
		$this->display('addArticle',$view);
	}

	/**
	 * 增加文章处理
	 */
	function addArticleDeal()
	{
		if(!isset($_POST) || empty($_POST['submit']))
		{	
				header('location:admin.php?a=Admin&m=addArticle');
		}
		$title = addslashes($_POST['title']);
		$description = addslashes($_POST['description']);
		$cate = addslashes($_POST['cate']);
		$content = addslashes($_POST['content']);
		$time = time();
		$sql = "insert into sz_article(title,description,cate,content,time) values 
						('".$title."', '".$description."', '".$cate."', '".$content."', '".$time."')";
		$res = self::$model->add($sql);
		header('location:admin.php?a=Admin&m=addArticle');
	}

	/**
	 * 修改文章
	 */
	function modArticle()
	{
		$view = array();
		$id = intval($_GET['id']);
		$sql = "select * from sz_article where id = " . $id;
		$resArticle = self::$model->query($sql);
		$view['article'] = $resArticle[0];
		$this->display('modArticle', $view);
	}

	/**
	 * 修改文章处理
	 */
	function modArticleDeal()
	{
		$id = intval($_POST['id']);
		$title = addslashes($_POST['title']);
		$description = addslashes($_POST['description']);
		$content = addslashes($_POST['content']);
		$sql = "update  sz_article set title = '" . $title . "',
																description = '". $description ."',
																content = '" . $content . "'
																where id =" . $id;

		self::$model->update($sql);
		header('location:admin.php?a=Admin&m=articleList');
	}

	/**
	 * 增加文章分类
	 */
	function addArticleCate()
	{
		$this->display('addArticleCate');
	}

	

	/**
	 * 增加文章分类处理
	 */
	function addArticleCateDeal()
	{	
		if(!isset($_POST['submit']) || !isset($_POST['cate'])  || empty($_POST['submit']) || empty($_POST['cate']))
		{
			header('location:admin.php?a=Admin&m=addArticleCate');
		}
		$cate = addslashes(trim($_POST['cate']));
		$sql = "insert into sz_cate(cate) values ('".$cate."')";
		self::$model->add($sql);
		header('location:admin.php?a=Admin&m=addArticleCate');
	}

	/**
	 * 文章评论列表
	 */
	function commentList()
	{
		$view = array();
		// 评论列表
		$sql = "select * from sz_comment order by id desc";
		$comments = self::$model->query($sql);
		

		// 用户名
		if(!empty($comments))
		{
			$view['comment'] = $comments;
		}
	
		$this->display('commentList',$view);
	}

	/**
	 * 删除评论
	 */
	function delComment()
	{
		$id = intval($_GET['id']);
		$sql = "delete from sz_comment where id = " . $id;
		self::$model->del($sql);
		header('location:admin.php?a=Admin&m=commentList');
	}

	/**
	 * 展示模板文件
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
		require_once(ROOT . 'view/admin/' .$template . '.php');
	}




}