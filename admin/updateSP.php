<div class="container">
    <br><br>
    <h2>CHỈNH SỬA</h2>
    <?php
    if (isset($error)) { ?>
        <p class="alert alert-danger"><?= $error ?></p>
    <?php

    }
    ?> <br><br>
    <form action="index.php?pg=update_sp" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên sản phẩm:</label>
            <input type="text" class="form-control" value="<?= $spone[0]['TenSP'] ?>" name="TenSP">
            <label>Ảnh sản phẩm</label>
            <input type="file" name="HinhAnh" class="form-control hidden">
            <img id="avatar" class="thumbnail" width="300px" height="300px" src="../HinhAnh/Laptop/<?= $spone[0]['HinhAnh'] ?>">
            <br>
            <label>Giá:</label>
            <input type="number" class="form-control" name="Gia" value="<?= $spone[0]['Gia'] ?>">
            <label>Số lượng:</label>
            <input type="number" class="form-control" name="SoLuong" value="<?= $spone[0]['SoLuong'] ?>">
            <label>Tình trạng:</label>
            <input type="text" class="form-control" name="TinhTrang" value="<?= $spone[0]['TinhTrang']  ?>">
            <label>Sale:</label>
            <input type="text" class="form-control" name="sale" value="<?= $spone[0]['sale'] ?>">
            <label>Danh mục:</label>
            <select name="DanhMuc">
                <?php
                foreach (danhmuc_select_all() as $row) { ?>
                    <option value=" <?= $row['id'] ?>"><?= $row['TenDanhMuc'] ?></option>
                <?php
                }
                ?>
            </select>
            <h2>Chi tiết sản phẩm</h2>
            <label>Màn hình:</label>
            <input type="text" class="form-control" name="ManHinh" value="<?= $spone[0]['ManHinh'] ?>">
            <label>Ram:</label>
            <input type="text" class="form-control" name="Ram" value="<?= $spone[0]['Ram'] ?>">
            <label>CPU:</label>
            <input type="text" class="form-control" name="CPU" value="<?= $spone[0]['CPU'] ?>">
            <label>Rom:</label>
            <input type="text" class="form-control" name="Rom" value="<?= $spone[0]['Rom'] ?>">
            <label>Card màn hình:</label>
            <input type="text" class="form-control" name="CardMH" value="<?= $spone[0]['CardMH'] ?>">
            <input type="hidden" name="id" value="<?= $spone[0]['id'] ?>">
            <input type="submit" class="btn btn-primary" name="edit_sp" value="Cập nhật"></input>
            <a href="index.php?pg=sanpham" class="btn btn-danger">Quay lại</a>
        </div>

    </form>
</div>