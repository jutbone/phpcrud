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
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];


$query="Insert into students(name,email,phone,dob,gender) values ('$name','$email',
'$phone','$dob','$gender')";

if(mysqli_query($connection,$query)){
   echo "Data Saved Successfully.";
}else{
    echo "Something went wrong.";
}




?>