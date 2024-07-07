<?php
include("dbconnect.php");
session_start();
 $did=$_SESSION['did'];
	$id=$_REQUEST['id'];
	$qy=mysqli_query($connect,"update book set status='3' where id='$id'");
if($qy){?>
	<script> alert('Reject Success')
window.location.href=("viewbooking.php");</script>
<?php } ?>
<body>
</body>
</html>