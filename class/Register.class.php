<?php
session_start();
class Register {

	public function registerFunc($token, $btn_submit, $username, $password, $email) {
		
		if(!$token || !isset($token) || $token != $token) {
			die("Something went wrong, try again.");
			}
		if(isset($btn_submit)) {
	
			require_once "../inc/connection.php";
			if(isset($username) && isset($password) && isset($email)) {
				$username = trim($username);
				$password = trim($password);
				$email = trim($email);
				$username = mysqli_real_escape_string($conn, $username);
				$password = mysqli_real_escape_string($conn, $password);
				$password = md5($password);
				$email = mysqli_real_escape_string($conn, $email);
				?>
					<p>Back to <a href=../pages/register.php>REGISTER page</a>.</p>
				<?php
				if($username == "") {
					echo "<p>Please, enter Your username.</p>";
					return;
				} elseif ($password == "") {
					echo "<p>Please, enter Your password.</p>";
					return;
				} elseif (!preg_match("/^([a-zA-Z0-9_-])+\@([a-zA-Z0-9])+\.([a-zA-Z]){2,3}$/", $email) || $email == "") {
					echo "<p>Please, enter a valid email.</p>";
					return;
				} else {
					$sql = "select * from register";
					$result = mysqli_query($conn, $sql);
					
					if(mysqli_num_rows($result) >=1) {
						while($row = mysqli_fetch_assoc($result)) {
						if($username == $row['username']) {
							echo "<p>Username already exists. Try new one.</p>";
							return;
						}  elseif($email == $row['email']) {
							echo "<p>E-mail already exists. Try new one.</p>";
							return;
						} 
					} 
						$sql1 = "insert into register (id, username, password, email) values (null, '{$username}', '{$password}', '{$email}')";
						$query1 = mysqli_query($conn, $sql1);
						if($query1) {
							header("Location: ../index.php");
						}
					} else {
						$sql = "insert into register (id, username, password, email) values (null, '{$username}', '{$password}', '{$email}')";
						$query = mysqli_query($conn, $sql);
						if($query) {
							header("Location: ../index.php");
						}
					}
				}
			}
		}
	}
}
$Register = new Register();
$Register->registerFunc($_SESSION['token'], $_POST['btn_submit'], $_POST['username'], $_POST['password'], $_POST['email']);

?>