<?php
require_once 'pdo.php';

function getAllProduct()
{
    $products = pdo_query("SELECT products.* FROM products ORDER BY products.id DESC");
    return $products;
}
function getProductCategory()
{
    $products = pdo_query("SELECT products.*, category.* FROM products JOIN category ON products.id_category = category.id ORDER BY products.id DESC");
    return $products;
}
function getOneProductCategory($id)
{
    $product = pdo_query_one("SELECT products.*, category.name_category FROM products JOIN category ON products.id_category = category.id WHERE products.id = $id");
    return $product;
}
function getOneProduct($id)
{
    $product = pdo_query("SELECT * FROM products WHERE products.id = $id");
    return $product;
}
function addProduct($productName, $productPrice, $productImage, $productDescription, $productView, $productCategory, $productDiscount, $productSpecial)
{
    pdo_execute("INSERT INTO products(`name_product`, `price`, `img`, `description`, `view`, `id_category`, `discount`, `special`) VALUES 
    ('$productName','$productPrice','$productImage','$productDescription','$productView','$productCategory','$productDiscount','$productSpecial')");
}
function updateProduct($id, $nameProduct, $priceProduct, $imageProduct, $descriptionProduct, $categoryProduct, $discountProduct, $specialProduct)
{
    pdo_execute("UPDATE `products` SET `name_product`='$nameProduct',`price`='$priceProduct',`img`='$imageProduct',
    `description`='$descriptionProduct',`id_category`='$categoryProduct',`discount`='$discountProduct',`special`='$specialProduct' WHERE products.id = $id");
}
function deleteProduct($id)
{
    pdo_execute("DELETE FROM products WHERE products.id = $id");
}

function productSeller()
{
    $productSeller = pdo_query("SELECT products.*, category.name_category from products JOIN category ON products.id_category = category.id ORDER BY products.view DESC LIMIT 12");
    return $productSeller;
}
function productDiscount()
{
    $productDiscount = pdo_query("SELECT products.*, category.name_category from products JOIN category ON products.id_category = category.id ORDER BY products.discount DESC LIMIT 9");
    return $productDiscount;
}
function searchProduct($products) {
    $listProduct = pdo_query("SELECT products.*, category.*, counts.count as count FROM products JOIN category ON products.id_category = category.id JOIN (SELECT COUNT(id) as count FROM products WHERE name_product LIKE '%a%') as counts WHERE products.name_product LIKE '%$products%';");
    return $listProduct;
}
function listProductsCategory($id) {
    $products = pdo_query("SELECT products.*, category.* FROM products JOIN category ON products.id_category = category.id WHERE category.id = $id");
    return $products;
}
function countProducts($id) {
    $products =pdo_query("SELECT products.*, category.*, COUNT(products.id) as count FROM products JOIN category ON products.id_category = category.id WHERE category.id = $id");
    return $products;
}
