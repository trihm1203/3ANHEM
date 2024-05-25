<br> <br>
<div class="container">
    <h2>CẬP NHẬT NGƯỜI DÙNG</h2>
    <form action="index.php?pg=edit_user" method="POST" id="edit_user">
        <div class="form-group">
            <label>Họ tên:</label>
            <input type="text" class="form-control" name="ten" value="<?= $kqone[0]['ten'] ?>">
            <label>Email:</label>
            <input type="text" class="form-control" name="email" value="<?= $kqone[0]['email'] ?>">
            <label>Số điện thoại:</label>
            <input type="text" class="form-control" name="sdt" value="<?= $kqone[0]['sdt'] ?>">
            <label>Địa chỉ:</label>
            <input type="text" class="form-control" name="DiaChi" value="<?= $kqone[0]['DiaChi'] ?>">
            <br>
            <label>Trạng thái:</label>
            <select name=" trangthai" style=" padding:0px 20px;background:#cdcdcd;">
                <option value="1">Hoạt động</option>
                <option value="0">Khóa</option>
            </select> <br> <br>
            <label>Quyền:</label>
            <select name="quyen" style=" padding:0px 20px;background:#cdcdcd;">
                <option value="1">Người dùng</option>
                <option value="0">Admin</option>
            </select> <br> <br>
            <input type="hidden" name="id" value="<?= $kqone[0]['id'] ?>">
            <br>
            <input type="submit" class="btn btn-primary" name="edit_user" value="Cập nhật"></input>
            <a href="index.php?pg=user" class="btn btn-danger">Quay lại</a>

        </div>
    </form>

</div>