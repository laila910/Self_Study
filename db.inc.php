<?php
$servername='localhost';
$dbusername='root';
$dbpassword='';
// $dbname='loginsystem';
$dbname='imgupload';

$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

if(!$conn){
    die("Connection Faild :".mysqli_connect_error());
}


?>
