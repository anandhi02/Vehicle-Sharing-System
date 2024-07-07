<?php
include("ddheader.php");
?>
<?php
include("dbconnect.php");
extract($_POST);
session_start();
$did=$_SESSION['did'];
?>

<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>PAYMENT'S DONE<?php $uid?></h2>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="index.html">Home</a></li>
        <li><a href="driverhome.php">Update Journey</a></li>
		<li><a href="ViewBooking.php">View Booking</a></li>
		<li><a>Payment done</a></li>
      </ol>
    </div>
  </nav>

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Payment done Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
  </style>
</head>
<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
<h2 class="card-title" align="center"><br>Received Payment Details</h2>
<div class="container mt-4">
  <div class="row">
    <?php
      $qrt = mysqli_query($connect, "select * from book where did='$did' && status='1'");
      while ($rt = mysqli_fetch_array($qrt)) {
        $uid = $rt['uid'];
        $qrt1 = mysqli_query($connect, "select * from register where id='$uid'");
        $rt1 = mysqli_fetch_array($qrt1);
    ?>
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <p class="card-text">S.NO: <?php echo $rt['id']; ?></p>
          <p class="card-text">User ID: <?php echo $rt['uid']; ?></p>
          <p class="card-text">User Name: <?php echo $rt1['name']; ?></p>
          <p class="card-text">Mobile: <?php echo $rt1['pnumber']; ?></p>
          <p class="card-text">From: <?php echo $rt['ufrom']; ?></p>
          <p class="card-text">User: <?php echo $rt['uto']; ?></p>
          <p class="card-text">Amount Received:<?php echo $rt['paid']; ?></p>
        </div>
      </div>
    </div>
    <?php 
  } ?>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include("footer.php");
?>