<?php
$content .= '<h1>Welcome to the books page</h1>';
$content .= printBook('Prioritibility', '978-0321350312', 24.99, array(
    'Jakob Nielsen',
    'Hoa Loranger'
));
// handle to create sql statements
$link = mysqli_connect(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}

$sql = "SELECT title, price, isbn
FROM book";
// result set - contains all records - just in memory - need to manipulate them in php
$result = mysqli_query($link, $sql);
if ($result === false) {
    echo mysqli_error($link);
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $content .=
            '<p>' .
            htmlentities($row['title']) .
            ' : £' .
            htmlentities($row['price']) .
            ' ' .
            htmlentities($row['isbn']) .
            '</p>';
    }
    mysqli_free_result($result);
}
?>

 <!-- Use strtotime -->