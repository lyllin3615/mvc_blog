<?php
require_once(ROOT .'view/index/header.php');
?>
<div class="bodyContainer">
<h1><?php echo $artile['title']; ?></h1>
<p  class="cateName">分类：<?php echo $cate['cate'] ; ?>&nbsp;&nbsp;
发表时间：<?php echo date('Y-m-d H:i:s', $artile['time']); ?></p>
<div class="contentDetails">
<?php  echo $artile['content']; ?>

</div>
<p class="indexDivSpan"><a href="index.php">返回首页</a></p>
<div class="commentDiv">
<h3>发表评论:</h3>
<form method="post" action="index.php?a=Index&m=addComment">
<input type="hidden" name="id" value="<?php echo $artile['id'];  ?>" />
<table border="0" width="100%">
<tr>
	<td width="18%" align="right">用户名：</td>
	<td><input type="text" name="user" value="" /></td>
</tr>

<tr>
	<td width="18%" align="right">发表内容：</td>
	<td>
		<textarea name="comment" rows="5" cols="50"></textarea>
	</td>
</tr>

<tr>
	<td cols="2"><input type="reset" value="重置" name="reset" />&nbsp;&nbsp;
<input type="submit" value="提交" name="submit" /></td>
</tr>

</table>
</form>
<div class="commentList">
<h4>评论列表：</h4>
<?php
if($count){
	foreach($count as $vv)
	{
?>
<hr />
<div class="commentBox">

<p>评论作者:<?php echo $vv['user_name'] ; ?>&nbsp;&nbsp;
	评论时间：<?php echo date('Y-m-d H:i:s', $vv['comment_time']); ?></p>

<p>评论内容:<?php echo $vv['comment'] ; ?></p>
</div>

<?php } } ?>
</div>
</div>
</div>
<?php require_once('footer.php'); ?>