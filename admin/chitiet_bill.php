<?php
foreach ($kq as $b) {
?>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h2 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">THÔNG TIN CHI TIẾT</span></h2> <br>
                <h5 class="text-danger">Mã đơn hàng: <?= $b['id_hoadon'] ?></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ & Tên</label>
                            <button class="form-control"><?= $b['ten'] ?></button>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <button class="form-control"><?= $b['sdt'] ?></button>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <button class="form-control"> <?= $b['email'] ?></button>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ giao hàng</label>
                            <button class="form-control"><?= $b['diachi'] ?></button>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ngày đặt</label>
                            <button class="form-control"><?= $b['date'] ?></button>
                        </div>
                    </div>
                </div>
                <a type="button" href="index.php?pg=bill" class="btn btn-block btn-primary font-weight-bold py-3"> XÁC NHẬN ĐƠN HÀNG</a>

            </div>
        <?php
    }
        ?>

        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Chi tiết sản phẩm</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">

                    <h6 class="mb-3">Sản phẩm</h6>

                    <?php
                    $tt = 0;
                    foreach ($kq1 as $bc) {
                        $tt += $bc['dongia'] * $bc['soluong'];
                        $tong = $tt + 24000
                    ?>
                        <div class="d-flex justify-content-between pb-3">
                            <p>x<?= $bc['soluong'] ?> </p>
                            <img src="../<?= $bc['hinhanh'] ?>" alt="" style="width: 80px;">
                            <p class="ml-2"><?= $bc['tensp'] ?> </p>
                            <h6 class="ml-lg-4"><?= number_format($bc['dongia']) ?>đ</h6>
                        </div>

                    <?php
                    }
                    ?>
                </div>

                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Tổng tiền hàng</h6>
                        <h6><?= number_format($tt) ?>đ</h6>
                    </div>

                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                        <h6 class="font-weight-medium">24.000đ</h6>
                    </div>
                </div>

                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng thanh toán</h5>
                        <h5 class="text-danger"><?= number_format($tong) ?>đ</h5>
                    </div>
                </div>
            </div>

        </div>


        </div>

    </div>
    <!-- Checkout End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../View/lib/easing/easing.min.js"></script>
    <script src="../View/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../View/mail/jqBootstrapValidation.min.js"></script>
    <script src="../View/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../View/js/main.js"></script>
    </body>

    </html>