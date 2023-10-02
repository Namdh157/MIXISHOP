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
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
} 
$category = pdo_query("SELECT * FROM category");
$categoryCurrent = pdo_query("SELECT * FROM category WHERE category.id = $id");
$listProduct = pdo_query("SELECT products.*, category.* FROM products JOIN category ON products.id_category = category.id WHERE category.id = $id");
$countProduct = pdo_query("SELECT products.*, category.*, COUNT(products.id) as count FROM products JOIN category ON products.id_category = category.id WHERE category.id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $countProduct[0]['name_category'] ?></title>
    <link rel="icon" href="../../assets/image/avatar (2).jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<?php include '../../assets/css/style.php' ?>

<body>
    <div id="header">
        <?php headerPage($category, $users, $countCart); ?>
    </div>

    <main id="main">
        <div class="container my-3">
            <div class="container-title d-flex justify-content-between align-self-center">
                <div class="title-left ">
                    <h3 class="fs-2 fw-bold"><?php echo $categoryCurrent[0]['name_category']  ?></h3>
                    <p class="fs-6 text-decoration-none"><a href="../home/" class="">TRANG CHỦ  /&ensp;</a> <span class="fw-bolder text-dark"> <?php echo $categoryCurrent[0]['name_category'] ?></span></p>
                </div>
                <p class="fs-6">Hiện thị <?php echo $countProduct[0]['count'] ?> kết quả</p>
                <div class="title right">
                    
                    <select class="form-select" name="" aria-label="Default select example">
                        <option value="">Mới nhất</option>
                        <option value="">Thứ tự theo mức phổ biến</option>
                        <option value="">Thứ tự theo mức đánh giá</option>
                        <option value="">Thứ tự theo giá: thấp đến cao</option>
                        <option value="">Thứ tự theo giá: cao đến thấp</option>
                    </select>
                </div>
            </div>
            <div class="row g-0">
                <nav id="sidebarMenu" class="d-lg-block  col-2 col-md-3">
                    <div class="position-sticky">
                        <h4 class="fw-bold">DANH MỤC SẢN PHẨM</h4>
                        <div class="list-group list-group-flush mt-4 fs-5">
                            <?php foreach ($category as $value) { ?>
                                <a href="../category/?id=<?php echo $value['id'] ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                    <span><?php echo $value['name_category'] ?></span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
                <div class="listProduct col-12 col-md-9">
                    <?php listProducts($listProduct) ?>
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