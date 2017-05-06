<?php require 'header.php'; ?>
	<form action="?act=val-login" method="post">
		<p>Login</p>
		<input type="text" name="login" required>
		<p>Password</p>
		<input type="password" name="password" required>
		<p><input type="submit" value="Login"></p>
	</form>
	
<?php require 'footer.php'; ?>