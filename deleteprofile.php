<?php
session_start();
require "db.inc.php";
$sessionid = $_SESSION['id'];

$filename="uploads/profile".$sessionid."*";//star mean any thing write after the id thatt I search 
$fileinfo=glob($filename);
// print_r($fileinfo);

$fileextension = explode('.',$fileinfo[0]);

// print_r($fileextension);
$fileactualextension = $fileextension[1];


$file ="uploads/profile".$sessionid.".".$fileactualextension;

if(!unlink($file)){
  echo'file is not deleted';
}else{
  echo'file is deleted';
}

$sql = "UPDATE profileimg SET status=1 where userid='$sessionid ';";
mysqli_query($conn,$sql);
header("Location: index.php?deletecomplete");