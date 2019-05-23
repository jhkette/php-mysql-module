<?php
/**
 * Building Web Applications using MySQL and PHP (W1)
 * HOE - Application design
 */

// Include the application configuration settings
require_once 'includes/config.inc.php';

// Include the function definitions
require_once 'includes/functions.inc.php';

/** 
 * Establish a connection to the database and verify it was successful 
 * -----------------------------------------------------------------------------
 */
 
// We can use the config values defined in config.php as arguments
$link = mysqli_connect(
	$config['db_host'], 
	$config['db_user'], 
	$config['db_pass'], 
	$config['db_name']);


// If the connection fails, we "exit" which stops all further processing by PHP
if (mysqli_connect_errno()) {
exit('Sorry, there has been an error. Please try again later.');
}

/** 
 * Execute a query and process the results
 * -----------------------------------------------------------------------------
 */

// Construct the query
$sql = "
SELECT
	book.title,
	book.isbn,
	book.published,
	book.price,
	GROUP_CONCAT(CONCAT(firstname,' ',lastname) ORDER BY lastname ASC SEPARATOR ', ') AS authors
FROM
	( book JOIN book_author ON (book.id = book_author.book_id) )
JOIN
	author ON (book_author.author_id = author.id)
GROUP BY
	book.title,
	book.id
ORDER BY
	book.title;
";

// Execute the query, assigning the result to $result
$result = mysqli_query($link,$sql);

// If the query failed, $result will be "false", so we test for this, and exit if it is
if ($result === false) {
    exit('NOT WORKING.');
}
// Gather books HTML for later
$books = '';
// Check if the query returned anything
if (mysqli_num_rows($result) == 0) {
	$books .= '<p class="alert">Sorry, we have no books to display.</p>';
} else {
	// Loop through $result, converting each record from the result set to an array which we assign to $row
	while ($row = mysqli_fetch_assoc($result)) {

		// We can now access the values in $row using the database column names as array keys
		$booktitle = $row['title'];
		$book_isbn = $row['isbn'];
		$book_pubdate = $row['published'];
		$book_price = $row['price'];
		$book_authors = explode(',', $row['authors']);

		// Run the function and add the returned HTML to $books
		$books .= bookToHtml($booktitle , $book_isbn, $book_pubdate, $book_price, $book_authors);

	}
}

// We are finished with the result set, so no point keeping it in memory
mysqli_free_result($result);

// As we are doing no more database querying, we can also close the connection now.
mysqli_close($link);

/** 
 * Build the HTML page from include files and some content that was generated 
 * above (i.e. $books)
 * -----------------------------------------------------------------------------
 */

// Add the heading to output
$output = '<h1>Our Books</h1>';

// Add the books to output
$output .= $books;

// Include the HTML header

$title = 'PHP books';
$heading = 'PHP books';

$file = 'templates/page.php';
$tpl = file_get_contents($file);

$pass1 = str_replace('[+title+]', $title, $tpl);
$pass2 = str_replace('[+heading+]', $heading, $pass1);
$final = str_replace('[+content+]', $output, $pass2);

echo $final;

// Include the HTML footer

?>
