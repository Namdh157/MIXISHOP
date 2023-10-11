<?php
if (isset($_POST['btnSave']) && $_POST['btnSave']) {
    $nameCategory = $_POST['nameCategory'];
    $isAdd = true;
    if ($nameCategory === getALLCategory()[0]['name_category']) {
        alert('Không thành công', 'Danh mục đã có vui lòng nhập lại', 'block');
        $isAdd = false;
    }
    if ($isAdd) {
        addCategory($nameCategory);
        echo '<script>window.location.href = "index.php?type=Category";</script>';
        exit();
    }
}
?>
<div class="container-category">
    <form method="post" class="m-3">
        <input class="p-2 rounded" type="submit" value="Thêm danh mục" name="btnAdd">
    </form>
    <?php if (isset($_POST['btnAdd']) && $_POST['btnAdd']) { ?>
        <form method="post" class="m-3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mã loại danh mục</label>
                <input type="text" class="form-control" id="exampleInputEmail1" disabled placeholder="Bạn không thể nhập ở đây">
                <div id="emailHelp" class="form-text">Mã loại danh mục sẽ được tăng tự động :D</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tên loại danh mục</label>
                <input type="text" class="form-control" required name="nameCategory" id="exampleInputPassword1">
            </div>
            <input type="submit" name="btnSave" class="btn btn-primary" value="Thêm mới"></input>
            <br>
        </form>
    <?php  } ?>
    <div class="list-category">
        <div class="list-table">
            <h3 class="text-center">Danh sách danh mục</h3>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-2">STT</th>
                        <th scope="col" class="col-5">Tên danh mục</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (getALLCategory() as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td> <?php echo $value['name_category'] ?></td>
                            <td>
                                <a href="category/updateCategory.php?id=<?php echo $value['id'] ?>">
                                    <button class="bg-info text-dark rounded col-1 p-1">Sửa</button>
                                </a>
                                <a href="category/deleteCategory.php?id=<?php echo $value['id'] ?>">
                                    <button class="bg-danger text-dark rounded col-1 p-1 ms-2">Xóa</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>