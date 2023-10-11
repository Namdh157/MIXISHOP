<?php
require_once '../../model/comment.php';

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
}
deleteComment($id);
header('Location:../index.php?type=Comments');
?>