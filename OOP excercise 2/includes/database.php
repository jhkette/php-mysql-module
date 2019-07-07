<?php

class db
{
    private $config = array();

    public function __construct($dbconfig){
        $this->config = $dbconfig;
    }

    protected function connect()
    {
        $this->host = $config['db_host'];
        $this->username = $config['db_user'];
        $this->password = $config['db_pass'];
        $this->db = $config['db_name'];

        $conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->db
        );

        return ;
    }


}

// class books extends db
// {
//     protected function getAllBooks()
//     {
//         $sql = "SELECT * FROM book";
//         $results = $this->connect()->query($sql);
//         $numRows = $results;
//         if ($numRows === false) {
//             echo 'error';
//         } else {
//             // result object has methods, e.g. fetch_assoc // and properties, e.g. num_rows
//             while ($row = $results->fetch_assoc()) {
//                 $data[] = $row;
//             }
//             return $data;
//         }
//     }
// }

// class displayData extends books
// {
//     // public $datas;
//     // public function __construct (){
//     //     $this->data = $data;
//     // }
//     protected function formatMoney($number) {
//         $format = number_format($number, 2);
//         $formatted = '£' . $format;
//         return $formatted;
//     }

//     protected function showAllBooks()
//     {
//         $datas = $this->getAllBooks();
//         $content = '';
//         $content .= '<ul>';
//         foreach ($datas as $data) {
           
//             $content .= '<li>' . $data['title'] . '</li>' ;
//             $content .= '<li>' . $this->formatMoney($data['price']) . '</li>' ;        
//         }
//         $content .= '<ul>';

//         return $content;
//     }

//     public function displayHtml(){
//         $content = $this-> showAllBooks();
        
//         echo $content;
//     }
// }

?>
