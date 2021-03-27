<?php
class DeleteComments {
	public function deleteComm($page_path, $delete_comment, $table_name, $comment_id) {
		if(isset($delete_comment)) {
			require "../inc/connection.php";
			$sql = "delete from $table_name where comment_id='{$comment_id}'";
			mysqli_query($conn, $sql);
			header("Location: ../vesti_pages/$page_path.php");
			
		}
	}
}
$DeleteComments = new DeleteComments();
$DeleteComments->deleteComm($_POST['page_path'], $_POST['delete_comment'], $_POST['table_name'], $_POST['id']);
?>