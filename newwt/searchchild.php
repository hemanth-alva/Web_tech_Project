<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: log_in_donar.php"); // Redirecting To Home Page
}
$servername="localhost";
$uname="root";
$password="";


if(isset($_POST['submit']))
{
$orphanage=$_POST['orphanage'];
$orphan=$_POST['orphan'];
$uid=$_SESSION['uid'];
$school=$_POST['school'];
$area=$_POST['area'];
$age=$_POST['age'];
$donor=$_POST['donor'];
$query=mysqli_query($conn,"insert into donation(orphanage,orphan,uId,school,area,age,donor) values('$orphanage','$orphan','$uid','$school','$area','$age','$donor')");
	if($query)
	{
		echo "<script>alert('Your successfully adopted a child');</script>";
	}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Search</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        nav {
            background-color: wheat;
            display: flex;
            /*To make it appear next to each other*/
            justify-content: space-around;
            /* Space it around */
            align-items: center;
            min-height: 8vh;
            font-family: sans-serif;
        }

        .logo {
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-size: 20px;

        }

        .nav-link {
            margin-top: 10px;
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
                background-color: wheat;
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

        .home {
            font-family: sans-serif;
            letter-spacing: 5px;
            margin-top: 80px;
            margin-left: 81px;
            padding-bottom: 10px;
            margin-right: 1130px;
            border-bottom: 3px solid black;
            margin-bottom: 120px;
        }

        #col {
            text-align: center;
            margin: 0px 80px;
            color: white;
        }

        .btn {
            width: 15%;
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
            margin-bottom: 20px;
            margin-top: 15px;
        }

        #h21 {
            padding-top: 12px;
            padding-bottom: 15px;
            border-bottom: 4px solid #4caf50;
            margin: 0px 50px;
        }

        #h22 {
            padding-top: 12px;
            padding-bottom: 15px;
            border-bottom: 4px solid #4caf50;
            margin: 0px 70px;
        }

        #h23 {
            padding-top: 12px;
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

        .navdrop {
            float: left;
            overflow: hidden;
        }

        .navdrop .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: black;
            /*padding: 14px 16px;*/
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navdrop:hover .dropbtn {
            /* background-color: white; */
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
        
    </style>

</head>

<body>
    <nav>
        <div class="logo">
            <h4>AFO</h4>
        </div>
        <ul class="nav-link">
            <li><a href="profile.php">Home</a></li>
            <li><a href="donor_kid.php">My Children</a></li>
            <li><a href="#">Adopt</a></li>
            <li>
                <div class="navdrop">
                    <button class="dropbtn"><?php echo $login_session; ?>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="navdropcont">
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
    </script>
    <h1 class="home">DONOR|SEARCH ORPHANS</h1>
<form method="post">
    <div align="center">
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Orphanage name" name="orphanage" required>
        </div>
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Orphan name" name="orphan" required>
        </div>
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Username" name="donor" required>
        </div>
        <div class="textbox">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input type="text" placeholder="Age" name="age" required>
        </div>
        <div class="textbox">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <input type="text" placeholder="Contact" name="orpcontact" required>
        </div>
        <div class="textbox">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input type="text" placeholder="Area" name="area" required>
        </div>
        <input class="btn" type="submit" name="submit" value="Submit" onclick="check()">
    </div>
    </form>
  
</body>
</html>