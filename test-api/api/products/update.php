<?php

require_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
    echo "405 : Method not allowed!";
} else {
    $content = file_get_contents("php://input");
    $decoded = json_decode($content);

    $query = "update products set `category_id` = '".$decoded->category_id."', `manufacturer` = '".$decoded->manufacturer."', 
            `model` = '".$decoded->model."', `price` = '".$decoded->price."' where id = '".$decoded->id."'";

    mysqli_query($db, $query);
    echo "Succesfully updated.";
}

