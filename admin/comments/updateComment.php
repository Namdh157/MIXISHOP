<?php
require_once '../../model/comment.php';

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$comment = getOneComment($id);

if(isset($_POST['btnSave']) && $_POST['btnSave']) {
$content = $_POST['content'];
echo $content;
updateComment($id, $content);
header("Location:../index.php?type=Comments");
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
        <div class="return p-2 "><a class="p-3 rounded" href="../index.php?type=Comments" style="background-color: #b33939">Quay lại</a></div>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6 py-5">
                    <div class="card rounded-3">
                        <img src="../../assets/image/Ảnh-bia-mixishop-1-1536x585.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" width="100%">
                        <div class="card-body">
                            <h3 class=" pb-md-0 mb-md-5 px-md-2"> Cập nhật lại comment của khách hàng <?php echo $comment['user_name'] ?></h3>

                            <form class="px-md-2" method="post">
                                <div class="form-outline">
                                    <label class="form-label" for="content">Nội dung</label>
                                    <textarea type="text" id="content" name="content" class="form-control" rows="6" cols="70"><?php echo $comment['content'] ?></textarea> 
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