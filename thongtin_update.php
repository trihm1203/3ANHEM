<br> <br>
<div class="container">
    <h2>THÔNG TIN NGƯỜI DÙNG</h2>
    <form action="index.php?pg=thongtin_update" method="POST" id="edit_user">
        <div class="form-group">
            <label>Họ tên:</label>
            <input type="text" class="form-control" name="ten" value="<?= $user[0]['ten'] ?>">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" value="<?= $user[0]['email'] ?>">
            <label>Số điện thoại:</label>
            <input type="text" class="form-control" name="sdt" value="<?= $user[0]['sdt'] ?>">
            <label>Địa chỉ:</label>
            <input type="text" class="form-control" name="DiaChi" value="<?= $user[0]['DiaChi'] ?>">
            <br>
            <input onclick="alert('Thay đổi thành công')" type="submit" class="btn btn-success" name="edit_user" value="Cập nhật">
            <a href="index.php?pg=update_pass&email=<?= $user[0]['email'] ?>"  class="btn btn-primary">Đổi mật khẩu</a>

            <a href="index.php?pg=home" class="btn btn-danger">Quay lại</a>

        </div>
    </form>

</div>