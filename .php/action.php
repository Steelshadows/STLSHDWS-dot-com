<?php 
session_start();
//header("Content-Type: application/json");
//requires
require_once('class/DB_class.php');

//function includes
include_once('userFunction.php');
include_once('postFunction.php');
include_once('rouletteFunction.php');

 
//get data and fire function
if(isset($_GET["action"])){
    $data = json_decode(stripslashes(file_get_contents("php://input")),true);
    //var_dump(stripslashes(file_get_contents("php://input")));
    $funcName = $_GET["action"];    
    if (isset($_SESSION['userData']["role_ids"]) && gettype($_SESSION['userData']["role_ids"]) == "string"){
        $_SESSION['userData']["role_ids"] = explode(",",$_SESSION['userData']["role_ids"]);
    }

    echo json_encode($funcName($data));
}