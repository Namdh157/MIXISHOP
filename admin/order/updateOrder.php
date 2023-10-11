<?php
require_once '../../model/cart.php';
require_once '../../model/product.php';
require_once '../../model/user.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$order = getOneOrder($id);
$idProduct = $order['id_product'];
$idUser = $order['id_user'];
 
if (isset($_POST['btnSave']) && $_POST['btnSave']) {
    $idProduct = $_POST['product'];
    $idUser = $_POST['customer'];
    $quantity = $_POST['quantity'];
    updateOrder($id, $idProduct, $quantity, $idUser);
    header("Location:../index.php?type=Order");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật đơn hàng </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <section class="vh-100 h-custom" style="background-color: #00d2d4">
        <div class="return p-2 "><a class="p-3 rounded" href="../index.php?type=Order" style="background-color: #b33939">Quay lại</a></div>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6 py-5">
                    <div class="card rounded-3">
                        <img src="../../assets/image/Ảnh-bia-mixishop-1-1536x585.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" width="100%">
                        <div class="card-body">
                            <h3 class=" pb-md-0 mb-md-5 px-md-2"> Cập nhật lại đơn hàng của khách hàng <br> <?php echo $order['name'] ?></h3>

                            <form class="px-md-2" method="post" enctype="multipart/form-data">
                                <div class="form-outline">
                                    <label class="form-label" for="quantity">Số lượng sản phẩm</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="<?php echo $order['quantity'] ?>" />
                                </div>

                                <div class="row">
                                    <div class="form-outline datepicker">
                                        <label for="priceProduct" class="form-label">Sản phẩm</label>
                                        <select name="product" id="" class="select w-100">
                                            <?php foreach (getAllProduct() as $value) { ?>
                                                <option value="<?php echo $value['id'] ?>" <?php echo getOneProduct($idProduct)[0]['id'] == $value['id'] ? 'selected' : '' ?>>
                                                    <?php echo $value['name_product'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="role">Khách hàng</label>
                                    <select name="customer"  name="roleUser" class="select w-100" id="role">
                                        <?php foreach (getAllUsers() as $value) { ?>
                                            <option value="<?php echo $value['id'] ?>" <?php echo getOneUser($idUser)[0]['id'] == $value['id'] ? 'selected' : '' ?>>
                                                <?php echo $value['name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
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