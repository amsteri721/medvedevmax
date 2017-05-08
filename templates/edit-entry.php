<?php require 'header.php'; ?>

<?php foreach ($entry as $row) { ?>
	<br>
	<form class="form-horizontal" action="?act=save-edit-entry" method="post">
	<input type="hidden" value="<?=$row['id']?>" name="id">
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" placeholder="Login" name="header" required value="<?=$row['header']?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Content</label>
	    <div class="col-sm-4">
	      <textarea name="content" class="form-control" id="inputPassword3" rows="10" required ><?=$row['content']?></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-4">
	      <button type="submit" class="btn btn-success">Save entry</button>
	    </div>
	  </div>
	</form>
</div>
<?php } ?>	

<?php require 'footer.php'; ?>