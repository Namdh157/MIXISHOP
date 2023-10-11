<?php
require_once '../../model/user.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
deleteUsers($id);
header("location:../index.php?type=Users");
?>