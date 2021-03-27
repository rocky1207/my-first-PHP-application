<?php
session_start();
if(!$_SESSION['token'] || !isset($_SESSION['token']) || $_SESSION['token'] != $_POST['token']) {
	die("Invalid token");
}
if($_SERVER['REQUEST_METHOD'] == "POST") {
	require_once "../inc/connection.php";
	if(isset($_POST['btn_submit'])) {
		if(isset($_POST['username']) && isset($_POST['password'])) {
			$_POST['username'] = trim($_POST['username']);
			$_POST['password'] = trim($_POST['password']);
		
			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$password = md5($password);
			
			$_SESSION['username'] = $_POST['username'];
			
			$sql = "select * from register where username='{$username}' and password='{$password}'";
			$query = mysqli_query($conn, $sql);
			if(mysqli_num_rows($query) > 0) {
				header("Location: web_site.php");
			} else {
				echo "Wrong password or username. Try again.";
				?>
					<p>Back to <a href="../index.php">LOGIN page</a>.</p>
				<?php
			}
		}
	}
}
?>
