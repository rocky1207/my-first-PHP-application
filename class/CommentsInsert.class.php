<?php
class CommentsInsert {
	public function insert($btn_posalji, $table_name, $comment, $vesti_naslov, $user_commented) {
		session_start();
		if(!$_SESSION['token'] || !isset($_SESSION['token'])) {
			die("Invalid token");
		}
		if(isset($btn_posalji)) {
			if(isset($comment) && $comment != "") {
				require_once "../inc/connection.php";
				$comment = trim($comment);
				$comment = mysqli_real_escape_string($conn, $comment);
		
				$sql = "insert into {$table_name}_comments (comment_id, comment, news_id, username_commented) values (null, '{$comment}', '{$vesti_naslov}', '{$user_commented}')";
				$res = mysqli_query($conn, $sql);
				if($res) {
					header("Location: ../vesti_pages/$table_name.php");
				} else {
					echo "<p>Somenthing went wrong. Go back and try inserting comment again</p>";
					?>
						<p><a href="../vesti_pages/<?php echo $table_name?>">Back</a> to insert comment.</p>
					<?php
				}
		} else {
			echo "<p>Unesite svoj komentar.</p>";
			?>
				<p><a href="../vesti_pages/<?php echo $table_name?>">Back</a> to insert comment.</p>
			<?php
			}
		}
	}
}
$CommentsInsert = new CommentsInsert();
$CommentsInsert->insert($_POST['btn_posalji'], $_POST['table_name'], $_POST['nesto_tamo'], $_POST['vesti_naslov'], $_POST['user_commented']);
?>