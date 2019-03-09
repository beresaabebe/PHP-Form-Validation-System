<?php if (isset($_GET['email']) && isset($_GET['name'])):
	$email = $_GET['email'];
	$name = $_GET['name'];
?>
	
<?php endif ?>
<?php include_once 'mailer.php'; ?>
<?php include_once 'inc/db.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/nav.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3 offset-md-2">
<?php 
if (isset($_POST['confirm_email'])) {
	$email_form = $_POST['email_form'];
	$name = $_GET['name'];
	$token = 'QWER1TYA2Zw5erNt16yMazN97vcdg654DKf7h90ojhOgshD';
	$token = str_shuffle($token);
	$token = substr($token, 0, 35);

	$mail->addAddress($email,$name);

	$mail->Subject = 'Password Reseting';
	$mail->Body    = "<h3>PHP Form Validation</h3><hr><br>New password reseting link: <h2> <a href='http://localhost/form_validation/create.new.password.php?email=$email&name=$name&token=$token'>Click here</a></h2>If the link is not clickable copy the blow url:<br> <a href='http://localhost/form_validation/create.new.password.php?email=$email&name=$name&token=$token'>http://localhost/form_validation/create.new.password.php?email=$email&name=$name&token=$token</a> <p>In order to  protect your account security; please do not send password reseting link to others!</p>";
		if(!$mail->send()) {
		    echo "<p class='alert alert-danger'>Message could not be sent.This is may be caused because of internet connetion!</p>";
		} else {
			echo "<p class='alert alert-success'> We have sent you password reseting. Go to your email to change password!</p>";
		    ?>			
		    <?php
		}
}
?>	
			<form id="form" action="" method="post" accept-charset="utf-8">
				<div class="car">
					<div class="card-header">
						<h3 class="card-title">Search Found</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<p>Is this email account yours? Do you want receive password reseting?</p>
							<input type="radio" name="email_form" value="<?php echo $email; ?>"> <?php echo $email; ?>
						</div>
						<div class="form-group">
							<input type="submit" name="confirm_email" value="Send" class="btn btn-primary">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include_once 'inc/footer.php'; ?>