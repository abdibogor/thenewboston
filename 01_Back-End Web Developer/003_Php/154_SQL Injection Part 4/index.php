<?php
	mysql_connect('localhost:8080/phpmyadmin/','root','');
	mysql_select_db('bogoreh');

	if (isset($_POST['username'])&&isset($_POST['password'])) {
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 if (!empty($username)&&!empty($password)) {
			 //echo 'Ok.';
		
        echo $username.'<br>'.$password.'<br>';
		
			 $query = "Select `id` FROM `users` WHERE `username`='$username' AND `password`='$password'";
		      $query_run = mysql_query($query);
		 
		 if (mysql_num_rows($query_run)>=1) {
			 echo 'Login success.';
		 } else {
			 echo 'Invalid Username/password Combination.';
		 }
		 
		 }
	}
	//echo 'Ok.';
?>

<form action="index.php" method="POST">
Username: <input type="text" name="username">
Password: <input type="password" name="password">
<input type="submit" value="Submit">
</form>