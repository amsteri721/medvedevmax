<?php require 'header.php'; ?>
	<form action="?act=val-reg" method="post">
		<p>Login</p>
		<input type="text" name="login" required>
		<p>Password</p>
		<input type="password" name="password" required>
		<p>Repeat password</p>
		<input type="password" name="rpassword" required>
		<p><input type="submit" value="Registration"></p>
	</form>
	
<?php require 'footer.php'; ?>