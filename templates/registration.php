<?php require 'header.php'; ?>
	<br>
	<form class="form-horizontal"  method="post" action="?act=val-reg">
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Login</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" placeholder="Login" name="login" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-4">
	      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Repeat Password</label>
	    <div class="col-sm-4">
	      <input type="password" class="form-control" id="inputPassword3" placeholder="Repeat Password" name="rpassword" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-4">
	      <button type="submit" class="btn btn-success">Sign in</button>
	    </div>
	  </div>
	</form>
</div>
<?php require 'footer.php'; ?>