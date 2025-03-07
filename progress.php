<?php
// Include the database connection
include('php/config.php');  // Make sure to replace with your actual database connection file

session_start();

// Check if the user is logged in and if they are an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin_user') {
    // If not logged in or not an admin, redirect to login or some other page
    
    
}

             

                if($row["usertype"]=="admin_user")
                {
                        $_SESSION["username"]=$username;
    
                        header("location:index.php");}
// Process the form submission to update progress
if (isset($_POST['update_progress'])) {
    $report_id = $_POST['report_id'];
    $progress_status = $_POST['progress_status'];  // The progress status like 'In Progress', 'Completed', etc.

    // Update the progress in the database
    $query = "UPDATE reports SET progress = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$progress_status, $report_id]);

    echo "Progress updated successfully!";
}

// Fetch the report details (you could pass the report_id as a query parameter)
$report_id = isset($_GET['report_id']) ? $_GET['report_id'] : 1;  // Default to report ID 1 for now
$query = "SELECT * FROM reports WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$report_id]);
$report = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Update Progress</title>
</head>
<body>
    <h1>Update Progress for Report #<?php echo $report['id']; ?></h1>

    <!-- Form to update progress -->
    <form action="progress.php" method="POST">
        <input type="hidden" name="report_id" value="<?php echo $report['id']; ?>" />

        <label for="progress_status">Progress Status:</label>
        <select name="progress_status" id="progress_status">
            <option value="Submitted" <?php if ($report['progress'] == 'Submitted') echo 'selected'; ?>>Submitted</option>
            <option value="In Progress" <?php if ($report['progress'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
            <option value="Reviewing" <?php if ($report['progress'] == 'Reviewing') echo 'selected'; ?>>Reviewing</option>
            <option value="Completed" <?php if ($report['progress'] == 'Completed') echo 'selected'; ?>>Completed</option>
        </select>
        <br>

        <button type="submit" name="update_progress">Update Progress</button>
    </form>
    
    <br>
    <a href="student-progress.php?report_id=<?php echo $report['id']; ?>">View Progress as Student</a>
</body>
</html>
