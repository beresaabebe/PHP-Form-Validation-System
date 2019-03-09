<?php include_once 'mailer.php'; ?>
<?php if (isset($_GET['name']) && isset($_GET['email'])) {
	$name = $_GET['name'];
	$email = $_GET['email'];

	$mail->addAddress($email,$name);
	$mail->Subject = "PHP Form Validation Password Successfully Changed!";
	$mail->Body    = "<h3>PHP Form Validation</h3><hr><br><h2>Your account new password is successfully changed!<br><a href='http://localhost/form_validation/'>Login</a></h2><h4>PhP Form Validation!</h4>";
	if(!$mail->send()) {
	    echo "<p class='alert alert-danger'>Message could not be sent.This is may be caused because of internet connetion!</p>";
	}
?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/nav.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3 offset-md-2">
			<div class="car">
				<div class="card-header">
					<h3 class="card-title">New Password created</h3>
				</div>
				<div class="card-body">	
					<p class="card-text text-primary">Goto login and enjoy your time!</p>
					<a href="index.php" class="btn btn-primary btn-block">Login</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once 'inc/footer.php'; ?>
<?php } ?>