<?php
include("dheader.php");
include("dbconnect.php");
extract($_POST);
session_start();
$uid=$_SESSION['uid'];
?>
<main id="main">
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>VIEW JOURNEY <?php $uid?></h2>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="index.html">HOME</a></li>
        <li>VIEW JOURNEY</li>
      </ol>
    </div>
  </nav>
</div>

<section class="sample-page">
  <div class="container" data-aos="fade-up">
	<div id="page">
		 <div id="content">
			<div class="box">
				
                  <p align="center" class="style1">Search by entering starting and ending location </p>
		      
			</div>
      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Search Form</title>
    <style>
        .search {
            padding: 5px;
            margin: 5px;
        }

        .search-button {
            border-radius: 50%;
            padding: 10px 15px;
            background-color: #008374;
            color: #fff; 
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
    <div class="container text-center">
        <form method="POST" action="search-result.php">
            <input type="text" name="search-origin" placeholder="Origin" class="search" id="search-origin" required>
            <input type="text" name="destination-origin" placeholder="Destination" class="search" id="search-destination" required>
            <button type="submit" name="search" class="fa fa-search search-button"></button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<div class="container" data-aos="fade-up">
    <div class="row gy-4 justify-content-center">
      
    <div class="container text-center mt-4"><br>
    <?php
    $qry = mysqli_query($connect, "select * from journey");
    foreach ($qry as $row) { 
    ?>
        <div class="col-md-6 col-lg-4 d-inline-block align-top"><br>
            <div class="card mb-4" style="width: 20rem;"> <br>      
                    <?php
                    $i = $row['did'];
                    $re = mysqli_query($connect, "SELECT image FROM images where id='$i'");
                    $ro = $re->fetch_assoc();
                    $imageData = $ro['image'];
                    ?>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($imageData); ?>" alt="Uploaded Image" class="mx-auto d-block" style="width: 200px; height: 200px;">
       
                <div class="card-body">
                    <h5 class="card-title"><b>JOURNEY ID       : </b> <?php echo $row['id']; ?></h5>
                    <p class="card-text"><b>VEHICLE TYPE       : </b> <?php echo $row['vtype']; ?></p>
                    <p class="card-text"><b>VEHICLE NAME          : </b> <?php echo $row['vname']; ?></p>
                    <p class="card-text"><b>AVAILABLE NO. OF SEATS: </b> <?php echo $row['seat']; ?></p>
                    <p class="card-text"><b>DRIVER NAME           : </b> <?php echo $row['dname']; ?></p>
                    <p class="card-text"><b>ORIGINATION                 :</b>  <?php echo $row['fromm']; ?> </p>
                    <p class="card-text"><b>DESTINATION                : </b> <?php echo $row['too']; ?></p>
                    <p class="card-text"><b>DATE                  : </b> <?php echo $row['dt']; ?></p>
                    <a href="book.php?id=<?php echo $row['id']; ?>&did=<?php echo $row['did']; ?>" class="btn custom-green-btn">Request</a>
                </div>
            </div>
        </div>
    <?php 
    } 
    ?>
</div>
<style>
  .custom-green-btn {
    background-color: #008374;
    color: #fff; 
  }
</style>
    </div>
</div>
			<br class="clearfix" />
		</div>
		<br class="clearfix" />
	</div>
	<div id="page-bottom"><br class="clearfix" />
  </div>
</div>
</body>
</html>
<?php
include("footer.php");
?>


  