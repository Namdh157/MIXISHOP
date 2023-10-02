<?php 
require_once '../../assets/api/pdo.php';
$id = $_GET['id'];

    pdo_execute("DELETE FROM products WHERE products.id_category = $id");
    header("location:../index.php?type=Products");
    exit();
?>