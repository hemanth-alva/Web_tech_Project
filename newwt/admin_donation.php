<?php
include('adminsession.php');
if(!isset($_SESSION['login_user'])){
header("location: log_in_admin.php"); // Redirecting To Home Page
}

if(isset($_GET['del']))
		  {
		          mysqli_query($conn,"delete from donation where orphan = '".$_GET['orphan']."'");
                  $_SESSION['msg']="data deleted !!";
		  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="ie=edge">
	<title>Admin | Manage Orphanages</title>
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
            <li><a href="admin_donor.php">Donor</a></li>
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
    <h2 class="home">ADMIN | DONATION</h2>

    <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                                <?php echo htmlentities($_SESSION['msg']="");?></p> 
<div align="center">
<table  border="1" align="center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Donor</th>
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
                                                <td><?php echo $row['donor'];?></td>
                                                <td><?php echo $row['orphanage'];?></td>
                                                <td><?php echo $row['orphan'];?></td>
                                                <td><?php echo $row['age'];?>
                                                </td>
                                                <td><?php echo $row['orpcontact'];?></td>
                                                <td><?php echo $row['area'];?></td>
                                                <td><a href="admin_donation.php?orphan=<?php echo $row['orphan']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times fa fa-white"></i></a></td>
                                            </tr>
                                            
                                            <?php 
$cnt=$cnt+1;
                                             }?>
                                            
                                            
                                        </tbody>
                                    </table>
</div>

</body>
</html>