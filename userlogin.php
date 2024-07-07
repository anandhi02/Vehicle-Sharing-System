<?php
include("header.php");
?>
<?php
include("dbconnect.php");
extract($_POST);
session_start();
if(isset($_POST['btn']))
{
$qry=mysqli_query($connect,"select * from register where uname='$uname' && password='$password'");
$num=mysqli_num_rows($qry);
if($num==1)
{
$rw=mysqli_fetch_array($qry);
$_SESSION['uid']=$rw['id'];
echo "<script>alert('Login Successfull');</script>";
header("location:userhome.php");
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
  
</head>
<body style="background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20190223/ourmid/pngtree-background-silver-grey-gradient-horizontal-stripes-road-metal-background-graybargrainbannersilvergraysimple-image_69621.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
  
<div class="container mt-5" >
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            <h2>User Login</h2>
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
              <br>
              <div class="text-center">
              <button name="btn" type="submit" class="btn custom-green-btn">Login</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
              <p class="text-right" align="right"><a href="register.php">New User Register</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
  .custom-green-btn {
    background-color: #008374;
    color: #fff; 
  }
</style>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
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