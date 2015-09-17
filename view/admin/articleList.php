<?php
require_once('header.php');
?>
<div class="articleList">
<?php
if(isset($article) && !empty($article)){
	foreach($article as $k=>$vv){
?>
<div class="articleDetails">
	<h1><a href="index.php?a=index&m=artile&id=<?php echo $vv['id'];?>"><?php echo $vv['title']; ?></a></h1>
	<p class="adminCate">分类：<?php echo $cate[$vv['cate']]; ?>&nbsp;&nbsp;
	<a href="admin.php?a=Admin&m=delArticle&id=<?php echo $vv['id']; ?>">删除该文章</a>&nbsp;&nbsp;
	<a href="admin.php?a=Admin&m=modArticle&id=<?php echo $vv['id']; ?>">修改该文章</a>
	</p>
	<div class="descriptionDiv"><?php echo $vv['description']; ?></div>
</div>

<?php } } ?>
</div>
</body>
</html>