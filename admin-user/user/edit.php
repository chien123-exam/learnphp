<?php
    $idUser = $_GET['id'] ?? null;
    $userInfo = null;


    foreach ($_SESSION['users'] as $key => $user) {
        if ($user['id'] == $idUser) {
            $userInfo = $user;
            break;
        }
    }

    if (empty($userInfo)) {
        echo 'User not found!';
        exit;
    }

    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    } 

    $name = $email = $phone = $address = $gender = '';
    $nameErr = $emailErr = $phoneErr = $addressErr = $genderErr = '';

    if(isset($_POST['btn-submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

        if (empty($name)) {
            $nameErr = 'Vui lòng nhập họ tên !';
        }

        if (empty($email)) {
            $emailErr = 'Vui lòng nhập email !';
        }

        if (empty($phone)) {
            $phoneErr = 'Vui lòng nhập số điện thoại!';
        }

        if (empty($address)) {
            $addressErr = 'Vui lòng nhập địa chỉ!';
        }

        if (empty($gender)) {
            $genderErr = 'Vui lòng chọn giới tính!';
        }
}

?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-5">User Infomation</h3>
    <a href="index.php?module=user&action=list">Back</a>
</div>

<div class="container">
    <form action="" method="post">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="<?= $userInfo['name'] ?>"/>    
                <?= $nameErr ? '<div class="error" style="color:red">'.  $nameErr .'</div>' : '' ?>   
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" value="<?= $userInfo['email'] ?>"/>
                <?= $emailErr ? '<div class="error" style="color:red">'.  $emailErr .'</div>' : '' ?> 
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Phone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="phone" value="<?= $userInfo['phone'] ?>" />
                <?= $phoneErr ? '<div class="error" style="color:red">'.  $phoneErr .'</div>' : '' ?> 
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="address" value="<?= $userInfo['address'] ?>" />
                <?= $addressErr ? '<div class="error" style="color:red">'.  $addressErr .'</div>' : '' ?> 
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-9">
            <label><input type="radio" name="gender" value="1" <?= $userInfo['gender'] == 1 ? 'checked' : '' ?> />Nam</label>
            <label><input type="radio" name="gender" value="2" <?= $userInfo['gender'] == 2 ? 'checked' : '' ?> />Nữ</label>
            <?= $genderErr ? '<div class="error" style="color:red">'.  $genderErr .'</div>' : '' ?> 
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button type="submit" name="btn-submit" class="btn btn-primary">Save</button> &nbsp;
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
</div>