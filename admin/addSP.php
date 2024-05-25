<div class="container">
    <br><br>
    <h2>THÊM SẢN PHẨM</h2>
    <?php
    if (isset($error)) { ?>
        <p class="alert alert-danger"><?= $error ?></p>
    <?php

    }
    ?> <br><br>
    <form action="index.php?pg=add_sp" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên sản phẩm:</label>
            <input type="text" class="form-control" placeholder="Enter tên" name="TenSP">
        </div>
        <div class="form-group">
            <label>Ảnh sản phẩm</label>
            <input type="file" name="HinhAnh" class="form-control hidden">
        </div>
        <div class="form-group">
            <label>Giá:</label>
            <input type="number" class="form-control" placeholder="Enter giá" name="Gia">
        </div>
        <div class="form-group">
            <label>Số lượng:</label>
            <input type="number" class="form-control" placeholder="Enter số lượng" name="SoLuong">
        </div>
        <div class="form-group">
            <label>Tình trạng:</label>
            <input type="text" class="form-control" placeholder="Enter tình trạng" name="TinhTrang">
        </div>
        <div class="form-group">
            <label>Sale:</label>
            <input type="number_format" class="form-control" placeholder="Enter sale" name="sale">
        </div>
        <div class="form-group">
            <label>Danh mục:</label>
            <select name="Id_DanhMuc" required>
                <?php
                foreach (danhmuc_select_all() as $row) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['TenDanhMuc'] ?></option>
                <?php

                }
                ?>
            </select>
        </div>
        <h2>Chi tiết sản phẩm</h2>
        <div class="form-group">
            <label>Màn hình:</label>
            <input type="text" class="form-control" placeholder="Enter màn hình" name="ManHinh">
        </div>
        <div class="form-group">
            <label>Ram:</label>
            <input type="text" class="form-control" placeholder="Enter Ram" name="Ram">
        </div>
        <div class="form-group">
            <label>CPU:</label>
            <input type="text" class="form-control" placeholder="Enter CPU" name="CPU">
        </div>
        <div class="form-group">
            <label>Rom:</label>
            <input type="text" class="form-control" placeholder="Enter Rom" name="Rom">
        </div>
        <div class="form-group">
            <label>Card màn hình:</label>
            <input type="text" class="form-control" placeholder="Enter card màn hình" name="CardMH">
        </div>
        <input type="hidden" name="id_SP" value="<?= $spone[0]['id_SP'] ?>">

        <br> <br>
        <input type="submit" name="themmoi" value="Thêm" class="btn btn-primary">
        <a href="index.php?pg=sanpham" class="btn btn-danger">Quay lại</a>

    </form>
</div>