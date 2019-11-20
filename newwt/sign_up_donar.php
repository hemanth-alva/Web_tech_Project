<?php
$servername="localhost";
$uname="root";
$password="";
$dbname="wtproject";
$connection = new mysqli($servername,$uname,$password,$dbname);
if(isset($_POST['submit'])){
$username = $_POST['username'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$passwd = $_POST['passwd'];
$address = $_POST['address'];
$city = $_POST['city'];
$result=$connection->query("SELECT username from signup where username='$username'");
if($username !=''&&$email !=''&& ($result->num_rows==0)){
$query ="insert into signup(username, contact, email, passwd,address,city) values ('$username', '$contact', '$email', '$passwd','$address','$city')";
$connection->query($query);
echo "succesfully registered";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
$connection->close();

//creating database for the new user
if($username !=''&&$email !=''&&($result->num_rows==0)){
// Create connection
$conn = new mysqli($servername, $uname, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE $username";
//$stmt = $conn->prepare($sql);
//$stmt->bind_param('s', $username);
if ($conn->query($sql) === TRUE) {
    echo "new user Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
}
}
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        @import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: black;
            opacity: 0.8;
        }

        .login-box {
            width: 280px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .login-box h1 {
            float: left;
            font-size: 40px;
            border-bottom: 6px solid #4caf50;
            margin-bottom: 50px;
            padding: 13px 0;
        }

        .textbox {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            border-bottom: 1px solid #4caf50;
        }

        .textbox i {
            width: 26px;
            float: left;
            text-align: center;
        }

        .textbox input {
            border: none;
            outline: none;
            background: none;
            color: white;
            font-size: 18px;
            width: 200px;
            float: left;
            margin: 0 10px;
        }

        .btn {
            width: 100%;
            background: none;
            border: 2px solid #4caf50;
            color: white;
            padding: 5px;
            cursor: pointer;
            margin: 12px 0;
            font-size: 18px;
            outline: none;
        }

        #navbnd {
            padding-left: 10px;
        }

        #nav {
            background-color: rgb(247, 244, 244);
        }
    </style>
</head>

<body>
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
    <form method="post">
    <div class="login-box">
        <h1>Donor | Sign-Up</h1>
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="textbox">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <input type="text" placeholder="Contact" name="contact" required>
        </div>
        <div class="textbox">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input type="text" placeholder="Email-Id" name="email" required>
        </div>
        <div class="textbox">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input type="text" placeholder="Address" name="address" required>
        </div>
        <div class="textbox">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input type="text" placeholder="City" name="city" required>
        </div>
        <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Password" name="passwd" id="psw1" required>
            <i class="fa fa-eye-slash" aria-hidden="true" onclick="chantype1()"></i>
        </div>
        <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Re-Enter Password" name="" id="psw2" required>
            <i class="fa fa-eye-slash" aria-hidden="true" onclick="chantype2()"></i>
        </div>
        <input class="btn" type="submit" name="submit" value="Sign-Up" onclick="check()">
    </div>
    </form>
    <script>
        function chantype1() {
            var x = document.getElementById("psw1");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function chantype2() {
            var y = document.getElementById("psw2");
            if (y.type == "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }

        function check() {
            var ps1 = document.getElementById("psw1").value;
            var ps2 = document.getElementById("psw2").value;
            if (ps1 == '' || ps2 == '') {
                alert("Enter password");
            } else if (ps1 == ps2) {
                window.location.href = "C:\Users\pulas\Desktop\CSE\HTML\Project\Home.html";
            } else {
                alert("Enter passwords correctly");
            }
        }
    </script>
</body>

</html>