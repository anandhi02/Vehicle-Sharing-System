<?php
include("aheader.php")			
?>
<?php
include("dbconnect.php");
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Driver Details</title>
</head>
<body>

<div class="container mt-4">
    <form action="" method="post" enctype="multipart/form-data" id="form1">
        <h2 class="text-center">Driver Details</h2><br>
    </form>
    <div class="row">
        <?php
        $qry = mysqli_query($connect, "select * from driver");
        $re = mysqli_query($connect, "SELECT image FROM images");
        while ($row = mysqli_fetch_array($qry)) {
        ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <?php
                    $ro = $re->fetch_assoc();
                    $imageData = $ro['image'];
                    ?>
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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

			</div>
			<br class="clearfix" />
		</div>
		<br class="clearfix" />
	</div>
</body>
</html>   


<?php
include("footer.php")			
?>
