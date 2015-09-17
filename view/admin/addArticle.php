<?php
require_once('header.php');
?>
<form method="post" action="admin.php?a=Admin&m=addArticleDeal">
<table border="0" width="100%">
	<tr>
		<td width="18%" align="right">文章标题:</td>
		<td><input type="text" name="title" value="" /></td>
	</tr>

	<tr>
		<td width="18%" align="right">文章描述:</td>
		<td><input type="text" name="description" value="" /></td>
	</tr>

	<tr>
		<td width="18%" align="right">文章分类:</td>
		<td>
		<select name="cate">
			<?php
			foreach($cate as $k=>$v)
			{
			?>
			<option value="<?php echo $v['id']; ?>"><?php echo $v['cate']; ?></option>
			<?php } ?>
		</select>
		</td>
	</tr>

	<tr>
		<td width="18%" align="right">文章内容:</td>
		<td><textarea name="content" rows="5" cols="60"></textarea></td>
	</tr>

	<tr>
		<td cols="2">
		<input type="reset" name="reset" value="重置" />&nbsp;&nbsp;
		<input type="submit" value="提交" name="submit" />		
		</td>
		
	</tr>
</table>
</form>
</body>
</html>