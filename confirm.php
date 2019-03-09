<?php include_once 'inc/db.php'; ?>
<?php 
	if((isset($_POST['email']) && isset($_POST['token'])) || isset($_POST['verify'])) {
	$token = $_POST['token'];
	$email = $_POST['email'];
	if (strlen($token)==6) {
		$query = "SELECT `token` FROM users WHERE `email`='$email' LIMIT 1";
		$execute = mysqli_query($connection, $query);
		$check = mysqli_num_rows($execute);
		if ($check!=0) {
			$rows = mysqli_fetch_array($execute);
			$db_token = $rows['token'];
			if ($token === $db_token) {
				$query = "UPDATE `users` SET `emailVerified`=1,`status`=1,`token`='' WHERE `email`='$email'";
				$execute = mysqli_query($connection, $query);
				
				header('Location: email.verified.php?confirmation='.$token.'&email='.$email.'&status=verified');			
			}
			else {
				$errors[] = 'Wrong confirmation code';
			}	
		}
		else {
			$errors[] = 'Something goes wrong!';
		}
	}
	else {		
		$errors[]='Your confirmation code is wrong!';
	}
}
?>