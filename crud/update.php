<?php
include 'connect.php';
$id = $_GET['updateid'];

// Corrected SQL query without single quotes around the table name
$sql = "SELECT * FROM crud WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$concern = $row['concern'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $concern = $_POST['concern'];

    // Corrected SQL query to update data
    $sql = "UPDATE crud SET name='$name', email='$email', phone='$phone', concern='$concern' WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Redirect to display.php after successful update
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Crud Operation</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="phone" class="form-control" placeholder="Enter your phone" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="form-group">
                <label>Concern</label>
                <input type="concern" class="form-control" placeholder="Enter your concern" name="concern" value="<?php echo $concern; ?>">
            </div>
  
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
  </body>
</html>
