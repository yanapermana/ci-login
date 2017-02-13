<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action="<?php echo site_url("tutorial/process_login"); ?>" method="POST">
	<input type="text" name="username" value="" placeholder="username" />
	<input type="password" name="password" value="" placeholder="password" />
	<input type="submit" value="Submit" />
</form>
<?php if (isset($error)){ ?>
	<p> <?php echo $error; ?></p>
<?php } ?>
<p></p>
</body>
</html>