<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>My Study KPI</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
		}

		header {
			background-color: #333;
			color: white;
			text-align: center;
			padding: 10px;
		}

		nav {
			background-color: #666;
			padding: 10px;
			text-align: center;
		}

		nav a {
			margin: 0 10px;
			color: white;
			text-decoration: none;
		}

		nav b {
			font-size: 18px;
		}

		section {
			margin: 20px;
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;
		}

		#profile {
			flex: 1;
			max-width: 400px;
		}

		#review-form {
			flex: 1;
			max-width: 400px;
		}

		#profile-image {
			width: 150px;
			height: 150px;
			border-radius: 50%;
			object-fit: cover;
		}

		form {
			margin-top: 20px;
		}

		label {
			display: block;
			margin-bottom: 8px;
		}

		input, select, textarea {
			width: 100%;
			padding: 8px;
			margin-bottom: 10px;
			box-sizing: border-box;
		}

		button {
			background-color: #333;
			color: white;
			padding: 10px;
			border: none;
			cursor: pointer;
		}
	</style>
	
	<style>
       
        #study-motto {
            flex: 1;
            max-width: 400px;
            margin-left: 20px; /* Add margin to separate it from the profile section */
        }

        /* Add a class for styling the motto content */
        .motto-content {
            font-style: italic;
            color: #333;
        }
    </style>
	

<body>
    <div class="header">
        <h1>My StudyKPI</h1>
    </div>
    
    
	
	<?php include 'menu.php';?>

    <div class="row">
        <div class="col-login">
        <?php 
        if(isset($_SESSION["UID"])){
            ?>
            <div class="imgcontainer">
                <img src="img/photo.png" alt="Avatar" class="avatar">
            </div>
        <?php
            echo '<p align="center">Welcome: '  . $_SESSION["userName"] . "<p>";
        }
        else {
        ?>
            
            <form action="login_action.php" method="post" id="login">
                <div class="imgcontainer">
                    <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Username" name="userName" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="userPwd" required>
                        
                    <button type="submit">Login</button>
                    <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <span class="psw">
                        <a onClick="showRegister()" style="cursor: pointer;"> Register</a> | 
                        <a style="cursor: pointer;">Forgot password?</a>
                    </span>
                </div>
            </form>
        <?php
        }
        ?>
        </div>
        <div class="col-news">
            <div id="newsDiv">
                <b>Announcement</b></p>         
                <p>
				This is my mykpi website which will be used for my whole university life. I hope it will help me to pass my exams with flying colours.
                </p>
                <p><b>News</b></p>
                <p>
				Since my university is semester-based, I will make changes to this website every beginning of a semester. 
                </p>
            </div>

            
        </div>              
    </div>
    <footer>
        <p>Copyright (c) 2023 - My Name</p>
    </footer>

<script>
//JS to show responsive menu
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

//JS to show div Registration id=registerDiv
function showRegister(){
    var x = document.getElementById("registerDiv");
    x.style.display = 'block';

    var x = document.getElementById("newsDiv");
    x.style.display = 'none';

    var firstField = document.getElementById('matricNo');
    firstField.focus();
}

//JS to cancel registration by hiding div (display=none)
function cancelRegister(){
    var x = document.getElementById("registerDiv");
    x.style.display = 'none';

    var x = document.getElementById("newsDiv");
    x.style.display = 'block';
}
