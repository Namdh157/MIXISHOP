<?php
require_once '../../assets/api/pdo.php';
include '../component/ListProducts.php';
include '../component/Header.php';
include '../component/footer.php';

if (isset($_COOKIE['user'])) {
    $decodedUser = base64_decode($_COOKIE['user']);
    list($userName, $password) = explode(':', $decodedUser);
    $users = pdo_query("SELECT * FROM users WHERE users.user_name = '$userName' AND users.password = '$password'");
    $userId =  $users[0]['id'];
    $countCart = pdo_query("SELECT count(id) as count FROM cart WHERE cart.id_user = $userId");
} else {
    $users = '';
    $countCart = '';
}


$category =  pdo_query("SELECT * FROM category");
$productSeller = pdo_query("SELECT products.*, category.name_category from products JOIN category ON products.id_category = category.id ORDER BY products.view DESC LIMIT 12");
$productDiscount = pdo_query("SELECT products.*, category.name_category from products JOIN category ON products.id_category = category.id ORDER BY products.discount DESC LIMIT 9");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOUTH_DANG - Thương hiệu đồ áo hiệu, đồ lưu niệm đẹp chất </title>
    <link rel="icon" href="../../assets/image/avatar (2).jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<?php include '../../assets/css/style.php' ?>

<body>
    <div class="super_container">

        <div id="header">
            <div class="overlay"></div>
            <?php headerPage($category, $users,$countCart) ?>
        </div>

        <div class="containerHome">
            <div class="home_banner">
                <img src="../../assets/image/Ảnh-bia-mixishop-1-1536x585.jpg" width="100%" alt="">
            </div>
            <h1>BÁN CHẠY NHẤT
                <a href="#">
                    <p>XEM TẤT CẢ</p>
                </a>
            </h1>
            <div class="container-listProducts">
                <?php
                listProducts($productSeller);
                ?>
            </div>
            <div class="container-banner my-5 rounded">
                <div class="overlay"></div>

                <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                    <source src="../../assets/image/video-1598728053.mp4" type="video/mp4">
                </video>

                <div class="container h-100">
                    <div class="d-flex h-100 text-center align-items-center">
                        <div class="w-100 text-white">
                            <h3 class="display">SOURTDANG</h3>
                            <p class="lead">Cập nhât về thông tin sản phẩm mới</p>
                            <a href="#" class="fanpage">FANPAGE</a>
                            <a href="#" class="instagram">INSTAGRAM</a>
                        </div>
                    </div>
                </div>
            </div>
            <h1>Các sản phẩm đang giảm giá</h1>
            <div class="container-listProducts">
                <?php
                listProducts($productDiscount);
                ?>
            </div>
        </div>


        <div id="footer">
            <?php footerPage($category) ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <?php include "pages.php" ?>
</body>

</html>