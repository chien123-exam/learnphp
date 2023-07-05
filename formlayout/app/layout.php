<?php 
$pageName = $_GET['module'] ?? null;
$actionName = $_GET['action'] ?? null;

switch($pageName) {
    case 'user': {
        switch($actionName) {
            case 'create': {
                require('./users/create.php');
                break;
            }

            default;
                require('./users/index.php');
        }
        break;
    }

    case 'product': {
        switch($actionName) {
            case 'create': {
                require('./products/create.php');
                break;
            }

            default;
                require('./products/index.php');
        }
    }
    break;
}




?>