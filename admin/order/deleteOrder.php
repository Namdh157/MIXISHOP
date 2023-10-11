<?php
require_once '../../model/cart.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
deleteOrder($id);
header("location:../index.php?type=Order");
?>