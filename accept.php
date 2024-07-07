<?php
include("dbconnect.php");
session_start();
$did = $_SESSION['did'];
$id = mysqli_real_escape_string($connect, $_REQUEST['id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = mysqli_real_escape_string($connect, $_POST['amount']);
    $selectQuery = "SELECT numPassengers FROM book WHERE id='$id'";
    $selectResult = mysqli_query($connect, $selectQuery);
    if ($selectResult ) {
        $row = mysqli_fetch_assoc($selectResult );
        $numPassengers = $row['numPassengers'];
    } else {
        die('Error fetching amount: ' . mysqli_error($connect));
    }
    $delete = mysqli_query($connect,"SELECT seat FROM journey WHERE id='$id'" );
    if ($delete ) {
        $row = mysqli_fetch_assoc($delete);
        $del = $row['seat'];
    } else {
        die('Error fetching amount: ' . mysqli_error($connect));
    }   
$updateBookQuery = "UPDATE book SET status='2', amount='$amount' WHERE id='$id'";
$qy = mysqli_query($connect, $updateBookQuery);
$updateJourneyQuery = "UPDATE journey SET seat=seat-$numPassengers  WHERE did=$did";
$qr = mysqli_query($connect, $updateJourneyQuery);
$deleteRowQuery = "DELETE FROM journey WHERE seat<=0 AND did = $did";
$dr = mysqli_query($connect, $deleteRowQuery);
    if ($qy && $qr) {
        ?>
        <script>
            alert('Accept Success. Amount: <?php echo $amount; ?>');
            window.location.href = "viewpayment.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error updating records. Please try again.');
            window.location.href = "viewbooking.php";
        </script>
        <?php
    }
    mysqli_close($connect);
}
?>
<?php
include("ddheader.php");
?>
<html>
<head>
    <!-- Include Bootstrap CSS link here -->
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body"><br><br>
                        <h2 class="card-title text-center">YOUR SHARE AMOUNT</h2>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="id" bold></label>
                                <input type="text" class="form-control" name="amount" id="amount"  placeholder="Enter the amount in numbers" required>
                            </div><br><br>
                            <div class="text-center">
                                <input name="btn" id="btn" type="submit" class="btn btn-danger" value="Add Amount" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br><br><br><br><br>
</body>
</html>


<?php
include("footer.php");
?>
