<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        .input-error {
    border: 1px solid red;
}
.smg-error {
    color: red;
    text-indent: 100px;
}
    </style>
</head>
<body>

    <div class="container">
        <div class="products">
            <ul>
                <li><a href="./danhmucsanpham.php">Danh mục sản phẩm</a></li>
                <li><a href="./laptop.php">Laptop</a></li>
                <li><a href="#">Printer</a></li>
                <li><a href="./mobile.php">Mobile</a></li>
                <li><a href="./fax.php">Fax</a></li>
            </ul>
        </div>

        <?php 
            $fullname = $phone = $address = '';

            $fullnameErr = $phoneErr = $addressErr = '';

            $content = '';

            if(isset($_POST['send'])) {
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
            }

            if(empty($fullname)) {
                $fullnameErr = 'Vui lòng nhập họ tên';
            }

            if(empty($phone)) {
                $phoneErr = 'Vui lòng nhập số điện thoại';
            } else if(!is_numeric($_POST['phone'])) {
                $phoneErr = 'Số điện thoại không đúng định dạng';
            } else if (strlen($_POST['phone']) > 10) {
                $phoneErr = 'Số điện thoại không được lớn hơn 10 chữ số';
            }

            if(empty($address)) {
                $addressErr = 'Vui lòng nhập địa chỉ';
            }

            if($fullname && $phone && $address) {
                $content .= "<p>Họ tên của bạn là: {$fullname}";
                $content .= "<p>Số điện thoại của bạn là: {$phone}";
                $content .= "<p>Địa chỉ của bạn là: {$address}";            
            }
        ?>

        <span>Bạn đang ở trang <strong>Printer</strong>, vui lòng nhập thông tin giao hàng</span>

        <form action="" method="post">
            <div class="item">
                <br>
                <label for="">Họ và tên: </label>
                <input type="text" name="fullname" class="<?= $fullnameErr ? 'input-error' : '' ?>" value="<?= $fullname ?>">
                <?= $fullnameErr ? "<div class='smg-error'>{$fullnameErr}</div>" : '' ?>
            </div>
            <br>
            <div class="item">
                <label for="">Điện thoại: </label>
                <input type="text" name="phone" id="" class="<?= $phoneErr ? 'input-error' : '' ?>" value="<?= $phone ?>">
                <?= $phoneErr ? "<div class='smg-error'>{$phoneErr}</div>" : '' ?>
            </div>
            <br>
            <div class="item">
                <label for="">Địa chỉ nhận hàng: </label>
                <input type="text" name="address" id="" class="<?= $addressErr ? 'input-error' : '' ?>" value="<?= $address ?>">
                <?= $addressErr ? "<div class = 'smg-error'>{$addressErr}</div>" : '' ?>
            </div>

            <br>

            <button name="send">Gửi đi</button>
        </form>

        <div class="result">
            <?= $content ?>
        </div>
        

        
    </div>
    
</body>
</html>