<?php require 'header.php'; ?>


	<?php 	foreach ($entry as $row) { ?>
		<div class="col-md-4">
			<h2><a href="?act=entry&id=<?=$row['id'];?>"><?=$row['header'];?></a></h2>
			<p class="entry-content"><?=$row['content'];?></p>
			<p><strong>Date:</strong> <?=$row['date'];?></p>
			<?=$row['comments'];?> <a href="?act=entry&id=<?=$row['id'];?>">comments</a>
		<p class="center"><a class="btn btn-default" href="?act=entry&id=<?=$row['id'];?>" role="button">View details &raquo;</a></p>
		<?php if($_SESSION['login']=='admin') {?>
			<li><a href="?act=edit-entry&id=<?=$row['id'];?>">Edit entry</a></li>
			<li><a href="?act=del-entry&id=<?=$row['id'];?>">Delete entry</a></li>
		<?php } ?>
		</div>	
	<?php } ?>
	</div>
<div class="page">
	<ul class="pagination">
		<?php  
			if ($page != 1) 
				$pervpage = '<a href= ./?page=1><<</a> <a href= ./?page='. ($page - 1) .'><</a>'; 
			if ($page != $total) $nextpage = ' <a href= ./?page='. ($page + 1) .'>></a> <a href= ./?page=' .$total. '>>></a>'; 

			if($page - 2 > 0) 
				$page2left = ' <a href= ./?page='. ($page - 2) .'>'. ($page - 2) .'</a> '; 
			if($page - 1 > 0) 
				$page1left = '<a href= ./?page='. ($page - 1) .'>'. ($page - 1) .'</a> '; 
			if($page + 2 <= $total) 
				$page2right = ' <a href= ./?page='. ($page + 2) .'>'. ($page + 2) .'</a>'; 
			if($page + 1 <= $total) 
				$page1right = ' <a href= ./?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

			echo '<li>'.$pervpage.'</li>'.'<li>'.$page2left.'</li>'.'<li>'.$page1left.'</li>'.'<li class="active"><span>'.$page.'</span></li>'.'<li>'.$page1right.'</li>'.'<li>'.$page2right.'</li>'.'<li>'.$nextpage; 
		?> 
	</ul>
</div>

<?php require 'footer.php'; ?>