<?php
require_once 'pdo.php';
function getAllUsers() {
    $users = pdo_query("SELECT * FROM users");
    return $users;
}
function getOneUser($id) {
    $user = pdo_query("SELECT * FROM users WHERE users.id = $id");
    return $user;
}
function updateUsers($id, $nameUser, $password, $nameAcc, $imageUser, $emailUser, $addressUser, $phoneUser, $roleUser) {
    pdo_execute("UPDATE `users` SET `user_name`='$nameUser',`password`='$password',`name`='$nameAcc',`image`='$imageUser',`email`='$emailUser',
                `address`='$addressUser',`phone`='$phoneUser',`role`='$roleUser' WHERE users.id = $id");
}
function deleteUsers($id) {
    pdo_execute("DELETE users FROM users WHERE users.id = $id");
}
?>