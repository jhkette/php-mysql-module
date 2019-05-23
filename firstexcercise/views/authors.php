<?php
$content .= '<h1>Welcome to the Authors page</h1>';

$a1 = array('Author 1');
$a2 = array('Author 1', 'Author 2');
$a3 = array('Author 1', 'Author 2', 'Author 3');
$a4 = array('Author 1', 'Author 2', 'Author 3', 'Author 4');
$content .= '<p>' . printAuthor($a1) . '</p>';
$content .= '<p>' . printAuthor($a2) . '</p>';
$content .= '<p>' . printAuthor($a3) . '</p>';
$content .= '<p>' . printAuthor($a4) . '</p>';

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

$names = array(
    0 => array("Donald", "Norman"),
    1 => array("Tim", "O'Reilly")
);
foreach ($names as $writer) {
    // always use - mysqli_real_escape_string it will escape charecters
    $first = mysqli_real_escape_string($link, $writer[0]);
    $second = mysqli_real_escape_string($link, $writer[1]);
    $sql = "INSERT INTO author (firstname, lastname)
    VALUES ('$first', '$second')";
    $ok = mysqli_query($link, $sql);
    /* check query ran ok */
    if ($ok === false) {
        echo mysqli_error($link);
    } else {
    }
}
?>
 