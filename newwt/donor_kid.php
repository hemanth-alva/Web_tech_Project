<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: log_in_donar.php"); // Redirecting To Home Page
}
$servername="localhost";
$uname="root";
$password="";

if(isset($_GET['del']))
		  {
		          mysqli_query($conn,"delete from donation where orphan = '".$_GET['orphan']."'");
                  $_SESSION['msg']="data deleted !!";
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
    <title>MY KIDS</title>
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
            <li><a href="#">My Children</a></li>
            <li><a href="searchchild.php">Adopt</a></li>
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
    <h1 class="home">DONOR|MY KIDS</h1>
<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                                <?php echo htmlentities($_SESSION['msg']="");?></p> 
<div align="center">
<table  border="1" align="center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ophanage Name</th>
                                                <th>Orphan Name</th>
                                                <th>Age</th>
                                                <th>Orphanage Contact</th>>
                                                <th>Area</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$sql=mysqli_query($conn,"select * from donation");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
                                            	<tr align="center">
                                                <td><?php echo $cnt;?>.</td>
                                                <td><?php echo $row['orphanage'];?></td>
                                                <td><?php echo $row['orphan'];?></td>
                                                <td><?php echo $row['age'];?>
                                                </td>
                                                <td><?php echo $row['orpcontact'];?></td>
                                                <td><?php echo $row['area'];?></td>
                                                <td><a href="donor_kid.php?orphan=<?php echo $row['orphan']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times fa fa-white"></i></a></td>
                                            </tr>
                                            
                                            <?php 
$cnt=$cnt+1;
                                            
                                           }?>
                                            
                                        </tbody>
                                    </table>
</div>
  
</body>
</html>