<?php 
require_once '../../model/category.php';
$id = $_GET['id'];
    deleteCategory($id);
    header("location:../index.php?type=Category");
    exit();
?>