<?php
include("aheader.php");
?>
<?php
include("dbconnect.php");
?>
				
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
				
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Users Details</title>
</head>
<body>

<div class="container mt-4">
    <form action="" method="post" enctype="multipart/form-data" id="form1">
        <h2 class="text-center">Users Details</h2><br>
    </form>
    <div class="row">
        <?php
        $qry = mysqli_query($connect, "select * from register");

        while ($row = mysqli_fetch_array($qry)) {
        ?>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $row['name']; ?></h5>
                    <p class="text-center"><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
                    <p class="text-center"><strong>Age:</strong> <?php echo $row['age']; ?></p>
                    <p class="text-center"><strong>Address:</strong> <?php echo $row['address']; ?></p>
                    <p class="text-center"><strong>Email Id:</strong> <?php echo $row['email']; ?></p>
                    <p class="text-center"><strong>Phone Number:</strong> <?php echo $row['pnumber']; ?></p>
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
include("footer.php");
?>          	   