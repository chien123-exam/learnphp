<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php require('./student.php') ?>
    <div class="container">
        <h1>Thêm mới sinh viên</h1>
        <form action="" method="post">
            <div class="list-item">
                <label for="">Họ và tên:</label>
                <input type="text" name="fullname">
                <?php if($errFullName): ?>
                    <span class="error"><?= $errFullName ?></span>
                <?php endif; ?>
            </div>

            <div class="list-item">
                <label for="">Email:</label>
                <input type="email" name="email" id="">
                <?php if($errEmail): ?>
                    <span class="error"><?= $errEmail ?></span>
                <?php endif; ?>
            </div>

            <div class="list-item">
                <label for="">Điện thoại</label>
                <input type="phone" name="phone">
                <?php if($errPhone): ?>
                    <span class="error"><?= $errPhone ?></span>
                <?php endif; ?>
            </div>

            <div class="list-item">
                <label for="">Giới tính:</label>
                <label for=""><input type="radio" name="gender" id="" value="1" <?= $student->getGender() == 1 ? 'checked' : ''?>>Nam</label>
                <label for=""><input type="radio" name="gender" id="" value="2" <?= $student->getGender() == 2 ? 'checked' : '' ?>>Nữ</label>
                <?php if($errGender): ?>
                    <span class="error"><?= $errGender ?></span>
                <?php endif; ?>
            </div>

            <button name="btn-submit">Lưu lại</button>
            <button>Hủy</button>
        </form>

        <div class="show">
            <p>Họ và tên: <?= $student->getName() ?></p>
            <p>Email: <?= $student->getEmail() ?></p>
            <p>Số điện thoại: <?= $student->getPhone() ?></p>
            <p>Giới tính: <?= $student->getGender() == 1 ? 'Nam' : 'Nữ' ?></p>
        </div>
    </div>


</body>
</html>