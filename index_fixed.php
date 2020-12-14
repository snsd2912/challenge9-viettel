<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button onclick="window.location.href='Page/about.php'">About</button>

    <form method="POST" action="upload_fixed.php" enctype="multipart/form-data">
        <label for="myfile">Select image:</label> 
        <input type="file" id="file" name="file" onchange="change(event)" multiple><br>
        <input type="submit" value="Upload" name="submit">
    </form>
    <img id='output'>
    <script>
        var change = function(event) { 
            var file = document.getElementById("file");
            var path = file.value;
            var allowExtensions =  /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowExtensions.exec(path)) {
                alert('Only png, jpg, gif files are allowed to upload.');
                file.value = '';
                return false;
            }else {
                if (file.files && file.files[0]) { 
                    var input = event.target;
                    var reader = new FileReader(); 
                    reader.onload = function() {
                        document.getElementById('output').src = reader.result; 
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        }
    </script>
</body>
</html>