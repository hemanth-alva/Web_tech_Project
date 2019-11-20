<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: log_in_donar.php"); // Redirecting To Home Page
}
$servername="localhost";
$uname="root";
$password="";
$dbname="wtproject";
$connection = new mysqli($servername,$uname,$password,$dbname);
if($login_session=="admin"){
    $table="admin";
}else{
    $table="signup";
}
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $oldpw = $_POST['oldpw'];
    $newpw = $_POST['newpw'];

$sql="update $table set passwd=$newpw where email=$email";
//$stmt=$connection->prepare($sql);
//$stmt->bind_param("sss",$table,$newpw,$email);
if ($connection->query($sql) === TRUE) {
    echo "Password changed succesfully";
} else {
    echo "Error changing password";
}
}
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="ie=edge">
    <title>Navigation</title>
    <style>
        @import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        nav {
            display: flex;
            /*To make it appear next to each other*/
            justify-content: space-around;
            /* Space it around */
            align-items: center;
            min-height: 8vh;
            font-family: sans-serif;
            background-color: rgb(255, 255, 255);
        }

        .logo {
            text-transform: uppercase;
            letter-spacing: 5px;
            font-size: 20px;

        }

        .nav-link {
            display: flex;
            justify-content: space-around;
            width: 50%;
        }

        .nav-link li {
            list-style: none;
        }

        .nav-link a {
            text-decoration: none;
            font-size: 14px;
            letter-spacing: 2px;
            color: black;
        }

        .burger div {
            width: 25px;
            height: 3px;
            margin: 5px;
            background-color: black;
        }

        .burger {
            display: none;
        }

        @media screen and (max-width: 1024px) {
            .nav-link {
                width: 60%;
            }
        }

        @media screen and (max-width: 768px) {
            body {
                overflow: hidden;
            }

            .nav-link {
                position: absolute;
                right: 0px;
                height: 92vh;
                top: 8vh;
                /* background-color: black; */
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 40%;
                align-items: center;
                transform: translateX(100%);
                transition: transform 0.5s ease-in;
            }

            .nav-link li {
                opacity: 0;

            }

            .burger {
                display: block;
                cursor: pointer;
            }
        }

        .nav-active {
            transform: translateX(0%);
        }

        @keyframes navLinkFade {
            from {
                opacity: 0;
                transform: translate(50px);
            }

            to {
                opacity: 1;
                transform: translate(0px);
            }
        }

        .toggle .line1 {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .toggle .line2 {
            opacity: 0;
        }

        .toggle .line3 {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: black;
            /*padding: 14px 16px;*/
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .dropdown:hover .dropbtn {
            background-color: white;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: blue;
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
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <h4>AFO</h4>
        </div>
        <ul class="nav-link">
            <li><a href="#">Home</a></li>
            <li><a href="#">My Children</a></li>
            <li><a href="#">Adopt</a></li>
            <li>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $login_session; ?>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="changepw.php">Change Password</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <form method="post">
    <div class="login-box">
            <h1>Update</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Email" name="email" required>
            </div>
            <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Old-Password" name="oldpw" id="psw1" required>
                    <i class="fa fa-eye-slash" aria-hidden="true" onclick="chantype1()"></i>
                </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="New-Password" name="newpw" id="psw2" required>
                <i class="fa fa-eye-slash" aria-hidden="true" onclick="chantype2()"></i>
            </div>
            <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="New-Password" name="" id="psw3" required>
                    <i class="fa fa-eye-slash" aria-hidden="true" onclick="chantype3()"></i>
                </div>
            <input class="btn" type="submit" name="submit" value="Confirm" onclick="check()">
        </div>
    </form>

    <script>
        const navSlide = () => {
            const burger = document.querySelector('.burger');
            const nav = document.querySelector('.nav-link');
            const navLinks = document.querySelectorAll('.nav-link li');
            //Toggle Nav
            burger.addEventListener('click', () => {
                nav.classList.toggle('nav-active');
                // Animate LInk
                navLinks.forEach((link, index) => {
                    // console.log(link);
                    if (link.style.animation) {
                        link.style.animation = ``
                    } else {
                        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
                    }
                    // console.log(index / 5);
                    //using index to delay for each particular link
                });
                //burger animation
                burger.classList.toggle('toggle');
            });
        }

        navSlide();
        function chantype1() {
            var x = document.getElementById("psw1");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function chantype2() {
            var x = document.getElementById("psw2");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function chantype3() {
            var x = document.getElementById("psw3");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function check(){
                var ps1 = document.getElementById("psw2").value;
                var ps2 = document.getElementById("psw3").value;
                if(ps1=='' || ps2==''){
                    alert("Enter password");
                }
                else if(ps1==ps2){
                    alert("Password has been changed");
                    window.location.href="#";
                }
                else{
                    alert("Please make sure that new passwords entered are same");
                }
            }
    </script>
</body>

</html>