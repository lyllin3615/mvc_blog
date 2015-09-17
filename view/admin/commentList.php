<?php
require_once('header.php');
?>

<?php if($comment) { ?>

<?php foreach($comment as $k=>$v) { ?>
<div class="commentDiv">
<p>用户名:<?php echo $v['user_name']; ?>&nbsp;&nbsp;
评论时间：<?php echo date('Y-m-d H:i:s', $v['comment_time']);?>&nbsp;&nbsp;
<a href="admin.php?a=Admin&m=delComment&id=<?php echo $v['id'];?>">删除该评论</a>
</p>
<div class="adminCommentDiv">
评论内容：
<?php
echo $v['comment'];
?>
</div>
</div>
<?php } ?>

<?php } ?>

</body>
</html>