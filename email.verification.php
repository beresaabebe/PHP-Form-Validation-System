<?php if (isset($_GET['email'])){ 
	$email = $_GET['email'];
?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/nav.php'; ?>
<?php include_once 'confirm.php'; ?>
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<form action="" method="post">
				<div class="car">
					<div class="card-header">
						<h3 class="card-title">Enter confirmation code</h3>
					</div>
					<div class="card-body">
						<p class="text-success">Confirmation code successfully sent to <?php echo $email; ?></p>						
<?php 
if (empty($errors) === false) {
	foreach ($errors as $error) {
		echo '<p class="alert alert-danger">'.$error.'</p>';
	}
}
?>						
						<div class="form-group">
							<input type="text" name="token" placeholder="Enter confirmation code" class="form-control">
							<input type="hidden" name="email" value="<?php echo $email; ?>">
						</div>
					</div>
					<div class="card-footer">
						<div class="input-group">
							<input type="submit" name="verify" value="Confirm" class="btn btn-success pull-lg-12">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include_once 'inc/footer.php'; ?>
<?php } else {
	header('Location:'.$_SERVER['PHP_SELF']);
}?>
