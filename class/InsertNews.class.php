<?php
class InsertNews {
	
	public function insert($insert, $vesti_naslov, $unesi_vest, $insert_table_name) {
		require "../inc/connection.php";
		if(isset($insert) && isset($unesi_vest)) {
			$insert = trim($insert);
			$sql = "insert into $insert_table_name (vesti_naslov, vesti) values ('$vesti_naslov', '$insert')";
			mysqli_query($conn, $sql);
			header("Location: ../vesti_pages/$insert_table_name.php");
		}
	} 
}
$InsertNews = new InsertNews();
$InsertNews->insert($_POST['insert'], $_POST['vesti_naslov'], $_POST['unesi_vest'], $_POST['insert_table_name']);
?>