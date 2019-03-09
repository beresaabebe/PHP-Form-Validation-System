<?php include_once 'inc/db.php'; ?>
<?php include_once 'mailer.php'; ?>
<?php 
if (isset($_GET['confirmation']) && isset($_GET['email']) && isset($_GET['status'])) {

		$email = $_GET['email'];
		$query = "SELECT `name` FROM `users` WHERE `email`='$email' LIMIT 1";
		$execute = mysqli_query($connection, $query);
		$rows = mysqli_fetch_array($execute);
		$name = $rows['name'];

		$mail->addAddress($email,$name);
 
		$mail->Subject = "Email successfully verified";
		$mail->Body    = "<h3>PHP Form Validation</h3><hr><br><h2>Your new account email is successfully verified!</h2><h4>PhP Form Validation!</h4>";

		if(!$mail->send()) {
		    echo "<p class='alert alert-danger'>Message could not be sent.This is may be caused because of internet connetion!</p>";
		}
	?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/nav.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<div class="car card-primary">
				<div class="card-header">
					<h3 class="card-title">Email address verified</h3>
				</div>
				<div class="card-body">
					<h4 class="text-center text-primary">Congratulations!</h4>
					<p class="text-success">You email address is successfully verified and you can login to you account!</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once 'inc/footer.php'; ?>
<?php } ?>