<!--</*?php ob_start(); ?*/>-->

<!--
<h1>My Page</h1>
This is my page.
-->


<?php

/* first example
$redirect_page = 'http://google.co.uk';
 $redirect = true;
	 
	if ($redirect==true) { 
	header('Location: '.$redirect_page);
}

ob_end_clean();
*/

/* 
	second example
 $redirect_page = 'http://google.co.uk';
 $redirect = false;
	 
	if ($redirect==true) { 
	header('Location: '.$redirect_page);
}

ob_end_flush(); 
*/

$redirect_page = 'http://google.co.uk';
 $redirect = true;
	 
	if ($redirect==true) { 
	header('Location: '.$redirect_page);
}

ob_end_flush(); 

?>