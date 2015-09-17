<?php
require_once('header.php');
?>

<?php
if($article){
?>
<form action="admin.php?a=Admin&m=modArticleDeal" method="post">
<input type="hidden" name="id" value="<?php echo $article['id']; ?>" />
文章标题:<input type="text" name="title" value="<?php echo $article['title']; ?>" /><br />
文章描述：<input type="text" name="description" value="<?php echo $article['description']; ?>" /><br />
文章内容：<textarea name="content" cols="50" rows="5"><?php echo $article['content']; ?></textarea><br />
<input type="submit" name="submit" value="提交" />
</form>
<?php }else{ ?>
暂时没有你要的内容
<?php } ?>
</body>
</html>