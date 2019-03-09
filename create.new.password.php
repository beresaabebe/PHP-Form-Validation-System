<?php 
if (isset($_GET['email']) && isset($_GET['name']) && isset($_GET['token'])) {
	$email = $_GET['email'];
?>
<?php include_once 'inc/db.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/nav.php'; ?>
<?php include_once 'mailer.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3 offset-md-2">
<?php 
	if (isset($_POST['newpassword'])) {
		$errors = array();
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
		if (strlen($password)<6) {
			$errors[] = 'Password should be more than 6 character!';
		}
		if (strlen($confirmpassword)!==strlen($password)) {
			$errors[] = 'Password & Confirm password should be equal';
		}
		if ($confirmpassword !== $password) {
			$errors[] = 'Password confirmation is wrong!';
		}
		if (empty($errors)) {
			$password = password_hash($password, PASSWORD_BCRYPT,array('cost'=>13));
			$query = "UPDATE `users` SET `password`=''$password'' WHERE `email`='$email'";
			$execute = mysqli_query($connection, $query);		
			header('Location:success.new.password.php?email='.$email.'&name='.$name);
		}
		else {
			foreach ($errors as $error) {
				echo "<p class='alert alert-danger'>{$error}</p>";
			}
		}
	}
?>			
			<form action="" method="post" accept-charset="utf-8">
				<div class="car">
					<div class="card-header">
						<h3 class="card-title">Find your account</h3>
					</div>
					<div class="card-body">					
						<div class="form-group">
							<label for="password">New password</label>
							<input type="password" name="password" placeholder="Enter new password" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Confirm new password</label>
							<input type="password" name="confirmpassword" placeholder="Enter confirm new password" class="form-control">
						</div>

						<div class="form-group">
							<input type="submit" name="newpassword" value="Change" class="btn btn-primary">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include_once 'inc/footer.php'; ?>
<?php } ?>