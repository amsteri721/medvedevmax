<?php require 'header.php'; ?>
	
	<form action="?act=save-entry" method="post">
		<p>Title</p>
		<input type="text" name="header" required>
		<p>Content</p>
		<textarea name="content" id="" cols="30" rows="10" required></textarea>
		<p><input type="submit" value="ADD"></p>
	</form>

<?php require 'footer.php'; ?>