<?php
require_once 'includes/functions.php';
require_once 'includes/config.php';
// Code to detect whether index.php has been requested without query string goes here

$content = '';
if (!isset($_GET['page'])) {
	$id = 'home'; // display home page
   } else {
	$id = $_GET['page']; // else requested page
   }

// Switch statement to decide content of page will go here.
// Regardless of which "view" is displayed, the variable $content will
// be populated with the HTML content for that view

switch ($id) {
	case 'home' :
	include 'views/home.php';
	break;
	case 'authors' :
	include 'views/authors.php';
	break;
	case 'books' :
	include 'views/books.php';
	break;
	case 'all-authors' :
	include 'views/viewauthors.php';
	break;
	case 'delete' :
	include 'views/delete.php';
	break;
	default :
	include 'views/404.php';
	}

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
			<li><a href="index.php?page=authors">Authors</a></li>
			<li><a href="index.php?page=all-authors">All Authors</a></li>
			<li><a href="index.php?page=books">Books</a></li>
			<li><a href="index.php?page=delete">delete</a></li>
		</ul>
	</nav>	
        
		<?php
		// Display content for requested view.
		echo $content;
		?>
    </div>		
    </body>
</html>
