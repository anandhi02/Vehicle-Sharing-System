<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paypal Payment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<?php
    $dbConfig = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'name' => 'driver3'
    ];
    session_start();
    extract($_POST);
    if(isset($_POST['btn']))
{
$max_qry = mysqli_query( $dbConfig,"select max(id) from payments");
	$max_row = mysqli_fetch_array($max_qry); 
	$id=$max_row['max(id)']+1;
	$qry=mysqli_query( $dbConfig,"insert into payments values('$id','','','','','')");
if($qry)
{
?>
<script language="javascript">
alert("Registered successfully..");
window.location.href="userlogin.php";
</script>
<?php
}
else
{
?>
<script language="javascript">
alert("Registered Unsuccessfully..");
window.location.href="register.php";
</script>
	<?php
}
}
?>
    <style>
        body {
            background-image: url('https://images.pexels.com/photos/593158/pexels-photo-593158.jpeg?cs=srgb&dl=pexels-scott-webb-593158.jpg&fm=.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white; 
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); 
            border-radius: 10px;
            padding: 20px;
            margin-top: 100px; 
        }
        label {
            color: white;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        .custom-green-btn {
            background-color: #008374;
            color: #fff;
        }
        .custom-red-btn {
            background-color: #f85a40;
            color: #fff;
        }
    </style>
</head>
<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
<br><br>
    <div class="container mt-5">
        <h1 class="text-center">Enter the User Information</h1>
        <form class="paypal" action="payments.php" method="post" id="paypal_form">
           
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required />
            </div>

            <div class="form-group">
                <label for="gmail">Gmail:</label>
                <input type="text" name="gmail" id="gmail" class="form-control" required />
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" required />
            </div>
           

            <div class="form-group">
                <input type="hidden" name="cmd" value="_xclick" />
                <input type="hidden" name="no_note" value="1" />
                <input type="hidden" name="lc" value="UK" />
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                <input type="hidden" name="item_number" value="123456" />

                <input type="submit" id='btn' class="btn custom-green-btn" name="submit" value="Continue Payment "/>
                
                <a href="payment-cancelled.html" class="btn custom-red-btn"> Cancel Payment</a>
            </div>
        </form>
    </div>
    <br><br><br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <?php include("footer.php"); ?>

</body>
</html>
