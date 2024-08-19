<?php

$host="localhost";
$username="root";
$password="";
$dbname="phpcrud";

$connection= new mysqli($host,$username,$password,$dbname);

if(!$connection){
  echo "Connection Not Established";
}


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

$query="Insert into students(name,email,phone,dob,gender) values ('$name','$email',
'$phone','$dob','$gender')";

if(mysqli_query($connection,$query)){
   http_response_code(200);
   echo json_encode(array("message" => "Data Saved Successfully."));
   exit();
}else{
    http_response_code(300);
    echo json_encode(array("message" => "Something Went Wrong."));
    exit();
}

?>