<br> <br>
<div class="container">
    <h2>Quản lý đơn hàng</h2>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Họ & Tên</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Tổng</th>
                <th>Hành động </th>
        </thead>
        <tbody>
            <?php
            $stt = 0;
            foreach (showallbill() as $b) {
            ?>
                <tr>
                    <td><?= $stt += 1 ?></td>
                    <td><?= $b['id_hoadon'] ?></td>
                    <td><?= $b['date'] ?></td>
                    <td><?= $b['ten'] ?></td>
                    <td><?= $b['sdt'] ?></td>
                    <td><?= $b['email'] ?></td>
                    <td><?= $b['diachi'] ?></td>
                    <td class="text-danger"><?= number_format($b['tongtien']) ?>đ</td>
                    <td>
                        <a href="index.php?pg=chitiet_bill&id_hoadon=<?= $b['id_hoadon'] ?>" class="btn btn-primary">Chi tiết</a>
                        <a href="index.php?pg=del_bill&id_hoadon=<?= $b['id_hoadon'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
        
    </table>
</div>