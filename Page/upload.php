<?php
    $targetDir = "../uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Check whether file already exists
    if (file_exists($targetFilePath)) {
        echo "File already exists.";
    }else{
            // upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                echo "Image ". htmlspecialchars( basename( $_FILES["file"]["name"])). " uploaded sucessfully.";
            }else{
                echo "There was an error uploading your file";
            }
    }
?>