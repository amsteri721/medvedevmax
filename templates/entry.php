<?php require 'header.php'; ?>
	<h3><a href="?act=view-entry&id=<?=$entry['id'];?>"><?=$entry['header'];?></a></h3>
		<p><?=$entry['content'];?></p>
		<p><?=$entry['date'];?></p>
		<?php if($_SESSION['login']=='admin') {?>
			<li><a href="?act=edit-entry&id=<?=$entry['id'];?>">Edit entry</a></li>
			<li><a href="?act=del-entry&id=<?=$entry['id'];?>">Delete entry</a></li>
		<?php } ?> 


<?php require 'footer.php'; ?>