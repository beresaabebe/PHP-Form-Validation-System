<?php include_once 'inc/db.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/nav.php'; ?>
<?php include_once 'inc/forget.search.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3 offset-md-2">
			<form action="" method="post" accept-charset="utf-8">
				<div class="car">
					<div class="card-header">
						<h3 class="card-title">Find your account</h3>
					</div>
					<div class="card-body">
<?php 
if (isset($errors)) {
	echo "<p class='alert alert-danger'>{$errors}</p>";
}
?>						
						<div class="form-group">
							<p>Please enter your email to search for your account</p>
							<input type="email" name="email" placeholder="Enter email" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="forget" value="Search" class="btn btn-primary">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include_once 'inc/footer.php'; ?>