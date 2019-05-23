<?php
/**
 * Building Web Applications using MySQL and PHP (W1)
 * HOE - Application design
 */
 
// Include the application configuration settings
require_once 'includes/config.inc.php';

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
$sql = "SELECT firstname,lastname FROM author";

// Execute the query, assigning the result to $result
$result = mysqli_query($link,$sql);

// If the query failed, $result will be "false", so we test for this, and exit if it is
if ($result === false) {
    exit('Sorry, there has been an error. Please try again later.');
}

// Gather the author HTML for later
$authors = '';

// Check if the query returned anything
if (mysqli_num_rows($result) == 0) {
	$authors .= '<p class="alert">Sorry, we have no authors to display.</p>';
} else {

	// Start the html output
	$authors .= '<ul>';

	// Loop through $result, converting each record from the result set to an array which we assign to $row
	while ($row = mysqli_fetch_assoc($result)) {
		
		// We can now access the values in $row using the database column names as array keys
		
		// Before echoing to the page, we need to escape special characters
		$htmlsafename = htmlentities($row['firstname'].' '.$row['lastname']);
		
		// Echo the escaped string to the page
		$authors .= '<li>'.$htmlsafename.'</li>';

	}

	// Close the OL tag
	$authors .= '</ul>';
}
// We are finished with the result set, so no point keeping it in memory
mysqli_free_result($result);

// As we are doing no more database querying, we can also close the connection now.
mysqli_close($link);

/** 
 * Build the HTML page from include files and some content that was generated 
 * above (i.e. $authors)
 * -----------------------------------------------------------------------------
 */

// Add the heading to output
$output = '<h1>Our Authors</h1>';

// Add the list of authors to $output
$output .= $authors;

// Include the HTML header

$title = 'PHP Authors';
$heading = 'PHP Authors';

$file = 'templates/page.php';
$tpl = file_get_contents($file);

$pass1 = str_replace('[+title+]', $title, $tpl);
$pass2 = str_replace('[+heading+]', $heading, $pass1);
$final = str_replace('[+content+]', $output, $pass2);

// Echo the gathered output
echo $final;

// Include the HTML footer

?>
