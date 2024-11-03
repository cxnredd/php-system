<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $concern = $_POST['concern'];

    // Corrected SQL query
    $sql = "INSERT INTO `crud` (name, email, phone, concern) VALUES ('$name', '$email', '$phone', '$concern')";
    $result = mysqli_query(mysql: $con, query: $sql);
    
    if($result){
       // echo "Data inserted successfully";
       header('location:display.php');
    } else {
        die(mysqli_error(mysql: $con));
    }
}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Crud Operation</title>
  </head>
  <body>
        <div class="container my-5">
                 <form method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="phone" class="form-control" placeholder="Enter your phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label>Concern</label>
                        <input type="concern" class="form-control" placeholder="Enter your concern" name="concern">
                    </div>
  
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>

   
    
  </body>
</html>