<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

require_once ("../config/connection.php");
require_once ("../models/Category.php");

$body= json_decode(file_get_contents("php://input"),true);

$categoria= new Categoria();

switch($_GET["op"]){
    case 'GetAll':
        $datos=$categoria->get_categoria();
        echo json_encode($datos);
        break;
    case 'GetById':
    $datos=$categoria->get_categoria_per_id($body["cat_id"]);
    echo json_encode($datos);
        break;

    case 'NewCat':
    $datos=$categoria->new_categoria($body["name"],$body["obs"]);
    echo json_encode($datos);
        break;

    case 'UpdateCat':
    $datos=$categoria->update_categoria($body["id"],$body["name"],$body["obs"]);
    echo json_encode($datos);
        break;

    case 'ToggleCat':
    $datos=$categoria->toggle_categoria($body["id"],$body["status"]);
    echo json_encode($datos);
        break;
}