<?php
if(isset($_POST['submitSignup'])){
    require 'db.inc.php';

    $first =$_POST['first'];
    $last =$_POST['last'];
    $username =$_POST['username'];
    $password =$_POST['password'];

    $sql = "INSERT INTO user(first,last,username,password) values('$first','$last','$username','$password');";
    $result = mysqli_query($conn,$sql);

    $sql = "SELECT * FROM  user WHERE username ='$username' and first='$first';";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_assoc($result)){
            $userid =$row['id'];
            $sql = "INSERT INTO profileimg(userid,status) values('$userid',1);";
            $result = mysqli_query($conn,$sql);
            header('Location: index.php');
        }
    }else{
        echo 'you have an error';
    }
}