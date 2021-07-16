<?php
//upload file or images to a website in php 
if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    // print_r($file);

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];

    $fileExtension = explode('.',$fileName);
    $finalfileExtension = strtolower(end($fileExtension));

    $ExtensionAllowed =array('png','jpg','jpeg','pdf');
    if(in_array($finalfileExtension,$ExtensionAllowed)){
        if($fileError === 0 ){
            if($fileSize < 500000000 ){ //500megabyte = 500000 Kbyte
              $fileNameNew = uniqid('',true).".".$finalfileExtension;
              $fileDestination ='uploads/'.$fileNameNew;
              move_uploaded_file($fileTmpName,$fileDestination);
              header('Location: index.php?uploadsuccess');
            }else{
                echo 'your file is too big';
            }

        }else{
            echo 'Error ,you can try again later !';
        }


    }else{
        echo "you cannot upload this file type !";
    }







}
