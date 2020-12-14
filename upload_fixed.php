<?php
    $targetDir = "../uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $condition = 1;

    // Check whether file is an image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            $condition = 1;
            echo "File is an image - " . $check["mime"]." ";            
        } else {
            $condition = 0;
            echo "File is not an image ";          
        }
    }

    // Check whether file already exists
    if (file_exists($targetFilePath)) {
        echo "File already exists ";
        $condition = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 2097152) {
        echo "Your file is too large ";
        $condition = 0;
    }

    if ($condition == 0) {
        echo "Upload failed ";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePat)) {
            echo "Image ". htmlspecialchars( basename( $_FILES["file"]["name"])). " uploaded sucessfully.";
        } else {
            echo "There was an error uploading your file";
        }
    }
?>