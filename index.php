<?php
require_once 'model/checkRole.php';
require_once 'model/category.php';
require_once 'model/product.php';
require_once 'model/count.php';
require_once 'model/user.php';
require_once 'model/cart.php';
require_once 'model/comment.php';
require_once 'view/component/ListProducts.php';
require_once 'view/component/Header.php';
require_once 'view/component/Comment.php';
require_once 'view/component/footer.php';
require_once 'view/component/Toast.php';

$account = checkRole();
$users = $account->users;
$countCart = $account->countCart;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $productCurrent = getOneProductCategory($id);
} else {
    $id = null;
}


$category =  getALLCategory();
$productSeller = productSeller();
$productDiscount = productDiscount();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOUTH_DANG - Thương hiệu đồ áo hiệu, đồ lưu niệm đẹp chất </title>
    <link rel="icon" class="rounded-circle" href="assets/image/avatar (2).jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<?php include 'assets/css/style.php' ?>

<body>
    <div class="super_container">

        <div id="header">
            <?php headerPage($category, $users, $countCart) ?>
        </div>

        <main id="mainPage">
            <?php
                if (isset($_GET['type'])) {
                    $type = trim($_GET['type']);

                    switch ($type) {

                        case 'Category': 
                            include 'view/category/index.php';
                            break;
                        case 'Alert': 
                            include 'view/alert/index.php';
                            break;
                        case 'ProductDetail': 
                            include 'view/productDetail/index.php';
                            break;
                        case 'Cart':
                            include 'view/cart/index.php';
                            break;
                        default: 
                            include 'view/home/index.php';
                            break;
                    }
                } else if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    include 'view/search/index.php';
                } else {
                    include 'view/home/index.php';
                }
                
            ?>
        </main>
        <div id="footer">
            <?php footerPage($category) ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <?php include "view/component/Javascript.php" ?>
</body>

</html>