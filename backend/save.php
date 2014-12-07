<?php

require_once 'dbHandler.php';
require_once 'helper.php';

$postdata = file_get_contents("php://input");
$request = cleanInput(json_decode($postdata, true));

$email = $request['email'];
$password = $request['password'];

$db = new DbHandler();
$isUserExists = $db->getOneRecord("select * from users where email='$email'");

if(!$isUserExists){

    $password = md5($password);

    $result = $db->insertIntoTable(
        $request,
        ['name', 'email', 'password'],
        'users'
    );

    if ($result != NULL) {
        $response["status"] = "success";
        $response["message"] = "User account created successfully";
        echoResponse($response);
    } else {
        $response["status"] = "error";
        $response["message"] = "Failed to save user. Please try again";
        echoResponse($response);
    }
}else{
    $response["status"] = "error";
    $response["message"] = "An user with this email exists!";
    echoResponse($response);
}