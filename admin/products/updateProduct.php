<?php
require_once '../../model/category.php';
require_once '../../model/product.php';
$id = $_GET['id'];
 $product =  getOneProduct($id);

if (isset($_POST['btnSave']) && $_POST['btnSave']) {
    $nameProduct = $_POST['nameProduct'];
    $priceProduct = $_POST['priceProduct'];
    $categoryProduct = $_POST['categoryProduct'];
    if (empty($_FILES['imageProduct']['name'])) {
        $imageProduct = $product[0]['img'];
    } else {
        $saveImage = '../../assets/image/'. $_FILES['imageProduct']['name'];
        move_uploaded_file($_FILES['imageProduct']['tmp_name'], $saveImage);
        $imageProduct = 'assets/image/' . $_FILES['imageProduct']['name'];
    }
    $descriptionProduct = $_POST['descriptionProduct'];
    $discountProduct = $_POST['discountProduct'];
    $specialProduct = $_POST['specialProduct'];
    updateProduct($id, $nameProduct, $priceProduct, $imageProduct, $descriptionProduct, $categoryProduct,  $discountProduct, $specialProduct);
    header("Location:../index.php?type=Products");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>
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
        <div class="return p-2 "><a class="p-3 rounded" href="../index.php?type=Products" style="background-color: #b33939">Quay lại</a></div>
        <div class="container h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6 py-5">
                    <div class="card rounded-3">
                        <img src="../../assets/image/Ảnh-bia-mixishop-1-1536x585.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" width="100%">
                        <div class="card-body">
                            <h3 class=" pb-md-0 mb-md-5 px-md-2"><?php echo $product[0]['name_product'] ?></h3>

                            <form class="px-md-2" method="post" enctype="multipart/form-data">
                                <div class="form-outline">
                                    <label class="form-label" for="nameProduct">Tên sản phẩm</label>
                                    <input type="text" id="nameProduct" name="nameProduct" class="form-control" value="<?php echo $product[0]['name_product'] ?>" />
                                </div>

                                <div class="row">
                                    <div class="form-outline datepicker">
                                        <label for="priceProduct" class="form-label">Giá sản phẩm</label>
                                        <input type="text" name="priceProduct" class="form-control" id="exampleDatepicker1" value="<?php echo number_format($product[0]['price'], 0, '.', ',') ?>" />
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="categoryProduct">Loại sản phẩm</label>
                                    <select class="select w-100" id="categoryProduct" name="categoryProduct">
                                        <?php foreach (getALLCategory() as $values) { ?>
                                            <option value="<?php echo $values['id'] ?>"> <?php echo $values['name_category'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="row mb-4">
                                    <div class="col text-center">
                                        <img src="../../<?php echo $product[0]['img'] ?>" alt="ảnh sản phẩm" width="60">
                                        <div class="form-outline">
                                            <label class="form-label" for="customFile">Hình ảnh</label>
                                            <input type="file" name="imageProduct" class="form-control" id="customFile" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="description">Ghi chú</label>
                                            <textarea name="descriptionProduct" id="description" class="form-control" value="<?php echo $product[0]['name_product'] ?>"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="discount">Giảm giá</label>
                                            <input name="discountProduct" id="discount" class="form-control" value="<?php echo $product[0]['discount'] ?>"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="special">Đặc biệt</label>
                                            <input name="specialProduct" id="special" class="form-control" value="<?php echo $product[0]['special'] ?>"></input>
                                        </div>
                                    </div>
                                </div>

                                <input value="Gửi" type="submit" name="btnSave" class="btn btn-lg mb-1" style="background-color: #00d2d4"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>