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
    $config['db_name']
);

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
$result = mysqli_query($link, $sql);

// If the query failed, $result will be "false", so we test for this, and exit if it is
if ($result === false) {
    exit('NOT WORKING.');
}
// Gather books HTML for later
$books = '';
$content ='';
$file = 'templates/list.html';
$tpl = file_get_contents($file);
// Check if the query returned anything
if (mysqli_num_rows($result) == 0) {
    $books .= '<p class="alert">Sorry, we have no books to display.</p>';
} else {
    // Loop through $result, converting each record from the result set to an array which we assign to $row
    while ($row = mysqli_fetch_assoc($result)) {
        // We can now access the values in $row using the database column names as array keys
        $pass1 = str_replace('[+title+]', $row['title'], $tpl);
        $pass2 = str_replace('[+isbn+]', $row['isbn'], $pass1);
        $pass3 = str_replace('[+pub_date+]', $row['published'], $pass2);
        $pass4 = str_replace('[+book_price+]', $row['price'], $pass3);
        $final = str_replace('[+book_authors+]', $row['authors'], $pass4);
        // Run the function and add the returned HTML to $books

        $content .= $final;
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

// Include the HTML header

$title = 'PHP books';
$heading = 'PHP books';

$file = 'templates/page1.html';
$tpa = file_get_contents($file);

$pass1 = str_replace('[+title+]', $title, $tpa);
$pass2 = str_replace('[+heading+]', $heading, $pass1);
$final = str_replace('[+content+]', $content, $pass2);

echo $final;

// Include the HTML footer

?>
