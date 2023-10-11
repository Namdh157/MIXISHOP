<?php
require_once 'pdo.php';
function getAllCart($id) {
    $carts = pdo_query_one("SELECT *, cart.*, COUNT(cart.id) as count, SUM(products.price) as total FROM users JOIN cart ON users.id = cart.id_user JOIN products ON cart.id_product = products.id WHERE cart.id_user = $id");
    return $carts;
}
function deleteCart($id) {
    pdo_execute("DELETE FROM cart WHERE cart.id = $id");
}

function getAllCarts() {
    $orders = pdo_query("SELECT *  FROM category JOIN products ON category.id = products.id_category JOIN cart ON products.id = cart.id_product JOIN users ON cart.id_user = users.id ORDER BY cart.id DESC");
    return $orders;
}
function getOneOrder($id) {
    $orders = pdo_query_one("SELECT * FROM users JOIN cart ON users.id = cart.id_user JOIN products ON cart.id_product = products.id WHERE cart.id = $id");
    return $orders;
}
function addOrder($idProduct, $quantity, $idUser, $time) {
    pdo_execute("INSERT INTO `cart`(`id_product`, `quantity`, `id_user`, `time`) VALUES ('$idProduct','$quantity','$idUser','$time')");
}
function updateOrder($id, $idProduct, $quantity ,$idUser) {
    pdo_execute("UPDATE `cart` SET `id_product`='$idProduct',`quantity`='$quantity',`id_user`='$idUser' WHERE cart.id = $id");
}
function deleteOrder($id) {
    pdo_execute("DELETE FROM `cart` WHERE cart.id = $id");
}
?>