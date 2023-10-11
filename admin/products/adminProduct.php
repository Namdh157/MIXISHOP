<?php
if(isset($_POST['btnSave']) && $_POST['btnSave']) {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productImage = '../assets/image/'.$_FILES['image_url']['name'];
    move_uploaded_file($_FILES['image_url']['tmp_name'], $productImage);
    $productDescription = $_POST['product_description'];
    $productView = $_POST['product_view'];
    $productDiscount = $_POST['product_discount'];
    $productCategory = $_POST['product_category'];
    $productSpecial = $_POST['product_special'];

    addProduct($productName, $productPrice, $productImage, $productDescription, $productView, $productCategory, $productDiscount,$productSpecial);
}   
?>
<div class="container-products">
    <form method="post" class="m-3" >
        <input class="p-2 rounded" type="submit" value="Thêm Sản phẩm" name="btnAdd">
    </form>
    <?php if (isset($_POST['btnAdd']) && $_POST['btnAdd']) { ?>
        <form method="post" class="m-3" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label class="col-md-4 control-label" for="product_id">Tên sản phẩm</label>
                <div class="col-md-4">
                    <input id="product_id" name="product_name" placeholder="Tên sản phẩm" class="form-control input-md" required="" type="text">
                </div>
            </div>
            <div class="form-group mb-2">
                <label class="col-md-4 control-label" for="product_id">Giá sản phẩm</label>
                <div class="col-md-4">
                    <input id="product_id" name="product_price" placeholder="Giá sản phẩm" class="form-control input-md" required="" type="text">
                </div>
            </div>
            <div class="form-group mb-2">
                <label class="col-md-4 control-label" for="filebutton">Hình ảnh sản phẩm</label>
                <div class="col-md-4">
                    <input id="filebutton" name="image_url" class="input-file" type="file">
                </div>
            </div>
            <div class="form-group mb-2">
                <label class="col-md-4 control-label" for="product_name_fr">Mô tả sản phẩm</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="product_name_fr" name="product_description"></textarea>
                </div>
            </div>
            <div class="form-group mb-2">
                <label class="col-md-4 control-label" for="product_name_fr">Lượt xem sản phẩm</label>
                <div class="col-md-4">
                    <input id="product_name_fr" name="product_view" placeholder="Lượt xem sản phẩm" class="form-control input-md" type="text">

                </div>
            </div>
            <div class="form-group mb-2">
                <label class="col-md-4 control-label" for="product_name_fr">Giảm giá sản phẩm</label>
                <div class="col-md-4">
                    <input id="product_name_fr" name="product_discount" placeholder="Giảm giá sản phẩm" class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group mb-2">
                <label class="col-md-4 control-label" for="product_category">Loại sản phẩm</label>
                <div class="col-md-4">
                    <select id="product_category" name="product_category" class="form-control" required>
                        <option value="">Lựa chọn loại sản phẩm </option>
                        <?php foreach (getALLCategory() as $value) { ?>
                            <option value="<?php echo $value['id'] ?>">
                                <?php echo $value['name_category'] ?>
                            </option>
                          <?php  } ?>
                    </select>
                </div>
            </div>
            <div class="form-group mb-2">
                <label class="col-md-4 control-label" for="product_name_fr">Đặc biệt</label>
                <div class="col-md-4">
                    <input id="product_name_fr" name="product_special" placeholder="Đặc biệt" class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <input type="submit" name="btnSave" class="btn btn-primary" value="Thêm mới"></input>
                </div>
            </div>
            <br>
        </form>
    <?php  } ?>
    <div class="list-products">
        <div class="list-table">
            <h3 class="text-center">Danh sách sản phẩm</h3>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-0">STT</th>
                        <th scope="col" class="col-2">Tên sản phẩm</th>
                        <th scope="col" class="col-0">Giá</th>
                        <th scope="col" class="col-3">Hình ảnh</th>
                        <th scope="col" class="col-1">Mô tả</th>
                        <th scope="col" class="col-1">Lượt xem</th>
                        <th scope="col" class="col-1">Giảm giá</th>
                        <th scope="col" class="col-1">Danh mục</th>
                        <th scope="col" class="col-2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (getProductCategory() as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td> <?php echo $value['name_product'] ?></td>
                            <td> <?php echo number_format($value['price'], 0 , '.', ',') ?>₫</td>
                            <td>
                                <img src="../<?php echo $value['img'] ? $value['img'] : '' ?>" width="100px">
                            </td>
                            <td> <?php echo $value['description'] ? $value['description'] : 'Không mô tả' ?></td>
                            <td> <?php echo $value['view'] ? $value['view'] : 'Chưa có dữ liệu lượt xem' ?></td>
                            <td> <?php echo $value['discount'] ?>% </td>
                            <td> <?php echo $value['id_category'] == $value['id'] ? $value['name_category'] : '' ?></td>
                            <td>
                                <a href="products/updateProduct.php?id=<?php echo $value[0] ?>">
                                    <button class="bg-info text-dark rounded  p-2">Sửa</button>
                                </a>
                                <a href="products/deleteProduct.php?id=<?php echo $value[0] ?>">
                                    <button class="bg-danger text-dark rounded p-2 ms-2">Xóa</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>