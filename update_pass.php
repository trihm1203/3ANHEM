<br> <br>
<div class="container">
    <h2>ĐỔI MẬT KHẨU</h2>
    <?php
    if (isset($error)) { ?>
        <p class="alert alert-danger"><?= $error ?></p>
    <?php
    } elseif (isset($error1)) { ?>
        <p class="alert alert-success"><?= $error1 ?></p>
    <?php
    } else if (isset($error2)) { ?>
        <p class="alert alert-danger"><?= $error2 ?></p>
    <?php
    }
    ?>
    <form action="index.php?pg=update_pass&email=<?= $user[0]['email'] ?>" method="POST">
        <div class="form-group">
            <label>Mật khẩu cũ *</label>
            <input type="password" class="form-control" name="pass" required>
            <label>Mật khẩu mới *</label>
            <input type="password" class="form-control" name="passnew" required>
            <label>Nhập lại mật khẩu *</label>
            <input type="password" class="form-control" name="passconfirm" required>
            <br>
            <input type="submit" class="btn btn-success" name="update_pass" value="Thay đổi">
            <a href="index.php?pg=thongtin_update&email=<?= $user[0]['email'] ?>" class="btn btn-danger">Quay lại</a>
        </div>
    </form>

</div>