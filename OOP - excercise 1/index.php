<?php


require_once './includes/config.php';
require_once './includes/Database.php';


$content = '';
if (!isset($_GET['page'])) {
	$id = 'home'; // display home page
   } else {
	$id = $_GET['page']; // else requested page
   }



switch ($id) {
	case 'home' :
	include 'views/index.php';
	break;
	case 'authors' :
	include 'views/authors.php';
}


// $sql = "SELECT firstname, lastname FROM author";
// $result = $db->query($sql);
// // query() returns a result object if successful $result = $db->query($sql);
// if($result === false) {
//   echo $db->error;
// } else {
// // result object has methods, e.g. fetch_assoc // and properties, e.g. num_rows
// while($row = $result->fetch_assoc()) {
// echo $row['firstname'].' is '.$row['lastname'].' yrs old'; }
//   // result object method to free result set
// $result->free(); }


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>BBK ITApps - Building Web Applications using MySQL and PHP</title>
		<link rel="stylesheet" href="./styles/style.css">
    </head>
    <body>
	<div class = "container">
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
      <li><a href="index.php">Dog</a></li>
		</ul>
	</nav>	
        
		<?php
		// Display content for requested view.
		echo $content;
		?>
    </div>		
    </body>
</html>