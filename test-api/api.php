<?php
header('Content-TYPE: application/json; charset=utf-8');
require_once "config.php";

//Get products from DB
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_SERVER['REQUEST_URI'] == '/test-task/api.php/products' || $_SERVER['REQUEST_URI'] == '/test-task/api.php/products/') {
        $query = "select * from products";
        getProducts($db, $query);
    }
    if ($_SERVER['REQUEST_URI'] == '/test-task/api.php/products/?category_id=' + $category_id) {
        $query = "select * from products where category_id='".$_GET['category_id']."'";
        getProducts($db, $query);
    }
    if ($_SERVER['REQUEST_URI'] == '/test-task/api.php/products/?id=' + $id) {
        $query = "select * from products where id='".$_GET['id']."'";
        getProducts($db, $query);
    }
    if ($_SERVER['REQUEST_URI'] == '/test-task/api.php/categories' || $_SERVER['REQUEST_URI'] == '/test-task/api.php/categories/') {
        $query = "select * from categories";
        getCategories($db, $query);
    }
}


function getCategories($db, $query) {
    $res = mysqli_query($db, $query);
    if ($res){
        while($row = $res->fetch_assoc()) {
            $result[] = [
                'id'        => $row['id'],
                'name'      => $row['name']
            ];
        }
        echo json_encode($result);
    } else { echo 'error'; }
}

function getProducts($db, $query) {
    $res = mysqli_query($db, $query);
    if ($res){
        while($row = $res->fetch_assoc()) {
            $result[] = [
                'id'               => $row['id'],
                'category_id'      => $row['category_id'],
                'manufacturer'     => $row['manufacturer'],
                'model'            => $row['model'],
                'price'            => $row['price']
            ];
        }
        echo json_encode($result);
    } else { echo 'error'; }
}
