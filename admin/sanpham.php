<br> <br>
<div class="container">
    <h2>Quản lý sản phẩm</h2>
    <a href="index.php?pg=add_spForm" class="btn btn-danger"> Thêm mới sản phẩm </a>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Hình</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tình trạng</th>
                <th>Sale</th>
                <th>Lượt xem</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 0;
            foreach (sanpham_select_all() as $sp) {
            ?>
                <tr>
                    <td><?= $stt += 1 ?></td>
                    <td><?= $sp['TenSP'] ?></td>
                    <td><img src="../HinhAnh/Laptop/<?= $sp['HinhAnh'] ?>" width="100px" alt=""></td>
                    <td><?= number_format($sp['Gia']) ?>đ</td>
                    <td><?= $sp['SoLuong'] ?></td>
                    <td><?= $sp['TinhTrang'] ?></td>
                    <td><?= $sp['sale'] ?></td>
                    <td><?= $sp['view'] ?></td>
                    <td>
                        <a href="index.php?pg=update_sp&id=<?= $sp['id'] ?>" class="btn btn-primary">Cập nhật</a>
                        <a href="index.php?pg=delete_sp&id=<?= $sp['id'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>