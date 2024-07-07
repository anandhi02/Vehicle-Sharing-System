<?php
include("dbconnect.php");
session_start();
$uid = $_SESSION['uid'];

$qy = mysqli_query($connect, "DELETE FROM book WHERE status='0' AND uid='$uid'");

if ($qy) {
?>
<html>
<head>
<style>
    /* Full-screen alert styles */
    .full-screen-alert {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #008374;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .alert-content {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 0 10px rgba(23, 0, 34, 0.3); /* Add a subtle box shadow */
        max-width: 400px; /* Limit the maximum width of the alert */
        width: 80%; /* Adjust the width as needed */
        color: #333; /* Set text color */
    }

    h1 {
        color: #ff5733; /* Set heading color */
    }

    p {
        font-size: 16px; /* Adjust paragraph font size */
    }

    button {
        background-color:  #008374; /* Set button background color */
        color: white; /* Set button text color */
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 20px;
    }

    button:hover {
        background-color:  #008374; 
    }
</style>

</head>
<body>
    <div class="full-screen-alert">
        <div class="alert-content">
            <h1>Your request was cancelled</h1>
            <p>Go to booking page</p>
            <button onclick="closeAlert()">OK</button>
        </div>
    </div>

    <script>
        function closeAlert() {
            var alertDiv = document.querySelector('.full-screen-alert');
            alertDiv.parentNode.removeChild(alertDiv);
            window.location.href = "ViewB.php";
        }
    </script>
</body>
</html>
<?php
}
?>
