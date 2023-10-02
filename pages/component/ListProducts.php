<?php
function listProducts($listProduct)
{ ?>
    <section style="background-color: #eee;">
        <div class="text-center container py-5">
            <div class="row">
                <?php
                foreach ($listProduct as $value) { ?>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <a href="../productDetail/?id=<?php echo $value[0] ?>">
                            <div class="card">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                    <img src="../<?php echo $value['img'] ?>" class="w-100" />
                                    <a href="#!">
                                        <div class="mask">
                                            <div class="d-flex justify-content-start align-items-end h-100">
                                                <h5><span class="badge bg-primary ms-2"><?php echo $value['discount'] ?>%</span></h5>
                                            </div>
                                        </div>
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body fs-1">
                                    <a href="" class="text-reset">
                                        <h5 class="card-title mb-3"><?php echo $value['name_product'] ?></h5>
                                    </a>
                                    <a href="" class="text-reset">
                                        <p><?php echo $value['name_category'] ?></p>
                                    </a>
                                    <h6 class="mb-3 fw-bold"><?php echo number_format($value['price'], 0, '.', ',')  ?>₫</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
    </section>
<?php  }
?>