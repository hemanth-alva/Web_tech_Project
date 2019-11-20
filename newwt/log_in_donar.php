<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
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
            background-color:rgb(247, 244, 244);
        }
    </style>
</head>

<body >
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
        <h1>Donor | Login</h1>
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Password" name="password" id="psw" required>
            <i class="fa fa-eye-slash" aria-hidden="true" onclick="chantype()"></i>
        </div>
        <input class="btn" type="submit" name="submit" value="Sign-in">
        <p>not a member?</p><a href="sign_up_donar.php">sign up</a>
    </div><br>
    </form>

    <script>
        function chantype() {
            var x = document.getElementById("psw");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>