<?php require 'header.php'; ?>
	
<h1>Entries in my blog</h1>

	<?php 	foreach ($entry as $row) { ?>	
		<h3><a href="?act=view-entry&id=<?=$row['id'];?>"><?=$row['header'];?></a></h3>
		<p><?=$row['content'];?></p>
		<p><?=$row['date'];?></p>
		<?=$row['comments'];?> <a href="?act=view-entry&id=<?=$row['id'];?>">comments</a>		

		<?php if($_SESSION['login']=='admin') {?>
			<li><a href="?act=edit-entry&id=<?=$row['id'];?>">Edit entry</a></li>
			<li><a href="?act=del-entry&id=<?=$row['id'];?>">Delete entry</a></li>
		<?php } ?> 
	<?php } ?>
	<br><strong>PAGES:</strong>

<?php  
	if ($page != 1) 
		$pervpage = '<a href= ./?page=1><<</a> <a href= ./?page='. ($page - 1) .'><</a> '; 
	if ($page != $total) $nextpage = ' <a href= ./?page='. ($page + 1) .'>></a> <a href= ./?page=' .$total. '>>></a>'; 

	if($page - 2 > 0) 
		$page2left = ' <a href= ./?page='. ($page - 2) .'>'. ($page - 2) .'</a> | '; 
	if($page - 1 > 0) 
		$page1left = '<a href= ./?page='. ($page - 1) .'>'. ($page - 1) .'</a> | '; 
	if($page + 2 <= $total) 
		$page2right = ' | <a href= ./?page='. ($page + 2) .'>'. ($page + 2) .'</a>'; 
	if($page + 1 <= $total) 
		$page1right = ' | <a href= ./?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

	echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage; 
?>

<?php require 'footer.php'; ?>