<?php

require_once 'pdo.php';
    function getALLCategory() {
        $category = pdo_query("SELECT * FROM category ORDER BY category.id DESC");
        return $category;
    }
    function getOneCategory($id) {
        $category = pdo_query("SELECT * FROM category WHERE category.id= $id");
        return $category;
    }
    function addCategory($nameCategory) {
        pdo_execute("INSERT INTO category(name_category) VALUES('$nameCategory')");
    }
    function updateCategory($id, $nameCategory) {
        pdo_execute("UPDATE `category` SET `name_category` = '$nameCategory' WHERE category.id = $id");
    }
    function deleteCategory($id) {
        pdo_execute("DELETE FROM category WHERE category.id = $id");
    }
    function getCategoryCurrent($id) {
        $category = pdo_query("SELECT * FROM category WHERE category.id = $id");
        return $category;
    }
?>