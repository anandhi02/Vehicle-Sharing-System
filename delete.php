<?php
include("ddheader.php");
?>
<?php
include("dbconnect.php");
session_start();
$did = $_SESSION['did'];

if (isset($_POST['btn'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);

    $check_query = mysqli_query($connect, "SELECT * FROM journey WHERE id='$id' AND did='$did'");
    $num_rows = mysqli_num_rows($check_query);

    if ($num_rows > 0) {
        $delete_query = mysqli_query($connect, "DELETE FROM journey WHERE id='$id' AND did='$did'");

        if ($delete_query) {
            echo "<script>alert('Journey Deleted Successfully');</script>";
        } else {
            echo "<script>alert('Error deleting journey');</script>";
        }
    } else {
        echo "<script>alert('Journey with ID $id not found');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Delete Journey</title>
</head>
<body style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/026/014/small_2x/soft-pastel-colors-gradient-blur-free-photo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
<br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Delete Journey</h2>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="id" bold>Journey ID</label>
                                <input type="text" class="form-control" id="id" name="id" placeholder="Enter Journey ID" required>
                            </div>
                            <div class="text-center">
                                <input name="btn" id="btn" type="submit" class="btn btn-danger" value="Delete" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


<?php
include("footer.php");
?>
