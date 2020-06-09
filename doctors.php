<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $jsonOBJ = json_decode(file_get_contents("php://input"));

 $title = $jsonOBJ->title;
 $target = $jsonOBJ->target;
 $data = $jsonOBJ->data;
 $date = $jsonOBJ->date;
 $drname = $jsonOBJ->drname;


$user = "root";
$pass = "";
$host= "localhost";
$dbname="mobile";

$con = mysqli_connect($host,$user,$pass,$dbname);
mysqli_set_charset($con,"utf8");
mysqli_query($con,"set_NAMES_utf8");

$sql="insert into advices(title,target,data,date,drname) values('".$title."','".$target."','".$data."','".$date."','".$drname."');";


 if(mysqli_query($con,$sql)){
echo json_encode(array('success' => true));
 }

 mysqli_close($con);
 }else{
 echo "Error";
 }
?>


