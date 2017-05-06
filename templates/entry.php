<?php require 'header.php'; ?>
	<h3><a href="?act=view-entry&id=<?=$entry['id'];?>"><?=$entry['header'];?></a></h3>
		<p><?=$entry['content'];?></p>
		<p><?=$entry['date'];?></p>
		<?php if($_SESSION['login']=='admin') {?>
			<li><a href="?act=edit-entry&id=<?=$entry['id'];?>">Edit entry</a></li>
			<li><a href="?act=del-entry&id=<?=$entry['id'];?>">Delete entry</a></li>
		<?php } ?> 

<?php 
	if (isset($_SESSION['login'])) {
?>
	<form action="?act=add-com" method="post">
		<h3>Add comment</h3>
		<input type="hidden" name="id" value="<?=$entry['id']?>">
		<textarea name="comment" id="" cols="30" rows="10"></textarea>
		<p><input type="submit" value="ADD"></p>
	</form>
<?php
	} else {
?>
	To add a comment you need to <a href="?act=reg">register</a>
<?php
	}
?>
	
	<h3>Comments</h3>	
	<?php foreach ($comments as $row) { ?>
		<h3><?php echo $row['author']; ?></h3>
		<p><?php echo $row['content']; ?></p>
		<p><?php echo $row['date']; ?></p>
	<?php } ?>
<?php require 'footer.php'; ?>