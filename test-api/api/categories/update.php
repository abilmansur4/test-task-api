<?php

require_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
    echo "405 : Method not allowed!";
} else {
    $content = file_get_contents("php://input");
    $decoded = json_decode($content);

    $query = "update categories set `name` = '".$decoded->name."' where id = '".$decoded->id."'";

    mysqli_query($db, $query);
    echo "Succesfully updated.";
}

