<div class="container">
    <h2>Quản lý danh mục</h2>
    <form action="index.php?pg=add_dm" method="post">
        <input type="text" name="TenDanhMuc">
        <input type="submit" name="themmoi" value="Thêm mới" class="btn btn-danger">
    </form>
    <br> <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên danh mục</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($kq as $dm) {
            ?>
                <tr>
                    <td><?= $dm['TenDanhMuc'] ?></td>
                    <td><img src="../HinhAnh/DanhMuc/<?= $dm['HinhAnh'] ?>" width="80px" alt=""></td>
                    <td>
                        <a href="index.php?pg=edit_dm&id=<?= $dm['id'] ?>" class="btn btn-primary">Cập nhật</a>
                        <a href="index.php?pg=delete_dm&id=<?= $dm['id'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>