<?php
include("ddheader.php");
include("dbconnect.php");
session_start();
$did = $_SESSION['did'];
?>
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>VIEW REQUEST </h2>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="index.html">Home</a></li>
        <li><a href="driverhome.php">Update your Journey</a></li>
        <li><a>View Request</a></li>
      </ol>
    </div>
  </nav>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyBk/6WxjSzp5JCAhKko2uTpGHPJ/sb9aJ" crossorigin="anonymous">
    <title>Application Status</title>
    <style>
        .custom-green-btn {
            background-color: #008374;
            color: #fff;
        }
        .custom-orange-btn {
            background-color: #f85a40;
            color: #fff;
        }
    </style>
</head>
<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
    <div class="container mt-5">
        <h2 class="text-center">Make your Decision</h2><br><br>

        <div class="row">

        <?php
// Assuming $connect is a valid MySQLi connection object
$qrt = mysqli_query($connect, "SELECT * FROM book WHERE did='$did' && status='0'");

// Looping through each row in the result set $qrt
while ($rt = mysqli_fetch_array($qrt)) {
    // Extracting the 'uid' from the fetched row
    $id = $rt['uid'];
    
    // Querying the 'register' table using the extracted 'id' with LIMIT 1
    $qrd = mysqli_query($connect, "SELECT * FROM register WHERE id='$id' LIMIT 1");

    // Fetching a single row from the result set $qrd
    $driverInfo = mysqli_fetch_array($qrd);
    ?>
    <div class="col-md-6">
        <!-- Your HTML code goes here with updated PHP variables -->
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <h2>
                        <!-- Updated PHP variables for each user -->
                        <div class="col text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S.NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rt['id']; ?></div>
                        <div class="col text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $driverInfo['name']; ?></div>
                        <div class="col text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENDER&nbsp;&nbsp;&nbsp;: <?php echo $driverInfo['gender']; ?></div>
                        <div class="col text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADDRESS&nbsp;: <?php echo $driverInfo['location']; ?></div>
                        <div class="col text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FROM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rt['ufrom']; ?></div>
                        <div class="col text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rt['uto']; ?></div>
                    </h2>
                    <div class="col mt-3">
                        <!-- Your buttons and links go here -->
                        <div class="col text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="accept.php?id=<?php echo $rt['id']; ?>" class="btn custom-green-btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accept&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;[OR]&nbsp;&nbsp;&nbsp;
                            <a href="reject.php?id=<?php echo $rt['id']; ?>" class="btn custom-orange-btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reject&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <?php
}
?>
 <br><br><br><br>
        </div>
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
</html><br><br><br>
<?php
include("footer.php");
?>
