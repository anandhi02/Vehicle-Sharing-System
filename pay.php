<?php
include("dheader.php");
include("dbconnect.php");

session_start();
$uid = $_SESSION['uid'];

$id_result = mysqli_query($connect, "SELECT id FROM book WHERE uid='$uid'");
$id_row = mysqli_fetch_assoc($id_result);
$id = $id_row['id'];

$result = mysqli_query($connect, "SELECT amount FROM book WHERE uid='$uid' AND id='$id'");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $amount = $row['amount'];
} else {
    die('Error fetching amount: ' . mysqli_error($connect));
}

if (isset($_POST['btn'])) {
    $qy=mysqli_query($connect,"update book set status='1', paid='$amount' where id='$id' and uid='$uid'");
if($qy){?>
	<script> alert('loading payment window..')
window.location.href=("paypal-example-master/pays.php");</script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        .containerpay {
            text-align: center;
            margin-top: 50px;
        }

        #Checkout {
            max-width: 400px;
            margin: 0 auto;
        }

        .custom-container {
            background-color: #f8f9fa; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            margin-top: 50px;
        }

        .amount-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .custom-green-btn {
    background-color: #008374;
    color: #fff; 
  }
    </style>
</head>

<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
 
    <div class="container">
        <div class="containerpay">
            <div id="Checkout" class="inline">
                <div class="custom-container">
                    <h1>PAYMENT</h1>
                    <form action="pay.php" method="post" class="form">
                        <div class="form-group">
                            <label for="PaymentAmount">Payment amount</label>
                            <div class="amount-placeholder">
                                <span>Rs.</span>
                                <span><?php echo $amount; ?></span>
                            </div>
                            <img src="https://cdn.dribbble.com/users/1525393/screenshots/6448182/comp_3.gif"
                                alt="Your Image">
                        </div>
                        <br>
                        <input name="btn" id="PayButton" class="btn custom-green-btn" type="submit"
                            value="Go to Payment Process">
                    </form><br>
                </div>
            </div>
        </div>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>


<?php
include("footer.php");
?>
