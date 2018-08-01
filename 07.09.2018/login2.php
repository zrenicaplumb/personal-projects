<?php 
	session_start();
	require_once('db_info.php');
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		// if(!empty($username) && !empty($password)){
		$db = new mysqli($servername, $username, $dbpassword, $dbname);
		$query = "SELECT * FROM personal_info WHERE email = '$email' and password = '$password' ";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);
		if ($row['email'] == $email && $row['password'] == $password) {
			$_SESSION['email'] = $email;
			header("Location: index.php");
		}
		else{
			echo "Could not find account for " . $_POST['email'];
		}
		// }
	}	
?>