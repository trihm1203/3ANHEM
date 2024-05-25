<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Size Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Danh mục</span></h5>
            <div class="bg-light p-4 mb-30">
                <?php
                foreach (danhmuc_select_all() as $dm) {
                ?>
                    <a class="text-decoration-none" href="index.php?pg=sanpham&id=<?= $dm['id'] ?>">
                        <div class=" cat-item img-zoom d-flex align-items-center mb-4">
                            <img src="HinhAnh/DanhMuc/<?= $dm['HinhAnh'] ?>" width="80px" alt="">
                            <div class="flex-fill pl-3">
                                <h6><?= $dm['TenDanhMuc'] ?></h6>
                                <small class="text-body">3 Sản phẩm</small>
                            </div>
                        </div>
                    </a>
                    <hr>
                <?php
                }
                ?>
            </div>
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <p>Tìm thấy <b><?= $number ?></b> kết quả mong muốn</p>
                    </div>
                </div>
            </div>
            <div class="row px-xl-1">

                <?php

                foreach ($search as $sp) {
                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <form action="index.php?pg=cart" method="post">
                                <div class="product-img position-relative overflow-hidden">
                                    <img src="HinhAnh/Laptop/<?= $sp['HinhAnh'] ?>" width="100%" alt="">
                                    <input type="hidden" name="img" value="HinhAnh/Laptop/<?= $sp['HinhAnh'] ?>">

                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="index.php?pg=sp_chitiet&id=<?= $sp['id'] ?>"><?= $sp['TenSP'] ?></a>
                                    <input type="hidden" name="tensp" value="<?= $sp['TenSP'] ?> ">
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5><?= number_format($sp['Gia']) ?>đ</h5>
                                        <input type="hidden" name="giasp" value="<?= $sp['Gia'] ?> ">
                                        <input type="hidden" name="id" value="<?= $sp['id'] ?> ">

                                    </div>
                                    <p><?= $sp['TinhTrang'] ?></p>

                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary" name="dathang" type="submit" value="Thêm vào giỏ hàng">

                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>



        </div>
    </div>
    <!-- Shop Product End -->
</div>
</div>
<!-- Shop End -->