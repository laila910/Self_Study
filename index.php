<?php
session_start();
require "db.inc.php";
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php 
      //inserting database results in an array 

        // $sql = "SELECT  * From users ;";
        // $result= mysqli_query($conn,$sql);
        // $data = array();
        // if(mysqli_num_rows($result)>0){
        //   while($row = mysqli_fetch_assoc($result)){
        //       $data[]=$row; // return associative arrays ,every row is an associative array

        //   }

        // }


        // print_r( $data); 

        // foreach($data as $value){
        //      print_r($value);//if i used echo(); that's not work 
        // }

    //    foreach($data[0] as $value){  // that is print the first row in the database 
    //      echo $value.'<br>';
    //    }
        
    //    foreach($data as $value){ // that is print the column 
    //            echo $value['uidUsers'].'<br>';
    //    }
       
        
 ?>
 <?php
 $sql ="SELECT * FROM user;";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result) >0 ){
    while($row = mysqli_fetch_assoc($result)){
        $id =$row['id'];
        $sqlImg = "SELECT * FROM profileimg where userid ='$id';";
        $resultImg = mysqli_query($conn,$sqlImg);
        while($rowImg = mysqli_fetch_assoc($resultImg)){
            echo '<div width="500px" height="500px">';
              if($rowImg['status'] == 0){
                $filename="uploads/profile".$id."*";
                $fileinfo=glob($filename);
                $fileextension = explode('.',$fileinfo[0]);
                $fileactualextension = $fileextension[1];
                 echo "<img width='100px' height='100px' src='uploads/profile".$id.".".$fileactualextension."?".mt_rand()."'>";
              }else{
                  echo '<img src="uploads/profiledefault.jpg">';
              }
              echo $row['username'];

            echo'</div>';
        }
    }

 }else{

    echo 'there are no users yet!';
 }
  if( isset($_SESSION['id'])){
      if($_SESSION['id'] ==1 ){
         echo"you are logged in as user #1";

      }
      echo'<form action="upload.php " method="post" enctype="multipart/form-data"> 
          <input type="file" name="file">
          <button type="submit" name="submit">Upload </button>
        </form>';
      echo'<form action="deleteprofile.php" method="post"> 
          <button type="submit" name="submit">delete profile image </button>
        </form>';
  }else{
     echo"you are not logged in !";
     echo '<form action="signup.php " method="post" enctype="multipart/form-data">
               <input type="text" name="first" placeholder="please enter your first name">
               <input type="text" name="last" placeholder="please enter your last name">
               <input type="text" name="username" placeholder="please enter your user name">
               <input type="text" name="password" placeholder="please enter your password">
               <button type="submit" name="submitSignup">SignUp</button>
     </form>';
 }




?>
       
          
        <p>Login as User!</p>
        <form action="login.php " method="post" enctype="multipart/form-data"> 
         
          <button type="submit" name="submitLogin">Login</button>
        </form>

          <p>Login as User!</p>
          <form action="logout.php " method="post" enctype="multipart/form-data"> 
          
          <button type="submit" name="submitLogout">Logout</button>
        </form>
        <script src="" async defer></script>
    </body>
</html>