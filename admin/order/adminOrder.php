

<div class="container-fluid  order">
    <div class="list-category">
        <div class="list-table">
            <h3 class="text-center">Danh sách đơn hàng</h3>
            <table class="table table-hover table-bordered center-table">
                <thead>
                    <tr>
                        <th scope="col" class="col-0">STT</th>
                        <th scope="col" class="col-0">Số lượng</th>
                        <th scope="col" class="col-4">Thông tin khách hàng</th>
                        <th scope="col" class="col-4">Thông tin sản phẩm</th>
                        <th scope="col" class="col-1">Thời gian</th>
                        <th scope="col-3">Hành động</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach (getAllCarts() as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td> <?php echo $value['quantity'] ?></td>
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
                            <td><?php echo $value['time'] ?></td>
                            <td class="text-center">
                                <a href="order/updateOrder.php?id=<?php echo $value[11] ?>">
                                    <button class="bg-info text-dark rounded  p-2">Sửa</button>
                                </a>
                                <a href="order/deleteOrder.php?id=<?php echo $value[11] ?>">
                                    <button class="bg-danger text-dark rounded  p-2 ms-2">Xóa</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>