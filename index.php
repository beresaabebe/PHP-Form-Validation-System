<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/nav.php'; ?>
<?php 
	if (isset($_GET['source'])) {
		$source = $_GET['source'];
	}
	else {
		$source = "";
	}
	
	$register = urlencode('register');
	$agreement = urlencode('Software license and agreement terms and conditions!');
	$forget = urlencode('forget account');
	
	switch (urlencode($source)) {
		case $forget:
			require_once 'forget.php';
			break;
		case $agreement:
			require_once 'agreement.php';
			break;
		case $register:
			require_once 'inc/create.account.php';
			break;
		default:
			require_once 'inc/login.account.php';
			break;
	}
?>
<?php require_once 'inc/footer.php'; ?>