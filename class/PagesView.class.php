<?php
class PagesView {
	public function pageView($table_name) {
		session_start();
		session_regenerate_id(true);
		if(!$_SESSION['token'] || !isset($_SESSION['token'])) {
			die("Invalid token");
		}
		$username_session = $_SESSION['username'];
		md5($username_session);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $table_name; ?></title>
	<link href="../css/style.css" type="text/css" rel="stylesheet">
	<meta charset="utf-8">
</head>
<body>
	<div class="wrapper">
		<?php
			include_once "../inc/header.php";
		?>
		<div class="news_wrapper">
		<main class="main_news">
		<?php
			require_once "../inc/connection.php";
			
			$sql = "select * from $table_name";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "<p>".$row['vesti']."</p>";
					$vesti_naslov = $row['vesti_naslov'];
					echo "<p>".$vesti_naslov."</p>";
					
					require_once "../class/Form.class.php";
					$Form2 = new Form();
					$Form2->openForm("comments", "../class/CommentsInsert.class.php", "post");
					$Form2->controlInput("hidden", "vesti_naslov", $vesti_naslov);
					$Form2->controlInput("hidden", "user_commented", $username_session);
					$Form2->controlInput("hidden", "table_name", $table_name);
					echo "<p>Unesite svoj komentar:</p>";
					$Form2->controlArea("nesto_tamo", "");
					echo "<br><br>";
					$Form2->controlInput("submit", "btn_posalji", "POŠALJI");
					echo "<br><br>";
					$Form2->closeForm();
					
					if($_SESSION['username'] == "rocky") {
						$Form = new Form();
						$Form->openForm("", "../class/DeleteNews.class.php", "post");
						$Form->controlInput("hidden", "table_name", $table_name);
						$Form->controlInput("hidden", "vesti_naslov", $vesti_naslov);
						$Form->controlInput("submit", "btn_obrisi", "OBRIŠI VEST");
						$Form->closeForm();
					}
				}
			} else {
				echo "<p>Trenutno nema vesti.</p>";
			}
			?>
		</main>
		<aside class="aside_news">
			<h2>Prikaz komentara</h2>
			<?php
				include "../class/ShowComments.class.php";
				$ShowComments = new ShowComments();
				$ShowComments->show($table_name."_comments", $table_name);
			?>
		</aside>
		</div>
		<?php
		if($_SESSION['username'] == "rocky") {
			?>
				<div class="okvir_unos">
				<h2 class="h2">POZDRAV VELIKI ADMINISTRATORE!!!</h2>
				<?php
				require_once "Form.class.php";
					$Form1 = new Form();
					$Form1->openForm("", "../class/InsertNews.class.php", "post");
					echo "<p>Naziv tabele:</p>";
					$tables = array("svakodnevnica", "sport", "zabava");
					$Form1->controlSelect($table_name, "insert_table_name", $tables);
					echo "<p>Naziv vesti:</p>";
					$Form1->controlInput("text", "vesti_naslov", "");
					echo "<br><br>";
					$Form1->controlArea("insert", "Unesi_vest");
					echo "<br><br>";
					$Form1->controlInput("submit", "unesi_vest", "POTVRDI UNOS");
					$Form1->closeForm();
			}
				?>
			</div>
		<?php
			require_once "../inc/footer.php";
			}
}		
		?>
	</div>
</body>
</html>	
