<?php
global $con;
require_once('./config.php');
mysqli_set_charset($con, 'utf8');

//this for getting the url with function
@$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$action = preg_replace('/[^a-z0-9_]+/i', '', array_shift($request));
// end

function register()
{
    global $con;
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $my_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    $result = mysqli_query($con, $my_query);
    if ($result) {
        $my_result = array("errorcode" => "000", "message" => "success");
        echo json_encode($my_result);
    }else{
        $my_result = array("errorcode" => "111", "message" => "fail");
        echo json_encode($my_result);
    }
}

switch ($action) {
    case "register":
        register();
        break;

    default :
        echo "no function found";
        break;
}