<?php
include("ddheader.php");
?>
<?php
include("dbconnect.php");
extract($_POST);
session_start();
$did=$_SESSION['did'];
if(isset($_POST['btn']))
{
  $max_qry = mysqli_query($connect,"select max(id) from journey");
	$max_row = mysqli_fetch_array($max_qry); 
	$id=$max_row['max(id)']+1;
$qry=mysqli_query($connect,"insert into journey values('$id','$vtype','$vname','$vnumber','$dname','$fromm','$too','$seat','$amt','$contact','$dt','$did')");

if($qry)
{


echo "<script>alert('journey Added Successfull');</script>";

}
else
{
echo "<script>alert('Login UnSuccessfull');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Page Title</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   
    <div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>ADD JOURNEY<?php $uid?></h2>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="driverhome.php">HOME</a></li>
        <li>Add your Journey</li>
      </ol>
    </div>
  </nav>
</div>
</head>

<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="page-header d-flex align-items-center" style="background-image: url('');">
                    <div class="container position-relative">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <nav>
                    <div class="container">
                    </div>
                </nav>

                <form action="driverhome.php" method="post" enctype="multipart/form-data" id="form1">
        <div class="form-group">
            <label for="vehicleType">Vehicle Type</label>
            <input type="text" class="form-control" id="vtype" name="vtype" placeholder="Eg: Car, Bike" pattern="[A-Za-z\s]+" required>
            
        </div>

        <div class="form-group">
            <label for="vehicleName">Vehicle Name</label>
            <input type="text" class="form-control" id="vname" name="vname" placeholder="Eg: Innova, Indica" pattern="[A-Za-z\s]+" required>
            
        </div>

        <div class="form-group">
            <label for="vehicleNumber">Vehicle Number</label>
            <input type="text" class="form-control" id="vnumber" name="vnumber" placeholder="Eg: TN-XX-AA-0000" pattern="[A-Za-z0-9-]+" required>
            
        </div>

        <div class="form-group">
            <label for="driverName">Driver Name</label>
            <input type="text" class="form-control" id="dname" name="dname" placeholder="Eg: Ram" pattern="[A-Za-z\s]+" required>
            
        </div>

        <div class="form-group">
            <label for="fromLocation">From</label>
            <input type="text" class="form-control" id="fromm" name="fromm" placeholder="Origin" required>
        </div>

        <div class="form-group">
            <label for="toLocation">To</label>
            <input type="text" class="form-control" id="too" name="too" placeholder="Destination" required>
        </div>

        <div class="form-group">
            <label for="toLocation">Share Amount</label>
            <input type="text" class="form-control" id="amt" name="amt" placeholder="Amount in numbers" required>
        </div>

        <div class="form-group">
            <label for="seatsAvailable">Seats Available</label>
            <input type="text" class="form-control" id="seat" name="seat" placeholder="No. of seats" required>
        </div>

        <div class="form-group">
            <label for="contactNumber">Contact</label>
            <input type="tel" class="form-control" id="contact" name="contact" placeholder="Eg: 9999777700" pattern="[0-9]{10}" required>
          
        </div>

        <div class="form-group">
            <label for="dateTime">Date & Time</label>
            <input type="datetime-local" class="form-control" id="dt" name="dt" required oninput="validateDateTime()">
        </div>

        <div class="text-center">
            <input name="btn" id="btn" type="submit" class="btn custom-green-btn" value="Submit" />
            <input type="reset" class="btn btn-secondary" value="Reset" />
        </div>
    </form>
            </div>
        </div><br>
    </div><br>
    <style>
  .custom-green-btn {
    background-color: #008374;
    color: #fff; 
  }
</style>
<script>
function validateDateTime() {
    var currentDate = new Date();
    var inputDate = new Date(document.getElementById('dt').value);
    if (inputDate <= currentDate) {
        alert("Please select a date and time greater than the current date and time.");
        document.getElementById('dt').value = ''; 
    }
}
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<?php
include("footer.php");
?>