<?php require 'header.php'; ?>
	<br>
	<form class="form-horizontal" method="post" action="?act=save-entry">
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" placeholder="Login" name="header" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Content</label>
	    <div class="col-sm-4">
	      <textarea name="content" class="form-control" id="inputPassword3" rows="10"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-4">
	      <button type="submit" class="btn btn-success">Add entry</button>
	    </div>
	  </div>
	</form>
</div>
<?php require 'footer.php'; ?>