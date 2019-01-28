<?php

require_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "405 : Method not allowed!";
} else {
    $content = file_get_contents("php://input");
    $decoded = json_decode($content);

    $query = "insert into products (`category_id`, `manufacturer`, `model`, `price`) 
          values ('" . $decoded->category_id . "', '" . $decoded->manufacturer . "','" . $decoded->model . "', '" . $decoded->price . "')";

    mysqli_query($db, $query);
    echo "Succesfully addded to the database.";
}
