<?php
session_start();
if(!$_SESSION['token'] || !isset($_SESSION['token'])) {
	die("Invalid token");
}
$_SESSION['session_secure'] = true;
md5($_SESSION['username']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HOME</title>
	<link href="../css/style.css" type="text/css" rel="stylesheet"> 
</head>
<body>
	<div class="wrapper">
	<?php
		include_once "../inc/header.php";
	?>
	<main class="main">
		<h1>DOBRODOŠLI!!!</h1>
		<div>
			<p>Poštovani korisniče, nalazite se na stranici koja Vam pruža vesti i ostale zanimljivosti iz oblasti svakodnevnice, sporta i zabave. Izaberite oblast života koja Vas najviše interesuje i uživajte u sadržaju koji Vam ovaj sajt pruža.</p>
			<p>Slobodno ostavljate svoje komentare jer nam interakcija sa vama veoma znači kako bi unapredili svoj rad i kako bi vam ubuduće mogli pružiti još bolje isustvo na našem sajtu. Naravno, možete nas i kontaktirati i na taj način preneti svpja zapažanja i iskustva.</p>
		</div>
		<div class="greetings">
			<p>VELIKI POZDRAV!</p>
		</div>
	</main>
	<?php
		require_once "../inc/footer.php";
	?>
	</div>
</body>
</html>