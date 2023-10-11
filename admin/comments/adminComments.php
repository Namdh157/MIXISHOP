
<div class="container-order">
    <div class="list-category">
        <div class="list-table">
            <h3 class="text-center">Danh sách bình luận</h3>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col" class="col-3">Thông tin khách hàng</th>
                        <th scope="col" class="col-3">Thông tin sản phẩm</th>
                        <th scope="col" class="col-2">Nội dung bình luận</th>
                        <th scope="col" class="col-1">Thời gian</th>
                        <th scope="col-3">Hành động</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach (getAllComments() as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td> 
                                Họ và tên : <?php echo $value['user_name'] ?> </br>
                                Hình ảnh : <img src="../<?php echo $value['image'] ?>" alt="ảnh khách hàng" width="100"><br>
                                Email : <?php echo $value['email'] ?> </br>
                                Địa chỉ : <?php echo $value['address'] ?> </br>
                                Số điện thoại : <?php echo $value['phone'] ?> </br>
                            </td>
                            <td> 
                                Tên : <?php echo $value['name_product'] ?> </br>
                                Giá : <?php echo number_format($value['price'], 0 , '.', ',') ?>₫ </br>
                                Hình ảnh : <img src="../<?php echo $value['img'] ?>" alt="Ảnh sản phẩm" width="100"> </br>
                                Loại sản phẩm : <?php echo $value['name_category'] ?> </br>

                            </td>
                            <td><?php echo $value['content'] ?></td>
                            <td><?php echo $value['date_comment'] ?></td>
                            <td>
                                <a href="comments/updateComment.php?id=<?php echo $value['id_cmt'] ?>">
                                    <button class="bg-info text-dark rounded p-2">Sửa</button>
                                </a>
                                <a href="comments/deleteComment.php?id=<?php echo $value['id_cmt'] ?>">
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