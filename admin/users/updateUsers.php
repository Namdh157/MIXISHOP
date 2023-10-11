<?php
require_once '../../model/user.php';
$id = $_GET['id'];
$user = getOneUser($id);
if (isset($_POST['btnSave']) && $_POST['btnSave']) {
    $nameUser = $_POST['userName'];
    $nameAcc = $_POST['nameAcc'];
    $password = $_POST['passwordUser'];
    if (empty($_FILES['imageUser']['name'])) {
        $imageUser = $user[0]['image'];
    } else {
        move_uploaded_file($_FILES['imageUser']['tmp_name'],'../../'.$imageUser);
        $imageUser = 'assets/image/' . $_FILES['imageUser']['name'];
    }
    $emailUser = $_POST['emailUser'];
    $addressUser = $_POST['addressUser'];
    $phoneUser = $_POST['phoneUser'];
    $roleUser =  intval($_POST['roleUser']);

    updateUsers($id,$nameUser,$password, $nameAcc, $imageUser, $emailUser, $addressUser, $phoneUser, $roleUser);
    header("Location:../index.php?type=Users");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <section class="h-100 h-custom" style="background-color: #00d2d4">
        <div class="return p-2 "><a class="p-3 rounded" href="../index.php?type=Users" style="background-color: #b33939">Quay lại</a></div>
        <div class="container h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6 py-5">
                    <div class="card rounded-3">
                        <img src="../../assets/image/Ảnh-bia-mixishop-1-1536x585.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" width="100%">
                        <div class="card-body">
                            <h3 class=" pb-md-0 mb-md-5 px-md-2"> Cập nhật lại người dùng :  <?php echo $user[0]['user_name'] ?></h3>

                            <form class="px-md-2" method="post" enctype="multipart/form-data">
                                <div class="form-outline">
                                    <label class="form-label" for="nameProduct">Tên tài khoản</label>
                                    <input type="text" id="nameProduct" name="userName" class="form-control" value="<?php echo $user[0]['user_name'] ?>" />
                                </div>

                                <div class="row">
                                    <div class="form-outline datepicker">
                                        <label for="priceProduct" class="form-label">Tên đăng nhập</label>
                                        <input type="text" name="nameAcc" class="form-control" id="exampleDatepicker1" value="<?php echo $user[0]['name'] ?>" />
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="passwordUser">Mật khẩu</label>
                                    <input type="text" name="passwordUser" class="form-control" id="passwordUser" value="<?php echo $user[0]['password'] ?>" />
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="customFile">Hình ảnh</label>
                                            <input type="file" name="imageUser" class="form-control" id="customFile" />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="role">Chức vụ</label>
                                    <select name="roleUser" class="select w-100" id="role">
                                        <?php foreach(getAllUsers() as $value) { ?>
                                            <option value=0>Khách hàng</option> 
                                            <option value=1>Thành viên</option>                                     
                                            <option value=10>Admin(Quản trị viên)</option>   
                                        <?php } ?>                                  
                                    </select>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="email">Email</label>
                                            <input name="emailUser" id="email" class="form-control" value="<?php echo $user[0]['email'] ?>"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="address">Địa chỉ</label>
                                            <input name="addressUser" id="address" class="form-control" value="<?php echo $user[0]['address'] ?>"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="phone">Số điện thoại</label>
                                            <input name="phoneUser" id="phone" class="form-control" value="<?php echo $user[0]['phone'] ?>"></input>
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