<?php require 'header.php'; ?>

<?php foreach ($entry as $row) { ?>
	<form action="?act=save-edit-entry" method="post">
		<input type="hidden" value="<?=$row['id']?>" name="id">
		<p>Title</p>
		<input type="text" name="header" value="<?=$row['header']?>">
		<p>Content</p>
		<textarea name="content" cols="30" rows="10"><?=$row['content']?></textarea>
		<p><input type="submit"></p>
	</form>
<?php } ?>	


<?php require 'footer.php'; ?>