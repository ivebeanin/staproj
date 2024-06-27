<?php
session_start();
include("config.php");
?>

<?php include 'menu.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>Responsive Header</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</head>
<body>
    <div class="header">
        <h1>My Profile</h1>
    </div>
	
	<div class="imgcontainer">
                <img src="img/photo.png" alt="Avatar" class="avatar">
    </div>
    
    <?php
    //query the user and profile table for this user
    $sql = "SELECT * FROM profile";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $matricNo = $row["matricNo"];
        $userEmail = $row["userEmail"];
        $username = $row["username"];
        $program = $row["program"];
        $mentor = $row["mentor"];
        $motto = $row["motto"];
    }
    ?>

    <div class="row">
        <div class="col-left">
            <img class="image" src="img/photo1.png">
        </div>
        <div class="col-right"> 
            <div style="text-align: right; padding-bottom:5px;">
                <a href="profile_edit.php">Edit</a>
            </div> 
            <table border="1" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td width="164">Name</td>
                    <td><?=$username?></td>
                </tr>
                <tr>
                    <td width="164">Matric No.</td>
                    <td><?=$matricNo?></td>
                </tr>
                <tr>
                    <td width="164">Email</td>
                    <td><?=$userEmail?></td>
                </tr>
                <tr>
                    <td width="164">Program</td>
                    <td><?=$program?></td>
                </tr>
                <tr>
                    <td width="164">Mentor Name</td>
                    <td><?=$mentor?></td>
                </tr>
            </table>
            <p>My Study Motto</p>
            <table border="1" width="100%" style="border-collapse: collapse">
                <tr>
                    <td>
                        <?php
                        if($motto==""){
                            echo "&nbsp;";
                        }
                        else{
                            echo $motto;
                        }

                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <footer>
        <p>Copyright (c) 2023 - My Name</p>
    </footer>
</body>
</html>
