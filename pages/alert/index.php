<?php
    require_once '../../assets/api/pdo.php';
    include '../component/Header.php';
    include '../component/footer.php';


    $category =  pdo_query("SELECT * FROM category");


    if (isset($_COOKIE['user'])) {
        $decodedUser = base64_decode($_COOKIE['user']);
        list($userName, $password) = explode(':', $decodedUser);
        $users = pdo_query("SELECT * FROM users WHERE users.user_name = '$userName' AND users.password = '$password'");
        $userId =  $users[0]['id'];
        $countCart = pdo_query("SELECT count(id) as count FROM cart WHERE cart.id_user = $userId");
        
    } else {
        $users = '';
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="../../assets/image/avatar (2).jpg">
    <title>Thông báo</title>
</head>
<?php include '../../assets/css/style.php' ?>

<body>
    <div id="header">
        <?php
        headerPage($category, $users, $countCart)
        ?>
    </div>

    <main id="main">
        <?php include '../component/Alert.php' ?>
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