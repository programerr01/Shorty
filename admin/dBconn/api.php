<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Content-Type: application/json; charset=UTF-8");

    include_once './database.php';
    // include_once './apiFunc.php';
    $method = $_SERVER['REQUEST_METHOD'];

function submitReg(){
    $database = new Database();
    $db = $database->connect();

    $username = $_GET["username"];
    $password =  $_GET["password"];
    $randNum = bin2hex(random_bytes(3));



    $sql = "INSERT INTO `users` (`uniqueNo`,`username`, `password`) VALUES ('$randNum','$username', '$password')";
    // print_r($sql);
    $result =$db -> query($sql) ;
    // var_dump($result);
        if ($result) {
            echo json_encode(
                array('message' => 'Form has been submitted')
            );
        } else {
            echo json_encode(
                array('message' => 'Internal Server Error. Try Again')
            );
        }

};
function addLink(){
    $database = new Database();
    $db = $database->connect();

    
    
    $linkIsFor =  $_POST["linkIsFor"];
    $originalLink =  $_POST["originalLink"];
    $shortenLink =  $_POST["shortenLink"];
    $uno = $_GET["uno"];
    // $randNum = bin2hex(random_bytes(3));



    $sql = "INSERT INTO `links` (`uniqueNo`,`linkIsFor`, `originalLink`, `shortenLink`) VALUES ('$uno','$linkIsFor', '$originalLink', '$shortenLink')";
    // print_r($sql);
    $result =$db -> query($sql) ;
    // var_dump($result);
        if ($result) {
            echo json_encode(
                array('message' => 'Form has been submitted')
            );
        } else {
            echo json_encode(
                array('message' => 'Internal Server Error. Try Again')
            );
        }

};

    $q = $_GET['q'];
    // echo $q;
    switch ($q) {
        case 'submitReg':
            submitReg();
            break;
        case 'addLink':
            addLink();
            break;
        default:
            echo "Invalid Query";
    }
?>