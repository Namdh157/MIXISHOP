<?php
require_once '../../assets/api/pdo.php';
$id = $_GET['id'];
$category = pdo_query("SELECT * FROM category WHERE category.id= $id");

if (isset($_POST['btnSave']) && $_POST['btnSave']) {
    $nameCategory = $_POST['nameCategory'];
    pdo_execute("UPDATE `category` SET `name_category` = '$nameCategory' WHERE category.id = $id");
    header("Location:../index.php?type=Category");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>
    .h-custom {
        height: 100vh !important;
    }
    .return {
        width: fit-content;
        transform: translateY(50px);
    }

    .return a {
        text-decoration: none;
        font-weight: bold;
        color: #00d2d4;
    }
</style>

<body>

    <section class="h-100 h-custom" style="background-color: #00d2d4">
        <div class="return p-2 "><a class="p-3 rounded" href="../index.php?type=Category"
                style="background-color: #b33939">Quay lại</a></div>
        <div class="container h-100 ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8 col-xl-6 py-5">
                    <div class="card rounded-3">
                        <img src="../../assets/image/Ảnh-bia-mixishop-1-1536x585.jpg" class="w-100"
                            style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" width="100%">
                        <div class="card-body">
                            <h3 class=" pb-md-0 mb-md-5 px-md-2">
                                <?php echo $category[0]['name_category'] ?>
                            </h3>

                            <form class="px-md-2" method="post">
                                <div class="form-outline pb-4">
                                    <label class="form-label" for="nameCategory">Tên sản phẩm</label>
                                    <input type="text" id="nameCategory" name="nameCategory" class="form-control"
                                        value="<?php echo $category[0]['name_category'] ?>" />
                                </div>

                                <input value="Gửi" type="submit" name="btnSave" class="btn btn-lg mb-1"
                                    style="background-color: #00d2d4"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>