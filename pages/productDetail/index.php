<?php
require_once '../../assets/api/pdo.php';
include '../component/ListProducts.php';
include '../component/Header.php';
include '../component/footer.php';
include '../component/Toast.php';

if (isset($_COOKIE['user'])) {
    $decodedUser = base64_decode($_COOKIE['user']);
    list($userName, $password) = explode(':', $decodedUser);
    $users = pdo_query("SELECT * FROM users WHERE users.user_name = '$userName' AND users.password = '$password'");
    $userId =  $users[0]['id'];
    $userName = $users[0]['name'];
    $userImage = $users[0]['image'];
    $userEmail = $users[0]['email'];    
    $userAddress = $users[0]['address'];
    $userPhone = $users[0]['phone'];
    $countCart = pdo_query("SELECT count(id) as count FROM cart WHERE cart.id_user = $userId");

} else {
    $users = '';
    $countCart = '';
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}



$category = pdo_query("SELECT * FROM category");
$productCurrent = pdo_query("SELECT products.* , category.name_category FROM products JOIN category ON products.id_category = category.id WHERE products.id = $id");

$productId =  $productCurrent[0]['id'];
$productName =  $productCurrent[0]['name_product'];
$productPrice = $productCurrent[0]['price'];
$productImage = $productCurrent[0]['img'];
$productCategory = $productCurrent[0]['id_category'];



if (isset($_POST['btnSave'])) {
    if (empty($users)) {
        toastPage('Bạn phải đăng nhập mới thêm được giỏ hàng');
    } else {
        pdo_execute("INSERT INTO `cart`(`id_product`, `quantity`, `id_user`, `name_user`, `image_user`, `email_user`, `address_user`, 
        `phone_user`, `name_product`, `price_product`, `img_product`, `category_product`) 
        VALUES ('$productId',1,'$userId','$userName','$userImage','$userEmail','$userAddress','$userPhone','$productName',
        '$productPrice','$productImage','$productCategory')");
        header("Location:../productDetail/");
        toastPage('Bạn đã thêm vào giỏ hàng thành công');
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $productCurrent[0]['name_product'] ?></title>
    <link rel="icon" href="../../assets/image/avatar (2).jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<?php include '../../assets/css/style.php' ?>

<style>
    .preview-thumbnail li a img {
        height: 180px;
        object-fit: cover;
    }

    .preview-pic .tab-pane.active img {
        height: 600px;
        object-fit: fill;

    }
</style>

<body>
    <div id="header">
        <?php headerPage($category, $users, $countCart); ?>
    </div>

    <main id="main">
        <div class="container mt-5">
            <h5><a href="../home/">TRANG CHỦ / </a><a href="../category/?id=<?php echo $category[0]['id'] ?>" class="text-uppercase"><?php echo $category[0]['name_category'] ?></a></h5>
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img src="../<?php echo $productCurrent[0]['img'] ?>" /></div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li><a><img src="../<?php echo $productCurrent[0]['img'] ?>" /></a></li>
                                <li><a><img src="../../assets/image/avatar.jpg" /></a></li>
                                <li><a><img src="../../assets/image/avatar (2).jpg" /></a></li>
                                <li><a><img src="../../assets/image/background3.jpg" /></a></li>
                                <li><a><img src="../../assets/image/background5.jpg" /></a></li>
                            </ul>

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title"><?php echo $productCurrent[0]['name_product'] ?></h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <span class="review-no">41 đánh giá</span>
                            </div>
                            <p class="product-description"><?php echo empty($productCurrent[0]['description']) ? 'Chưa có mô tả' :  $productCurrent[0]['description'] ?></p>
                            <h4 class="price">Giá hiện tại: <span><?php echo number_format($productCurrent[0]['price'], 0, '.', ',') ?>₫</span></h4>
                            <p class="vote"><strong>Danh mục: </strong><a href="../category/<?php echo $category[0]['name_category'] ?>"> <?php echo $category[0]['name_category'] ?></a></strong></p>
                            <h5 class="sizes">

                            </h5>
                            <h5 class="colors">

                            </h5>
                            <div class="action">
                                <form method="post">
                                    <input class="add-to-cart btn btn-default" type="submit" value="Thêm vào giỏ hàng" name="btnSave">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <div id="footer">
        <?php footerPage($category) ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <?php include "../home/pages.php" ?>
</body>

</html>