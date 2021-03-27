<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	<meta charset="utf-8">
	<link href="../css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="wrapp">
		<?php
			require "../config.php";
			$Form5 = new Form();
			$Form5->openForm("login_form", "../class/Register.class.php", "post");
		?>
			<div class="label">
				<p>Insert username:</p>
				<p>Insert password:</p>
				<p>Insert E-mail:</p>
			</div>
			<div class="input">
		<?php
			echo "<p>";
			$Form5->controlInput("hidden", "token", $_SESSION['token']);
			echo "</p><p>";
			$Form5->controlInput("text", "username", "");
			echo "</p><p>";
			$Form5->controlInput("password", "password", "");
			echo "</p><p>";
			$Form5->controlInput("email", "email", "");
			echo "</p><p>";
			$Form5->controlInput("submit", "btn_submit", "POTVRDI");
			echo "</p>";
			$Form5->closeForm();
		?>
		</div>
		<div>
			<p>If you are an user, <a class="bridge" href="../index.php">click here</a> and go to login.</p>
		</div>
	</div>
</body>
</html>


