<?php
include("header.php");
?>

<?php
include("dbconnect.php");
extract($_POST);
session_start();
if(isset($_POST['btn']))
{
$qry=mysqli_query($connect,"select * from admin where name='$uname' && psw='$password'");
$num=mysqli_num_rows($qry);
if($num==1)
{
?>
<script>alert('welcome to admin home page');
</script>

<?php

header("location:ahome.php");
}
else
{
echo "<script>alert('User Name Password Wrong.....')</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20190223/ourmid/pngtree-background-silver-grey-gradient-horizontal-stripes-road-metal-background-graybargrainbannersilvergraysimple-image_69621.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            <h2>Admin Login</h2>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="uname">User Name:</label>
                <input type="text" class="form-control" id="uname" name="uname" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="text-center">
              <button name="btn" type="submit" class="btn custom-green-btn">Login</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .custom-green-btn {
    background-color: #008374;
    color: #fff; 
  }
</style>

</body>
</html>

			<br class="clearfix" />
		</div>
		<br class="clearfix" />
	</div>
	<div id="page-bottom"><br class="clearfix" />
  </div>
</div>
<?php
include("footer.php");
?>

