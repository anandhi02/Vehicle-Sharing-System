<?php
include("dheader.php");
?>
<?php
include("dbconnect.php");
extract($_POST);
session_start();
$uid=$_SESSION['uid'];
$jid=$_REQUEST['id'];
$did=$_REQUEST['did'];

if (isset($_POST['btn'])) {
    $max_qry = mysqli_query($connect,"select max(id) from book");
	$max_row = mysqli_fetch_array($max_qry); 
	$id=$max_row['max(id)']+1;
    $qry = mysqli_query($connect, "insert into book values('$id', '$jid', '$did', '$uid','', '$ufrom', '$uto', '$gender', '$numPassengers', '$specialRequests','','')");
    if ($qry) {
?>
        <script>
            alert('Booking successful');
            window.location.href = "conform.php";
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-green-btn {
            background-color: #008374;
            color: #fff;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>

<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">

    <div class="container mt-5 form-container">
        <h2 class="text-center">Confirm Your Booking</h2>
        <p class="text-center">Enter your starting and destination point and then Book...</p>

        <form action="" method="post" >
            <div class="form-group">
                <label for="ufrom">From</label>
                <input type="text" class="form-control" id="ufrom" name="ufrom" required>
            </div>

            <div class="form-group">
                <label for="uto">To</label>
                <input type="text" class="form-control" id="uto" name="uto" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" required>
            </div>

            <div class="form-group">
                <label for="numPassengers">Number of Passengers</label>
                <input type="text" class="form-control" id="numPassengers" name="numPassengers" required>
            </div>

            <div class="form-group">
                <label for="specialRequests">Special Requests</label>
                <input type="text" class="form-control" id="specialRequests" name="specialRequests" required>
            </div>


            <div class="text-center">
                <input name="btn" id="btn" type="submit" class="btn custom-green-btn" value="Book" />
            </div>
            <br><br>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
include("footer.php");
?>
