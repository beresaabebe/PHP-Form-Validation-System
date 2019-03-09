<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/update.php'; ?>
<?php if (isset($_SESSION['id']))
{ 
	$id = $_SESSION['id'];
	$query = "SELECT * FROM users WHERE id='$id'";
	$execute = mysqli_query($connection, $query);
	while ($rows = mysqli_fetch_array($execute)) {
	    $db_name = $rows['name'];
	    $db_image = $rows['image'];
	    $db_email = $rows['email'];
	    $db_phone = $rows['phone'];
	    $db_about = $rows['about'];
	    $db_date = $rows['date'];
	    $emailVerified = $rows['emailVerified'];
	}
?>
<?php include_once 'inc/nav.php'; ?>
	<div class="container mt-1">
		<h4 class="text-primary">Welcome <?php echo ucfirst($db_name); ?>! <small class="text-muted">Joined on <?php echo date('D-M-Y @ h:i:s', $db_date); ?></small></h4>
		<hr>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col pull-lg-3">
<?php 
if (!empty($errors)) {
	foreach ($errors as $error) {
		echo '<p class="alert alert-danger">'.$error.'</p>';
	}
}
?>
<?php 
if (isset($success)) {
	echo '<p class="alert alert-success">'.$success.'</p>';
}
?>

					<div class="row">						
						<div class="col-lg-4 mb-1">
							<div class="card-header">
								<h3><?php echo ucfirst($db_name); ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="name">Email:</label>
									<label><strong><?php echo $db_email ?></strong> 
<?php 
if ($emailVerified == 1) {
	?>
	<small class="badge badge-success">verified</small>
	<?php
}
else {
	?>
	<small class="badge badge-warning">unverified</small>
	<?php
}
?>
									</label>
								</div>
								<div class="form-group">
<?php 
if (!empty($db_phone)) {
	?>	
									<label for="phone">Phone:</label>
									<label for="phone"><strong><?php echo $db_phone; ?></strong></label>
<?php
}
else {
	?>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-phone"></i></span>
										</div>
										<input type="text" name="phone" value="<?php echo $db_phone; ?>" placeholder="Phone" class="form-control">
									</div>
									<small class="text-muted">Format: xxx-xxx-xxx</small>
	<?php
}
?>									
								</div>
							</div>
						</div>
						<div class="col-lg-4 mb-1">
							<div class="card-header">
								<h3 class="card-title">About me</h3>
							</div>
							<div class="card-body">
<?php 
if (!empty($db_about)) {
	?>
								<p class="card-text">
									<strong><?php echo $db_about; ?></strong>
								</p>
<?php									
}
else {
	?>
								<textarea name="about" class="form-control" placeholder="What do you say about yourself?" cols="20" rows="5"></textarea>
	<?php
}
?>								
							</div>
						</div>
						<div class="col-lg-4 mb-1">
							<div class="card-header">
								<h3 class="card-title">Your Profile Image</h3>
							</div>
							<div class="card-body">
<?php 
if (!empty($db_image)) {
	?>
								<img class="img-thumbnail img-fluid rounded-top" src="images/<?php echo $db_image; ?>" alt="<?php echo $db_image; ?>">
<?php								
}
else {
?>								
								<label for="image">Upload Image</label>
								<input type="file" name="image" class="form-control-file">
								<small class="text-muted">Less than 2 Mbyte</small>
<?php 
} 
?>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
<?php 
if (empty($db_phone) || empty($db_about) || empty($db_image)) {
	?>
								<input type="submit" name="update" value="Save Change" class="btn btn-success">
<?php						
}
?>							
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php require_once 'inc/footer.php'; ?>
<?php }
else{
	header('Location: index.php');
}
?>
