<?php

$host="localhost";
$username="root";
$password="";
$dbname="phpcrud";


$name=$_POST['name'];

if($_POST['name'] =='' ){
    http_response_code(404);
    echo json_encode(array("message" => "Please Enter Name First."));
    exit();
}
$email=$_POST['email'];
if($_POST['email'] =='' ){
    http_response_code(404);
    echo json_encode(array("message" => "Please Enter Email First."));
    exit();
}
$phone=$_POST['phone'];
if($_POST['phone'] =='' ){
    http_response_code(404);
    echo json_encode(array("message" => "Please Enter Phone no First."));
    exit();
}
$dob=$_POST['dob'];
if($_POST['dob'] =='' ){
    http_response_code(404);
    echo json_encode(array("message" => "Please Enter DoB First."));
    exit();
}
$gender=$_POST['gender'];
if($_POST['gender'] =='' ){
    http_response_code(404);
    echo json_encode(array("message" => "Please Enter Gender First."));
    exit();
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO students (name, email,phone,dob,gender) VALUES (:name, :email,:phone,:dob,:gender)");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':gender', $gender);
    $stmt->execute();

    http_response_code(200);
    echo json_encode(array("message" => "Data Saved Successfully."));
    exit();

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}

$pdo = null;

?>