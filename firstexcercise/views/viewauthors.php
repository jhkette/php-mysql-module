
<?php
$content .= '<h1>View all authors</h1>';

$link = mysqli_connect(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}

$sql = "SELECT firstname, lastname
FROM author";
$result = mysqli_query($link, $sql);
if ($result === false) {
    $content .= mysqli_error($link);
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $content .=
            '<p>' .
            htmlentities($row['firstname']) .
            ' ' .
            htmlentities($row['lastname']) .
            '</p>';
    }
    mysqli_free_result($result);
}


?>
