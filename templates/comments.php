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
<?php if(empty($comments)){?>
		<h3>No comments</h3>	
<?php } else { echo "<h3>Comments:</h3>";
	foreach ($comments as $row) { ?>
		<h3><?=$row['author']; ?></h3>
		<p><?=$row['content']; ?></p>
		<p><?=$row['date']; ?></p>
<?php } }?>

<br><strong>PAGES:</strong>
<?php  
	if ($page != 1) 
		$pervpage = '<a href= ./?act=entry&id=' . $entry['id'] . '&page=1><<</a> <a href= ./?page='. ($page - 1) .'><</a> '; 
	if ($page != $total) $nextpage = ' <a href= ./?act=entry&id=' . $entry['id'] . '&page='. ($page + 1) .'>></a> <a href= ./?page=' .$total. '>>></a>'; 

	if($page - 2 > 0) 
		$page2left = ' <a href= ./?act=entry&id=' . $entry['id'] . '&page='. ($page - 2) .'>'. ($page - 2) .'</a> | '; 
	if($page - 1 > 0) 
		$page1left = '<a href= ./?act=entry&id=' . $entry['id'] . '&page='. ($page - 1) .'>'. ($page - 1) .'</a> | '; 
	if($page + 2 <= $total) 
		$page2right = ' | <a href= ./?act=entry&id=' . $entry['id'] . '&page='. ($page + 2) .'>'. ($page + 2) .'</a>'; 
	if($page + 1 <= $total) 
		$page1right = ' | <a href= ./?act=entry&id=' . $entry['id'] . '&page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

	echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage; 
?>