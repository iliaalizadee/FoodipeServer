<?php

 if($_SERVER['REQUEST_METHOD']=='POST'){

 $image = $_POST['image'];
 $title = $_POST['title'];
 $ings = $_POST['ings'];
 $text = $_POST['text'];
 $sender = $_POST['sender'];


$user = "root";
$pass = "";
$host= "localhost";
$dbname="mobile";

$con = mysqli_connect($host,$user,$pass,$dbname);
mysqli_set_charset($con,"utf8");
mysqli_query($con,"set_NAMES_utf8");

$sql ="SELECT id FROM senders ORDER BY id ASC";



$res = mysqli_query($con,$sql);


$id = 0;

 while($row = mysqli_fetch_array($res)){
 $id = $row['id'];
 }

 $p = "uploads/$id.png";

 $mainpath = "http://192.168.1.4/myimage/$p";


 $sql="insert into senders(image,title,ings,text,sender) values('".$mainpath."','".$title."','".$ings."','".$text."','".$sender."');";


 if(mysqli_query($con,$sql)){
 file_put_contents($p,base64_decode($image));
 echo "Successfully Uploaded";
 }

 mysqli_close($con);
 }else{
 echo "Error";
 }

?>
