<?php 
require_once '../../assets/api/pdo.php';
$id = $_GET['id'];

    pdo_execute("DELETE FROM category WHERE category.id = $id");
    header("location:../index.php?type=Category");
    exit();
?>