<?php
class ShowComments {

	public function show($table_name, $page_path) {
		require "../inc/connection.php";
		$sql = "select * from $table_name";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<p>Komentar za vest  \"".$row['news_id']."\" od korisnika ".$row['username_commented'].":<br>".$row['comment']."</p>";
				
				if($_SESSION['username'] == "rocky" || $_SESSION['username'] == $row['username_commented']) {
					$comment_id = $row['comment_id'];
					include_once "Form.class.php";
					$Form4 = new Form();
					$Form4->openForm("", "../class/DeleteComments.class.php", "post");
					$Form4->controlInput("hidden", "table_name", $table_name);
					$Form4->controlInput("hidden", "id", $comment_id);
					$Form4->controlInput("hidden", "page_path", $page_path);
					$Form4->controlInput("submit", "delete_comment", "obriši komentar");
					echo "<br><br>";
					$Form4->closeForm();
				}
			}
		}
	}
}

?>