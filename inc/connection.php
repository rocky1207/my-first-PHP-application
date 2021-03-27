<?php
@$conn = mysqli_connect("localhost", "root", "rocky1207", "web-aplikacija");

if(!$conn) {
	echo "Connection failed: ".mysqli_connect_error();
}
?>