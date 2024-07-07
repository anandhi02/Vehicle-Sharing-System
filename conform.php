<?php
include("dheader.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.amritsartaxirental.com/theme/images/taxi-rental-in-amritsar.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: black; 
        }

        .custom-green-btn {
            background-color: #008374;
            color: #fff;
        }

        .confirmation-container {
            max-width: 600px;
            margin: auto;
            background-color: rgba(255, 255, 255); 
            padding: 20px;
            border-radius: 10px; 
        }
    </style>
</head>

<body>
    <div class="container mt-5 confirmation-container">
        
        <p class="text-center">Your booking has been confirmed. Thank you for using our website!</p>
        <br>
        <div class="text-center">
            <a href="userhome.php" class="btn custom-green-btn">Back to HomePage</a>
        </div>
        <br><br>
        <div class="text-center">
            <button type="button" class="btn custom-green-btn" data-toggle="modal">
            <a href="ViewB.php" class="btn custom-green-btn">Track your request</a>
            </button>
        </div>
        <br><br>
    </div>
    <br><br>

    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Payment details and instructions go here.
                </div>
                <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn custom-green-btn" onclick="proceedWithPayment()">Proceed with Payment</button>
</div>

<script>
    function proceedWithPayment() {
        window.location.href = "pay.php";
    }
</script>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include("footer.php");
?>
