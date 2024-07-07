<?php
include("dheader.php");
include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Information</title>
    <style>
        body {
            background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <?php
        if (isset($_GET['driver_id'])) {
            $driverId = $_GET['driver_id'];
            echo "<h1 class='text-center'>Driver ID: $driverId</h1>";
        } else {
            echo "<p class='text-center'>No driver ID provided </p>";
        }
        $qry = mysqli_query($connect, "select * from driver where id='$driverId'");
        $re = mysqli_query($connect, "SELECT image FROM images  where id='$driverId'");
        while ($row = mysqli_fetch_array($qry)) {
        ?>
            <div class="col-md-6 mb-4 mx-auto">
                <div class="card">
                    <?php
                    $ro = $re->fetch_assoc();
                    $imageData = $ro['image'];
                    ?><br>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($imageData); ?>" alt="Uploaded Image" class="mx-auto d-block" style="width: 200px; height: 200px;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
                        <p><strong>Age:</strong> <?php echo $row['age']; ?></p>
                        <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
                        <p><strong>Email Id:</strong> <?php echo $row['email']; ?></p>
                        <p><strong>Phone Number:</strong> <?php echo $row['pnumber']; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>
