<?php
include("config.php");
?>
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
        <h1>My StudyKPI</h1>
    </div>
    
    <?php 
    if(isset($_SESSION["UID"])){
        include 'logged_menu.php';
    }
    else {
        include 'menu.php';
    }
    ?>

    <?php
    //query the table user and profile
    $sql = "SELECT * FROM profile";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $matricNo = $row["matricNo"];
        $userEmail = $row["userEmail"];
        $name = $row["username"];
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
            <form id="profile" action="profile_edit_action.php" method="post">
                <table id="profile_table" width="100%">
                    <tr>
                        <td width="164">Matric No.</td>
                        <td><?=$matricNo?></td>
                    </tr>
                    <tr>
                        <td width="164">Email</td>
                        <td><?=$userEmail?></td>
                    </tr>
                    <tr>
                        <td width="164">Name</td>
                        <td><input type="text" name="username" size="20" value="<?=$name?>"></td>
                    </tr>                    
                    <tr>
                        <td width="164">Program</td>
                        <td><select size="1" name="program">
                        <option value="" <?php echo ($program == '') ? 'selected' : ''; ?> disabled >Select Program</option>   
                        <option <?php echo ($program == 'Software Engineering') ? 'selected' : ''; ?>>Software Engineering</option>
                        <option <?php echo ($program == 'Network Engineering') ? 'selected' : ''; ?>>Network Engineering</option>
                        <option <?php echo ($program == 'Data Science') ? 'selected' : ''; ?>>Data Science</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td width="164">Mentor Name</td>
                        <td><input type="text" name="mentor" size="20" value="<?=$mentor?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"> 
                            My Study Motto:                           
                            <textarea rows="2" name="motto" style="width:100%"><?=$motto?></textarea>
                        </td>
                    </tr>
                </table>
<div style="text-align: right; padding-bottom:5px;">
                <input type="submit" value="Update"> <input type="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p>Copyright (c) 2023 - My Name</p>
    </footer>
</body>
</html>
