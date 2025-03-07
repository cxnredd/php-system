<?php 
   session_start();

   include("php/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include("php/config.php");
              if(isset($_POST['submit'])){
                $username = mysqli_real_escape_string($con,$_POST['username']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM student_user WHERE Username='$username' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);
               

                if($row["usertype"]=="user")
            {
                    $_SESSION["username"]=$username;

                    header("location:studentdb.php");
            }

                elseif($row["usertype"]=="admin")
                {
                    $_SESSION["username"]=$username;

                    header("location:admindb.php");
                }
                else
                {
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                }
              }
            ?>
            <header align="center">Bestlink College of the Philippines</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
            </form>
        </div>
      </div>
</body>
</html>