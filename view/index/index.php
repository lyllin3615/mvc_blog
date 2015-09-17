<?php
require_once('header.php');
?>
<div class="bodyContainer">
<?php
if($list){
?>

	<?php foreach($list as $k=>$v) { ?>
		<div class="contentDiv">
		<h1><a href="index.php?a=Index&m=artile&id=<?php echo $v['id']; ?>">
							<?php echo $v['title']; ?></a></h1>
		<p class="cateName">分类名称：<?php echo $cate[$v['cate']]; ?>&nbsp;&nbsp;
		发表时间：<?php echo date('Y-m-d H:i:s', $v['time']); ?></p>
		<p>
		相关描述：<?php echo $v['description']; ?>
		</p>
		</div>
	
	<?php } ?>

<?php } ?>
</div>