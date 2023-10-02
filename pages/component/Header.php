<?php

function headerPage($category, $users, $countCart)

{ ?>
    <header class="header">
        <!-- Header Main -->

        <div class="header_main">
            <div class="container text-center">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo">
                                <a href="../home"><img src="../../assets/image/logo-mixi-tét.png" width="130px" alt=""></a>
                            </div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <input type="search" required="required" class="header_search_input" placeholder="Tìm kiếm sản phẩm...">
                                        <button type="submit" class="header_search_button trans_300" value="Submit"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end" style="gap:1em">

                            <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                        <div class="cart_count"><span><?php echo empty($countCart[0]['count']) ? '0' : $countCart[0]['count'] ?></span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="#">Giỏ hàng</a></div>
                                        <div class="cart_price">185₫</div>
                                    </div>
                                </div>
                            </div>
                            <div class="top_bar_content ml-auto align-items-start">
                                <?php
                                if (!empty($users)) {
                                ?>
                                    <div class="users-logout position-relative">
                                        <div class="d-flex align-items-center">
                                            <img class="mx-3 rounded-circle" src="<?php echo $users[0]['image'] ?>" alt="" width="25px">
                                            <span class="fw-bold"><?php echo $users[0]['name'] ?></span>
                                        </div>
                                        <div class="logout position-absolute rounded " style="display:none; background-color: #00d2d4;">
                                            <div class="fw-bolder border-bottom fs-5"><a href="../logout/"> <button>Đăng xuất</button></a></div>
                                            <?php if ($users[0]['role'] == 10) { ?>
                                                <div class="fw-bolder"><a href="../register/"> <button> Quản trị website</button></a></div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                <?php  } else { ?>
                                    <div class="top_bar_user">
                                        <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
                                        <div><a href="../register/">Đăng ký</a></div>
                                        <div><a href="../login/">Đăng nhập</a></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="main_nav_content d-flex flex-row">

                            <!-- Categories Menu -->



                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="../home">Trang chủ<i class="fas fa-chevron-down"></i></a></li>
                                    <li class="hassubs">
                                        <a href="#">Tất cả danh mục<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <?php foreach ($category as $value) { ?>
                                                <li><a href="../category/?id=<?php echo $value['id'] ?>"><?php echo $value['name_category'] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="#">Trang khác<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="">Không Bấm<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="">Được Đâu<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="">Đừng Chọn<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="">Cảm Ơn<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="../alert">Thông báo<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="">Contact<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </div>

                            <!-- Menu Trigger -->

                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
<?php } ?>
<script>

</script>