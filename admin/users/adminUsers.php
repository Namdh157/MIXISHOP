<?php
$users = pdo_query("SELECT * FROM users")
?>
<div class="list-products">
    <div class="list-table">
        <h3 class="text-center">Danh sách người dùng</h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="col-0">STT</th>
                    <th scope="col" class="col-1">Tên đăng nhập</th>
                    <th scope="col" class="col-1">Mật khẩu</th>
                    <th scope="col" class="col-1">Họ và tên</th>
                    <th scope="col" class="col-1">Hình ảnh</th>
                    <th scope="col" class="col-0">Email</th>
                    <th scope="col" class="col-1">Địa chỉ</th>
                    <th scope="col" class="col-0">Số điện thoại</th>
                    <th scope="col" class="col-0">Chức vụ</th>
                    <th scope="col" class="col-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?php echo $key + 1 ?></th>
                        <td> <?php echo $value['user_name'] ?></td>
                        <td> <?php echo $value['password'] ?></td>
                        <td> <?php echo $value['name'] ?> </td>
                        <td>
                            <img src="../assets/image/<?php echo $value['image'] ? $value['image'] : '' ?>" width="100px">
                        </td>
                        <td> <?php echo $value['email'] ?></td>
                        <td> <?php echo $value['address']? $value['address'] : 'Chưa có địa chỉ' ?></td>
                        <td> <?php echo $value['phone']? $value['phone'] : 'Chưa có số điện thoại' ?></td>
                        <td> <?php 
                            if ($value['role'] == 0) {
                                echo "Khách hàng";
                            }
                            if ($value['role'] == 1) {
                                echo 'Thành viên';
                            }
                            if ($value['role'] == 10) {
                                echo 'admin(Quản trị viên)';
                            }
                        ?></td>
                        <td>
                            <a href="users/updateUsers.php?id=<?php echo $value['id'] ?>">
                                <button class="bg-info text-dark rounded col-1 p-1">Sửa</button>
                            </a>
                            <a href="users/deleteUsers.php?id=<?php echo $value['id'] ?>">
                                <button class="bg-danger text-dark rounded col-1 p-1 ms-2">Xóa</button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>