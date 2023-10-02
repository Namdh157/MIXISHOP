<?php

?>

<div class="container-order">
    <div class="list-category">
        <div class="list-table">
            <h3 class="text-center">Danh sách danh mục</h3>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-2">STT</th>
                        <th scope="col" class="col-5">Số lượng</th>
                        <th scope="col" class="col-5">Số lượng</th>
                        <th scope="col" class="col-5">Số lượng</th>
                        <th scope="col" class="col-5">Số lượng</th>
                        <th scope="col" class="col-5">Số lượng</th>
                        <th scope="col" class="col-5">Số lượng</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $key => $value) { ?>
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