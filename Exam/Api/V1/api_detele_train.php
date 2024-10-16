<?php
include '../../config/config.php';
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $input = file_get_contents('php://Input');

    parse_str($input, $_DELETE);

    $id = $_DELETE['id'];

    $config = new Config();

    $res = $config->deletetrain($id);

    if ($res == 1) {
        $arr['data'] = "Train deteleted Successfully...!";
    } else {
        $arr['data'] = "Train deletaion failed...!";
    }
} else {
    $arr['error'] = "ONLY DELETE HTTP REQUEST METHOD IS ALLOWED...!";
}
echo json_encode($arr);
?>