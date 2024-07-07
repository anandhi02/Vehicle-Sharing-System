<?php
include("dheader.php");
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Fare Calculator</title>
    <link rel="stylesheet" href="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/4214c5a5e9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="main">
            <div class="container-fluid1">
                <h1 align="center">ENTER STARTING AND ENDING POINT</h1>
                <form  class="form-horizontal" align="center">
                    <div class="form-group">
                        <label for="from" class="label" >From: </label>
                        <div class="input">
                            <input type="text" id="from" placeholder="Origin" class="form-input">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="to" >To: </label>
                        <div class="input">
                     <input type="text" id="to" placeholder="Destination" class="form-input">
                        </div>
                        
                    </div>
                
                <div class="btn" >
                    <br>
                    <input class="btn btn-lg" type="button" value="Calculate" onclick="calcRoute()">
                </form>
                    <!-- <button class="btn btn-info btn-lg" onclick="calcRoute()" ></button> -->
                </div>
                <div id="fare">     <br><br>  
</div>
            </div>
            <div class="container-fluid2">
                <div id="googleMap">
                </div>
                <div id="output">
                </div>
            </div>
        </div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFyyMeD43QgoMb3tvKiFsD8naC8RzAk8Y&libraries=places"></script>
      <script src="script.js"></script>
</body>
</html>
<?php
include("footer.php");
?>
