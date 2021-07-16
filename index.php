<?php

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
        $sql = "SELECT  * From users ;";
        $result= mysqli_query($conn,$sql);
        $data = array();
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
              $data[]=$row; // return associative arrays ,every row is an associative array

          }

        }
        // print_r( $data); 

        // foreach($data as $value){
        //      print_r($value);//if i used echo(); that's not work 
        // }

       foreach($data[0] as $value){  // that is print the first row in the database 
         echo $value.'<br>';
       }
        
       foreach($data as $value){ // that is print the column 
               echo $value['uidUsers'].'<br>';
       }
       
        
?>
        <form action="upload.php " method="post" enctype="multipart/form-data">
          <input type="file" name="file">
          <<button type="submit" name="submit">Upload</button>



        </form>
        <script src="" async defer></script>
    </body>
</html>