<?php

require_once "controller/UserNisController.php";
require_once "controller/TestValidateNisController.php";

if (isset($_GET['usernis'])) {
    $userNis = new UserNisController();
    switch ($_GET['usernis']) {
        case 'index':
            $param = isset($_GET['new']) ? $_GET['new'] : null;
            $userNis->index($param);
            break;
        case 'search':
            $param = isset($_POST['nis']) ? $_POST['nis'] : null;
            $userNis->search($param);
            break;
        case 'create':
            $userNis->create();
            break;
        case 'store':
            $userNis->store($_POST);
            break;
        case 'destroy':
            $userNis->destroy($_GET['id']);
            break;
        case 'test':
            $param = isset($_POST['size']) ? $_POST['size'] : 0;
            $testValidateNis = new TestValidateNisController();
            $testValidateNis->test($param);
            break;
        default:
            http_response_code(404);
    }
} else {
    $userNis = new UserNisController();
    $userNis->create();
}
