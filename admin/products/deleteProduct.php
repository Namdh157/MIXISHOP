<?php 
require_once '../../model/product.php';
$id = $_GET['id'];

    deleteProduct($id);
    
    header("location:../index.php?type=Products");
    exit();
