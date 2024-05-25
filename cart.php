<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                $tong = 0;
                $tongsl = 0;
                for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                    $ttien = $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
                    $tong += $ttien;
                    $tongsl += $_SESSION['cart'][$i][4];
                ?>
                    <tbody class="align-middle">

                        <tr>
                            <td><?= ($i + 1) ?></td>
                            <td class="align-middle "><img src="<?= $_SESSION['cart'][$i][1] ?>" alt="" style="width: 50px;"> <?= $_SESSION['cart'][$i][2] ?></td>
                            <td class="align-middle "><?= number_format($_SESSION['cart'][$i][3]) ?>đ</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">

                                    <span class="form-control form-control-sm bg-secondary border-0 text-center"><?= $_SESSION['cart'][$i][4] ?>

                                </div>
                            </td>
                            <td class="align-middle"><?= number_format($ttien) ?>đ</td>

                            <td class="align-middle"><a href="index.php?pg=delcart&idcart=<?= $i ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a></td>
                        </tr>
                    <?php
                }

                    ?>


                    </tbody>
            </table>
            <a href="index.php?pg=delcart"> <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Xóa tất cả</button></a>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Chi tiết</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Số lượng</h6>
                        <h6><?= $tongsl  ?> </h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Tổng tiền hàng</h6>
                        <h6><?= number_format($tong) ?>đ</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tất cả</h5>
                        <h5 class="text-danger"><?= number_format($tong)  ?></h5>
                    </div>

                    <a href="index.php?pg=checkout"> <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</button> </a>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Cart End -->