<br> <br>
<div class="container">
    <h2>Quản lý tài khoản </h2>
    <br> <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Quyền</th>
                <th>Trạng thái</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 0;
            foreach (user_select_all() as $user) {
            ?>
                <tr>
                    <td><?= $stt += 1 ?></td>
                    <td><?= $user['ten'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['sdt'] ?></td>
                    <td><?= $user['DiaChi'] ?></td>
                    <td><?= ($user['quyen'] == 1 ? 'Khách háng' : 'Admin') ?></td>
                    <td><?= ($user['trangthai'] == 1 ? 'Hoạt động' : 'Khóa') ?></td>
                    <td>
                        <a href="index.php?pg=edit_user&id=<?= $user['id'] ?>" class="btn btn-primary">Cập nhật</a>
                        <a href="index.php?pg=delete_user&id=<?= $user['id'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>