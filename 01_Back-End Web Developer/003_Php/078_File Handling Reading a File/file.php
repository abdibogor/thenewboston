<?php

	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		if (!empty($name)) {
			
		  	$handle = fopen('names.txt', 'a');
			fwrite($handle, $name."\n");
			fclose($handle);
			
			echo 'Current names in file: ';
			
			$count = 0;
			$readin = file('names.txt');
			$readin_count = count($readin);
			
			foreach($readin as $fname) {
				echo trim($fname);
				//if ($count!=$readin_count) {
					if ($count<$readin_count) {
					echo ', ';
				} 
				$count++;
			}
			
		} else {
			echo 'Please type a name.';
		}
	}
  
?>

<form action="file.php" methode="POST">
<label>Name:</label><br>
<input type="text" name="username"><br><br>
<input type="submit" value="Submit">
</form>