<?php

function formatMoney($number) {
    $format = number_format($number, 2);
    $formatted = '£' . $format;
    return $formatted;
}

function printAuthor($authors){
    $output ='';
    switch (true) {
        
        case (count($authors) == 1):
        return  $output.=  htmlentities($authors[0]);
        break;
        
        case (count($authors) == 2):
        return htmlentities($authors[0]). ' and '. htmlentities($authors[1]);
        break;
        
        default:   
        $finalauthor = array_reverse($authors);
        $output .=  $authors[0];
        array_shift($authors);
        array_pop($authors);
        foreach ($authors as $key => $author) {
            $output.=', ' . htmlentities($author);
        }
        $output .=  ' and '.  htmlentities($finalauthor[0]);
        return $output;
    }
    
}

function printBook($title, $isbn, $price, $authors){

    $output = '<table> <tr> <td>'. $title . '</td> <td>' . $isbn
    . '</td> <td>' .  formatMoney($price) .
    '</td>   <td>' . printAuthor($authors) . '</td> </tr> </table>';
    
    return $output;  
}


    ?>           