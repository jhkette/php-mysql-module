<?php
/**
 * Function definitions for HOE - PHP with MySQL
 */

/**
 * Display book data in HTML format
 * Note, PHP_EOL has been used so that the generated HTML is legible when we 
 * "view source".. See: http://php.net/manual/en/reserved.constants.php
 *
 * @param string $title
 * @param string $isbn
 * @param string $published MySQL date
 * @param float $price
 * @param array $authors
 * @return string
 */
function bookToHtml($title, $isbn, $published, $price, $authors) {

    $html = '';

    $html .= '<h2>'.htmlentities($title).'</h2>' . PHP_EOL;
    $html .= '<p><strong>ISBN:</strong> '.htmlentities($isbn).'</p>' . PHP_EOL;
    $html .= '<p><strong>Published:</strong> '.date('j F Y',strtotime($published)).'</p>' . PHP_EOL;
    $html .= '<p><strong>Authors:</strong> '.htmlentities(toList($authors)).'</p>' . PHP_EOL;
    $html .= '<p><strong>Price:</strong> '.htmlentities(toGBP($price)).'</p>' . PHP_EOL;

    return $html;

}


/**
 * Output a comma separated list of values, last 2 items separated with "and"
 *
 * @param array $data Array of names to 'join'
 * @return string The names joined with commas/and/etc
 */
function toList($data) {

    $last = count($data)-1;
    $list  = '';

    for ($i=0; $i <= $last; $i++) {
        $list .= $data[$i];
        if ($i == ($last-1)) {
            $list .= ' and ';
        } elseif ($i < $last) {
            $list .= ', ';
        }
    }

    return $list;

}

/**
 * Function accepts a floating point number and returns that number formatted 
 * as a UK price
 * @param float $number The number to format
 * @return string Formatted 'money' with a pound sign
 */
function toGBP($number) {

    $formatted = number_format($number, 2);
    $price = '£' .$formatted; 

    return $price;

}


?>
