<?php
include("dbconnect.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $max_qry = mysqli_query($connect, "SELECT max(id) FROM driver");
    $max_row = mysqli_fetch_array($max_qry);
    $id = $max_row['max(id)'];
    $d = mysqli_query($connect, "SELECT name FROM driver WHERE id='$id'");
    $m = mysqli_fetch_array($d);
    $drivername = $m['name'];
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image)); 

        $sql = "INSERT INTO images (id, image, name) VALUES (?, ?, ?)";
        $statement = $connect->prepare($sql);
        $statement->bind_param('iss', $id, $imgContent, $drivername);
        $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connect));
        ?>
        <script language="javascript">
            alert("Photo uploaded successfully...");
            window.location.href = "login.php";
        </script>
        <?php

        $statement->close();
    }
}
$connect->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image to Database</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .phppot-container {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        .row {
            display: flex;
            justify-content: space-between;
        }
        input[type="file"] {
            flex: 1;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
 
    <div class="phppot-container">
        <h1>Upload Image to Database</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <input type="file" name="image" accept="image/*">
                <input name="btn" type="submit" id="btn" class="button" value="Upload" />
            </div>
        </form>
    </div>
</body>
</html>