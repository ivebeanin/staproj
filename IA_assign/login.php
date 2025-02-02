<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
</head>
<body>

  <h2>Login</h2>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div>
      <label for="userName">Username:</label>
      <input type="text" id="userName" name="userName" required>
    </div>
    <br>
    <div>
      <label for="userPwd">Password:</label>
      <input type="password" id="userPwd" name="userPwd" required>
    </div>
    <br>
    <div>
      <input type="submit" value="Login">
    </div>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      session_start();
      include("config.php");

      // Get input values from the login form
      $userName = mysqli_real_escape_string($conn, $_POST['userName']);
      $userPwd = $_POST['userPwd'];

      // Query to retrieve user information based on the provided username
      $sql = "SELECT * FROM user WHERE matricNo='$userName' LIMIT 1";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) == 1) {
          // User exists, check password
          $row = mysqli_fetch_assoc($result);

          if (password_verify($userPwd, $row['userPwd'])) {
              // Password is correct, set session variables and redirect to index.php
              $_SESSION["UID"] = $row["userID"];
              $_SESSION["userName"] = $row["matricNo"];
              $_SESSION['loggedin_time'] = time();
              header("location:index.php");
              exit();
          } else {
              // Password is incorrect
              $error_message = 'Login error, username or password is incorrect.';
          }

      } else {
          // User does not exist
          $error_message = "Login error, user <b>$userName</b> does not exist.";
      }

      // Display error message
      echo "<p style='color: red;'>$error_message</p>";
      echo '<a href="index.php?login=1"> | Back to Login |</a>&nbsp;&nbsp;&nbsp; <br>';

      mysqli_close($conn);
  }
  ?>
  
  
  <div id="registerDiv">
            <h2>| User Registration </h2>
            <form action="register_action.php" method="post">
                <label for="matricNo">Matric No</label>
                <input type="text" name="matricNo" id="matricNo" required>

                <label for="userEmail">User Email:</label>
                <input type="email" id="userEmail" name="userEmail" required><br><br>

                <label for="userPwd">Password:</label>
                <input type="password" id="userPwd" name="userPwd" required maxlength="8"><br><br>

                <label for="userPwd">Confirm Password:</label>
                <input type="password" id="confirmPwd" name="confirmPwd" required><br><br>

                <input type="submit" value="Register" style="cursor: pointer;">
                <input type="reset" value="Reset">
                <input type="reset" value="Cancel" onClick="cancelRegister()">
            </form>
        </div>
		
		
		<script>

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

</body>
</html>
