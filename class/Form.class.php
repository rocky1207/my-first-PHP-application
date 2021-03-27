<?php
class Form {
	public function openForm($class, $file, $method) {
		echo "<form class='$class' action='$file' method='$method'>";
	}
	public function controlInput($type, $name, $value) {
		echo "<input type='$type' name='$name' value='$value'>";
	}
	public function controlArea($name, $text) {
		echo "<textarea name='$name'>$text</textarea>";
	}
	public function controlSelect($table_name, $name, $tables) {
		echo "<select  name='$name'>";
		foreach($tables as $table) {
				echo "<option";
				if($table_name == $table) {
					echo " selected";
				}
				echo ">$table</option>";	
			}
		echo "</select>";
	}
	
	public function closeForm() {
		echo "</form>";
	}
}
?>

