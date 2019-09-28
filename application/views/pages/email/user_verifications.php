<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Verifikasi Email <?php echo $fullname ?></h3>
<a href="<?php echo base_url('user/verifications?token='.$token); ?>">verifikasi</a>
</body>
</html>