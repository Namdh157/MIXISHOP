<?php
require_once 'pdo.php';
function getAllComments() {
    $comment = pdo_query("SELECT * FROM category JOIN products ON category.id = products.id_category JOIN comment ON products.id = comment.id_pro JOIN users ON comment.id_user = users.id ORDER BY comment.id_cmt DESC");
    return $comment;
}

function getAllCommentId($value,$id) {
    $comment =  pdo_query("SELECT * FROM users JOIN comment ON users.id = comment.id_user JOIN products ON comment.id_pro = products.id  WHERE comment.$value = $id");
    return $comment;
}
function getOneComment($id) {
    $comment =  pdo_query_one("SELECT * FROM users JOIN comment ON users.id = comment.id_user JOIN products ON comment.id_pro = products.id  WHERE comment.id_cmt = $id");
    return $comment;
}
function addComment($comment, $idUser, $idProduct, $date) {
    pdo_execute("INSERT INTO `comment`(`content`, `id_user`, `id_pro`, `date_comment`) VALUES ('$comment','$idUser','$idProduct','$date')");
}
function updateComment($id,$content) {
    pdo_execute("UPDATE `comment` SET `content`='$content' WHERE comment.id_cmt = $id");
}
function deleteComment($id) {
    pdo_execute("DELETE FROM `comment` WHERE comment.id_cmt = $id");
}

?>