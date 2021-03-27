<?php
function autoload($file) {
	require "../class/".$file.".class.php";
}
spl_autoload_register('autoload');
?>