<?php
include("dheader.php");
?>
<?php
include("dbconnect.php");
extract($_POST);
session_start();
$uid = $_SESSION['uid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyBk/6WxjSzp5JCAhKko2uTpGHPJ/sb9aJ" crossorigin="anonymous">
    <title>Your Booking Status</title>
    <style>
        .custom-green-btn {
            background-color: #008374;
            color: #fff;
        }

        .custom-orange-btn {
            background-color: #f85a40;
            color: #fff;
        }

        .custom-red-btn {
            background-color: red;
            color: #fff;
        }
    </style>
</head>

<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
 
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Booking Status</h2>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="userhome.php">Home</a></li>
        <li><a href="userhome.php">Search Journey</a></li>
		<li><a>View Booking</a></li>
		
      </ol>
    </div>
  </nav>

    <div class="container mt-5">
        <h2 class="text-center">Your Booking Status</h2><br><br>
        <div class="row font-weight-bold">
            <div class="col-md-1 text-center"><b>S.NO</b></div>
            <div class="col-md-2 text-center"><b>Driver ID</b></div>
            <div class="col-md-2 text-center"><b>From</b></div>
            <div class="col-md-2 text-center"><b>To</b></div>
            <div class="col-md-2 text-center"><b>Status</b></div>
            <div class="col-md-2 text-center"><b>Action</b></div>
        </div><br>
        <div class="row border-bottom">
      </div><br>
        <?php
        $qrt = mysqli_query($connect, "select * from book where uid='$uid'");
        while ($rt = mysqli_fetch_array($qrt)) {
        ?>
            <div class="row border-bottom">
                <div class="col-md-1 text-center"><?php echo $rt['id']; ?></div>
                <div class="col-md-2 text-center"><?php echo $rt['did']; ?></div>
                <div class="col-md-2 text-center"><?php echo $rt['ufrom']; ?></div>
                <div class="col-md-2 text-center"><?php echo $rt['uto']; ?></div>
                <div class="col-md-2 text-center">
                    <?php
                    $st = $rt['status'];

                    if ($st == '0') {
                        echo "<b>Waiting<br></b>";
                    } elseif ($st == '3') {
                        echo "<b>Rejected</b>";
                    } elseif ($st == '2') {
                        echo "<b>Accepted</b>";
                    } elseif ($st == '1') {
                        echo "<b>Payment done</b>";
                    }
                    ?>
                </div>
                <div class="col-md-2 text-center">
                    <?php
                    if ($st == '2') {
                        echo "<a href='pay.php' class='btn custom-green-btn'>Proced to Payment</a>";
                    }
                    elseif ($st == '3') {
                      echo "<a href='userhome.php' class='btn btn-success'>View other Journeys</a>";
                  }
                  elseif ($st == '0') {
                    echo "<a href='cancel.php' class='btn custom-red-btn'>Cancel the Request</a>";
                }
                elseif ($st == '1') {
                    echo "<a href='driverinfo.php?driver_id=" . $rt['did'] . "' class='btn custom-orange-btn'>View Driver Details</a>";
              }
                    ?><br><br>
                </div>
            </div>
            <br>
        <?php } ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-GLhlTQ8i0X1iKy9q6yoJwI/X+960Zl5Sm8qO04l+r5h+3Q9bslVT+hF5Ff4bZhXk"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyBk/6WxjSzp5JCAhKko2uTpGHPJ/sb9aJ"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
include("footer.php");
?>
