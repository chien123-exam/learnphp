<?php

$email = $password = '';
$emailErr = $passwordErr = $generalMessage = '';


if (isset($_POST['btn-login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!$email) {
        $emailErr = 'Vui lòng nhập email';
    }

    if(!$password) {
        $passwordErr = 'vui lòng nhập pass';;
    }
    
    if($email && $password) {
        if($email === 'ntc@gmail.com' && $password === '123456') {
            $_SESSION['admin'] = [
                'email' => $email,
                'name' => 'Admin',
            ];

            header('location:index.php?module=product');
        }
        $generalMessage = 'Vui long nhap email va pass';
    }
}