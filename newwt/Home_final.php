<?php
$servername="localhost";
$uname="root";
$password="";
$conn = new mysqli($servername, $uname, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS wtproject";
$conn->query($sql);
$sql = "CREATE DATABASE IF NOT EXISTS admin";
$conn->query($sql);
$conn->close();
$dbname="wtproject";
$connection = new mysqli($servername,$uname,$password,$dbname);
$sql = "CREATE TABLE IF NOT EXISTS signup(username VARCHAR(20),contact INT(10),email VARCHAR(50),passwd VARCHAR(20))";
$connection->query($sql);
$sql = "CREATE TABLE IF NOT EXISTS admin(username VARCHAR(20),contact INT(10),email VARCHAR(50),passwd VARCHAR(20))";
$connection->query($sql);
$sql = "CREATE TABLE IF NOT EXISTS manager(username VARCHAR(20),contact INT(10),email VARCHAR(50),passwd VARCHAR(20),address VARCHAR(100),city VARCHAR(20))";
$connection->query($sql);
$result=$connection->query("SELECT email from 'admin' where email='admin@gmail.com'");
if($result==false){
}elseif($result->num_rows==0){
$sql = "INSERT INTO admin(username,contact,email,passwd) values('admin','1234567890','admin@gmail.com','admin')";
$connection->query($sql);
}
$connection->close();

$dbname="admin";
$connection = new mysqli($servername,$uname,$password,$dbname);

$connection->close();
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #pic {
            width: 100%;
            height: 722px;
        }

        #carouselExampleControls {
            padding-bottom: 80px;
        }

        #col {
            text-align: center;
            margin: 0px 80px;
            color: white;
        }

        .btn {
            width: 100%;
            background: none;
            border: 2px solid #4caf50;
            color: white;
            /* padding: 5px; */
            cursor: pointer;
            margin: 12px 0;
            font-size: 18px;
            outline: none;

        }

        #man {
            background-color: black;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        #h21 {
            padding-bottom: 15px;
            border-bottom: 4px solid #4caf50;
            margin: 0px 50px;
        }

        #h22 {
            padding-bottom: 15px;
            border-bottom: 4px solid #4caf50;
            margin: 0px 70px;
        }

        #h23 {
            padding-bottom: 15px;
            border-bottom: 4px solid #4caf50;
            margin: 0px 70px;
        }

        #cont {
            padding-bottom: 80px;
        }

        #info {
            background-color: black;
            color: white;
            padding-bottom: 20px;
        }

        #cnct {
            padding-top: 30px;
            margin-bottom: 20px;
            margin-left: 60px;
            border-bottom: 4px solid #4caf50;
            margin-right: 1300px;
        }

        .center {
            margin-left: 60px;
        }

        #navbnd {
            padding-left: 10px;
        }
        #nav{
            background-color:rgb(247, 244, 244);
        }
    </style>
</head>

<body style="background-color: rgb(247, 244, 244) ;">
    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
        <!-- <img src="images2.jpg" height="50" width="50"> -->
        <p>&nbsp</p>
        <p>&nbsp</p>
        <p>&nbsp</p>
        <h3 id="navbnd" class="navbar-brand">AFO</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Home_final.php" style="margin-right: 100px;">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-right: 100px;">About Us <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" id="pic" src="images4.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="pic" src="images5.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="pic" src="images6.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container-fluid" id="cont">
        <div class="row">
            <div id="col" class="col-sm" style="background-color: black;">
                <h2 id="h21">Orphanage</h2>
                <br>
                <img id="man" src="manager7.jpg" height="150px" width="150px">
                <br>
                <input class="btn" type="button" name="" value="Log-in" id="mngButton" >
            </div>
            <div id="col" class="col-sm" style="background-color: black;">
                <h2 id="h22">Admin</h2>
                <br>
                <img id="man" src="admin.png" height="150px" width="150px">
                <br>
                <input class="btn" type="button" name="" value="Log-in" id="adminButton">
            </div>
            <div id="col" class="col-sm" style="background-color: black;">
                <h2 id="h23">Donor</h2>
                <br>
                <img id="man" src="donar.png" height="150px" width="150px">
                <br>
                <a href="log_in_donar.php"><input class="btn" type="button" name="" value="Log-in" id="donorButton"></a>
            </div>
        </div>
    </div>
    <div id="info">
        <h2 id="cnct">Contact Us</h2>
        <div class="center">
            &nbsp;
            <p>
                <i class="	fa fa-address-book" aria-hidden="true"></i>
                : Askok Nagar, Near Garuda Mall, Bangalore-560025
            </p>
            <p>
                <i class="fa fa-phone" aria-hidden="true"></i>
                : +91 1234567890
            </p>
            <p>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                : center1@gmail.com
            </p>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById("mngButton").onclick = function () {
            location.href = "log_in_mng.php";
        };
        document.getElementById("adminButton").onclick = function () {
            location.href = "log_in_admin.php";
        };
        document.getElementById("donorButton").onclick = function () {
            location.href = "log_in_donar.php";
        };
    </script>
</body>

</html>