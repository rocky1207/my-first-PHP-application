<?php
$token = md5(time().microtime().uniqid());
session_start();
session_regenerate_id(true);
$_SESSION['token'] = $token;

if(isset($_SESSION['session_secure']) && $_SESSION['session_secure'] == true) {
	header("Location: pages/web_site.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<meta charset="utf-8">
</head>
<body>
<div class="wrapp">
	<?php
	  	require_once "class/Form.class.php";
		$Form3 = new Form();
		$Form3->openForm("login_form", "pages/login.php", "post");
	?>
	<div class="label">
		<p>Username:</p>
		<p>Password:</p>
		
	</div>
	<div class="input">
		<?php
			echo "<p>";
			$Form3->controlInput("hidden", "token", $_SESSION['token']);
			echo "</p><p>";
			$Form3->controlInput("text", "username", "");
			echo "</p><p>";
			$Form3->controlInput("password", "password", "");
			echo "</p><p>";
			$Form3->controlInput("submit", "btn_submit", "Submit");
			echo "</p>";
			$Form3->closeForm();
		?>
	</div>
	<div>
		<p>If you are not a user, <a class="bridge" href="pages/register.php">click here</a> and get registrated.</p>
	</div>
</div>
</body>
</html>