<?php
class DeleteNews {
	
	public function delete($table_name, $vesti_naslov, $btn_obrisi) {
		if(isset($btn_obrisi)) {
		require "../inc/connection.php";
		echo $table_name;
		echo $vesti_id;
		$sql = "delete from $table_name where vesti_naslov='{$vesti_naslov}'";
		mysqli_query($conn, $sql);
		header("Location: ../vesti_pages/$table_name.php");
		}
	}
}
$DeleteNews = new DeleteNews();
$DeleteNews->delete($_POST['table_name'], $_POST['vesti_naslov'], $_POST['btn_obrisi']);
?>