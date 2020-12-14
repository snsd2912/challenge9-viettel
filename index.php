<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href='Page/about.php'>About</a>
    <form method="POST" action="Page/upload.php" enctype="multipart/form-data">
        <label for="myfile">Select image:</label> 
        <input type="file" id="file" name="file" onchange="change(event)" multiple><br>
        <input type="submit" value="Upload" name="submit">
    </form>
    <img id='output'>
    <!-- javascript -->
    <script>
        var change = function(event) { 
            var input = event.target;
            var reader = new FileReader(); 
            reader.onload = function() {
                document.getElementById('output').src = reader.result; 
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
</body>
</html>