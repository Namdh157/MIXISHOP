<?php
require_once '../model/count.php';
require_once '../model/checkRole.php';
require_once '../model/category.php';
require_once '../model/product.php';
require_once '../model/user.php';
require_once '../model/cart.php';
require_once '../model/comment.php';
require_once 'component/Function.php';

$label = [];
$datas = [];
foreach (countChar() as $count) {
    array_push($label, $count['name_category']);
    array_push($datas, $count['count']);
}
$account = checkRole();
if (empty($account)) {
    header("Location:../view/login/");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị Website</title>
    <link rel="icon" class="rounded-circle" href="../assets/image/avatar (2).jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<?php include '../assets/css/style.php' ?>

<body>
    <div class="container-admin bg-body-secondary">
        <nav class="px-3 navbar navbar-expand-lg bg-black" style="--bs-bg-opacity: .4">
            <a class="navbar-brand me-2 fs-2 fw-bold" href="index.php">
                <span class="text-secondary">THE&nbsp;</span>
                <span class="text-white">SOUTHDANG</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarButtonsExample" style="width:fit-content">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../index.php">Quay về trang web</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <img class="mx-3 rounded-circle" src="../<?php echo $account->users['image'] ?>" alt="">
                <span class="fw-bold"><?php echo $account->users['name'] ?></span>
            </div>
        </nav>
        <div class="container-navbar ">
            <?php include 'component/Header.php' ?>
        </div>
        <div class="container-content">
            <?php
            if (isset($_GET['type'])) {
                $type = $_GET['type'];
                switch ($type) {
                    case 'Category':
                        include 'category/adminCategory.php';
                        break;
                    case 'Products' :
                        include 'products/adminProduct.php';
                        break;
                    case 'Users' :
                        include 'users/adminUsers.php';
                        break;
                    case 'Comments' :
                        include 'comments/adminComments.php';
                        break;
                    case 'Order':
                        include 'order/adminOrder.php';
                        break;
                    default:
                        include 'component/Home.php';
                        break;
                }
            } else {
                include 'component/home.php';
            }
            ?>
        </div>
        <div class="footer">
            <?php
            include 'component/footer.php';
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php include_once "admin.php" ?>

</body>

</html>