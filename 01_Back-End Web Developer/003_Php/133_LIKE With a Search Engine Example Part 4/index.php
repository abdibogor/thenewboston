<?php	  
require 'connect.inc.php';

if (isset($_POST['search_name'])) {
	$search_name = $_POST['search_name'];
	if (!empty($search_name)) {
		//echo 'OK.';
		
	if (strlen($search_name)>=4) {
		
		$query = "SELECT `name` FROM `names` WHERE `name` like '%".mysql_real_escape_string($search_name)."%'";
		$query_run = mysql_query($query);
		
		$query_num_rows = mysql_num_rows($query_run);
		
		if ($query_num_rows>=1){
		   echo $query_num_rows.' result found: <br>';
		  while ($query_row = mysql_fetch_assoc($query_run)) {
			  echo $query_row['name'].'<br>';
		  }
		  
		} else {
		  echo 'No result found';
		  }
		} else {
			echo 'Your keyword must be 5 character or more.';
		}
	}
}		
		
?>

<form action="index.php" method="POST">
Name: <input type="text" name="search_name"> 
			 <input type="submit" value="Search">
</form>