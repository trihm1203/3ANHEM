<?php
if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    echo "<script>alert('Vui lòng đăng nhập trước khi mua hàng!')</script>";
    include 'login.php';
} else { ?>
    <!-- Checkout Start -->
    <form action="index.php?pg=taodonhang" method="post">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">THÔNG TIN ĐẶT HÀNG</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ & Tên</label>
                                <input name="ten" class="form-control" type="text" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input name="sdt" class="form-control" type="number" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input name="email" class="form-control" type="email" placeholder="example@email.com" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ giao hàng</label>
                                <input name="diachi" class="form-control" type="text" required>
                            </div>
                            <input type="hidden" name="date">
                        </div>
                    </div>
                    <input onclick="alert('Bạn đã đặt hàng thành công !')" type="submit" name="thanhtoan" class="btn btn-block btn-primary font-weight-bold py-3" value="Đặt hàng"></a></input>

                </div>

                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Chi tiết hóa đơn</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Sản phẩm</h6>
                            <?php
                            $ttien = 0;
                            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                                $ttien += ($_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4]);
                                $tong = $ttien + 24000;
                            ?>
                                <div class="d-flex justify-content-between pb-3">
                                    <p>x<?= $_SESSION['cart'][$i][4] ?></p>
                                    <img src="<?= $_SESSION['cart'][$i][1] ?>" alt="" style="width: 80px;">
                                    <p class="ml-2"> <?= $_SESSION['cart'][$i][2] ?></p>
                                    <h6 class="ml-lg-4"><?= number_format($_SESSION['cart'][$i][3]) ?>đ</h6>
                                </div>
                            <?php
                            }

                            ?>
                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Tổng tiền hàng</h6>
                                <h6><?= number_format($ttien) ?>đ</h6>

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
    </form>
<?php
}
?>
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