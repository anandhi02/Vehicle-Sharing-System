<?php
include("header.php");
?>
<?php
include("dbconnect.php");
session_start();
extract($_POST);
if (isset($_POST['btn'])) {
    $max_qry = mysqli_query($connect, "select max(id) from driver");
    $max_row = mysqli_fetch_array($max_qry);
    $id = $max_row['max(id)'] + 1;
    $qry = mysqli_query($connect, "insert into driver values('$id','$name','$gender','$age','$address','$location','$email','$pnumber','$uname','$password')");
    if ($qry) {
        ?>
        <script language="javascript">
            alert("Registered successfully");
            window.location.href = "uplode.php";
        </script>
    <?php
    } else {
        ?>
        <script language="javascript">
            alert("Registered Unsuccessfully..");
            window.location.href = "driverregister.php";
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Register Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       
</head>

<body style="background-image: url('https://cdn.chapelhouse.co.uk/chapelhouse/new/mghs072-4bb2cf679cc.jpg?width=450.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 align="center">Driver Register Form</h2><br>
                        <form id="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
    </div>

    <div class="form-group">
        <label>Gender</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="male" name="gender" value="male" required>
            <label class="form-check-label" for="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" class="form-check-input" id="female" name="gender" value="female" required>
            <label class="form-check-label" for="female">Female</label>
        </div>
    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required></textarea>
    </div>

    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" name="location" placeholder="Enter your location" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
        <label for="pnumber">Mobile</label>
        <input type="tel" class="form-control" id="pnumber" name="pnumber" placeholder="Enter your mobile number" required>
    </div>

    <div class="form-group">
        <label for="uname">Username</label>
        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter your username" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
    </div>

    <div class="form-group text-center">
        <input name="btn" type="submit" id="btn" class="btn custom-green-btn" value="Submit" />
        <input type="reset" class="btn btn-secondary" value="Reset" />
        <br>
    </div>
</form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <style>
  .custom-green-btn {
    background-color: #008374;
    color: #fff; 
  }
</style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<script>
    function validateForm() {
        var name = document.getElementById('name').value;
        var gender = document.querySelector('input[name="gender"]:checked');
        var age = document.getElementById('age').value;
        var address = document.getElementById('address').value;
        var location = document.getElementById('location').value;
        var email = document.getElementById('email').value;
        var pnumber = document.getElementById('pnumber').value;
        var username = document.getElementById('uname').value;
        var password = document.getElementById('password').value;


        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (name === "" || !gender || age === "" || address === "" || location === "" || email === "" || pnumber === "" || username === "" || password === "") {
                alert("All fields must be filled out");
                return false;
            }

            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }
            var usernamePattern = /^[a-zA-Z][a-zA-Z0-9_-]{4,19}$/;
            if (!usernamePattern.test(username)) {
                alert('Invalid username. It must start with a letter and can contain letters, numbers, underscores, and hyphens.');
                return false;
            }

            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordPattern.test(password)) {
                alert('Invalid password. It must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.');
                return false;
            }
        
    }
</script>
</script>



</body>
</html>
<?php
include("footer.php");
?>
