<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <title>管理员后台</title>
	<link rel="stylesheet" type="text/css" href="./adminCss/css.css" media="screen">
</head>
<body class="bodyContainer">
欢迎光临：<?php echo $_SESSION['name']; ?>&nbsp;&nbsp;
<a href="./admin.php?a=Admin&m=addArticle">增加文章</a>&nbsp;&nbsp;
<a href="./admin.php?a=Admin&m=articleList">文章列表</a>&nbsp;&nbsp;
<a href="./admin.php?a=Admin&m=addArticleCate">增加分类</a>&nbsp;&nbsp;
<a href="./admin.php?a=Admin&m=commentList">评论列表</a>&nbsp;&nbsp;
<a href="./logout.php">退出</a><br />
<hr />
<br />