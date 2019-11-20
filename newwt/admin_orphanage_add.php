<?php
include('adminsession.php');
if(!isset($_SESSION['login_user'])){
header("location: log_in_admin.php"); // Redirecting To Home Page
}
//$servername="localhost";
//$uname="root";
//$password="";
//$dbname=$login_session;
//$connection = new mysqli($servername,$uname,$password,$dbname);
//$connection->close();

$servername="localhost";
$uname="root";
$password="";
$dbname="wtproject";
$connection = new mysqli($servername,$uname,$password,$dbname);
if(isset($_POST['submit'])){  // TAKING INFO FROM FORM
$username = $_POST['username'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$passwd = $_POST['passwd'];
$address = $_POST['address'];
$city = $_POST['city'];
$result=$connection->query("SELECT username from manager where email='$email'");
// INSERTING VALUES INTO TABLE
if($username !=''&&$email !=''&& ($result->num_rows==0)){
$query ="insert into manager(username, contact, email, passwd,address,city) values ('$username', '$contact', '$email', '$passwd','$address','$city')";
$connection->query($query);
echo "succesfully registered";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
$connection->close();

//creating database for the new orphanage
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

    //creating required tables inside the new orphanages database
    $connection = new mysqli($servername,$uname,$password,$username);
    $sql = "CREATE TABLE IF NOT EXISTS studentdet(uid VARCHAR(5),stdentname VARCHAR(20),age INT(3),school VARCHAR(50),area VARCHAR(20))";
    $connection->query($sql);
    $sql = "CREATE TABLE IF NOT EXISTS studentpro(uid VARCHAR(5),stdentname VARCHAR(20),currentgrade VARCHAR(3),upcomingevents VARCHAR(100),school VARCHAR(50),area VARCHAR(20))";
    $connection->query($sql);
    $connection->close();    
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="ie=edge">
    <title>Navigation</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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
            background-color: black;
            color: white;
            border-bottom: 1px solid black;
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
            color: white;
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

        .navdrop {
            float: left;
            overflow: hidden;
        }

        .navdrop .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            /*padding: 14px 16px;*/
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navdropcont {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .navdropcont a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .navdropcont a:hover {
            background-color: #ddd;
        }

        .navdrop:hover .navdropcont {
            display: block;
        }

        .home {
            font-family: sans-serif;
            letter-spacing: 5px;
            margin-top: 80px;
            margin-left: 81px;
            padding-bottom: 10px;
            margin-right: 1010px;
            border-bottom: 3px solid black;
            margin-bottom: 120px;
        }

        #info {
            background-color: black;
            color: white;
            padding-bottom: 20px;
            font-family: sans-serif;
        }

        #cnct {
            font-family: sans-serif;
            padding-bottom: 10px;
            padding-top: 30px;
            margin-bottom: 33px;
            font-size: 31px;
            margin-left: 60px;
            border-bottom: 4px solid #4caf50;
            margin-right: 1280px;
            letter-spacing: 1px;
        }

        .center {
            letter-spacing: 1px;
            font-family: sans-serif;
            margin-left: 60px;
        }

        .center p {
            margin-bottom: 25px;
        }

        .upform {
            margin-bottom: 200px;
        }

        .textbox {
            margin-left: 80px;
            margin-right: 900px;
            /* width: 100%; */
            overflow: hidden;
            font-size: 20px;
            padding-top: 8px;
            margin-bottom: 20px;
            border-bottom: 1px solid black;
            padding-bottom: 20px;
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
            /* color: white; */
            font-size: 18px;
            width: 400px;
            float: left;
            margin-left: 10px;
            margin-right: 60px;
        }

        .btn {
            width: 350px;
            background: none;
            border: 2px solid black;
            padding: 8px 5px;
            text-align: center;
            cursor: pointer;
            margin-left: 180px;
            margin-top: 110px;
            font-size: 18px;
            outline: none;
        }

        .btn:hover {
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <nav>
		<div class = "logo">
			<h4>AFO</h4>
		</div>
		<ul class="nav-link">
            <li><a href="adminprofile.php">Dashboard</a></li>
            <li><a href="#">Donor</a></li>
            <li>
            	<div class="navdrop">
                    <button class="dropbtn">
                    	Orphanages
                    </button>
                    <div class="navdropcont">
                        <a href="admin_orphanage_manage.php">Manage ophanages</a>
                        <a href="admin_orphanage_add.php">Add orphanage</a>
                    </div></li>
            <li>
                <div class="navdrop">
                    <button class="dropbtn">
                        Admin
                    </button>
                    <div class="navdropcont">
                        <a href="#">Change Password</a>
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

    <h2 class="home">ADMIN | ORPHANAGE-ADD</h2>
    
    <div class="upform">
    <form method="post">
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Orphanage Name" name="username" required>
        </div>
        <div class="textbox">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <input type="text" placeholder="Contact" name="contact" required>
        </div>
        <div class="textbox">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input type="text" placeholder="Mail-Id" name="email" required>
        </div>
        <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Password" name="passwd" id="psw" required>
            <i class="fa fa-eye-slash" aria-hidden="true" onclick="chantype()"></i>
        </div>
        <div class="textbox">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <input type="text" placeholder="Address" name="address" required>
        </div>
        <div class="textbox">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <input type="text" placeholder="City" name="city" required>
        </div>
        <input class="btn" type="submit" name="submit" value="Confirm">
    </form>
    </div>
    
    <div id="info">
        <h2 id="cnct">Contact Us</h2>
        <div class="center">
            &nbsp;
            <p>
                <i class="	fa fa-address-book" aria-hidden="true"></i>
                : Askok Nagar, Near Garuda Mall, Bangalore - 560025
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




