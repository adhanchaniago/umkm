<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Reset Password <?php echo $fullname ?></h3>
<a href="<?php echo base_url('user/forget-password?token='.$token); ?>">Reset Password</a>
</body>
</html>