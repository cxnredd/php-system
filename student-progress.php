<?php
// Include the database connection
include('php/config.php');  // Make sure to replace with your actual database connection file

session_start();

// Check if the user is logged in and if they are a student
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student_user') {
    // If not logged in or not a student, redirect to login
    header("Location: index.php");
    exit();
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
    <title>Student - View Progress</title>
    <style>
        .progress-container {
            display: flex;
            align-items: center;
            position: relative;
            flex-direction: column;
        }
        .progress-line {
            position: absolute;
            width: 80%;
            height: 4px;
            background-color: #ccc;
            left: 10%;
            top: 50%;
            transform: translateY(-50%);
            z-index: 0;
        }
        .checkpoints {
            display: flex;
            align-items: center;
        }
        .checkpoint {
            width: 40px;
            height: 40px;
            background-color: #ccc;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
            z-index: 1;
            margin: 0 10px;
        }
        .checkpoint.completed {
            background-color: #4caf50;
        }
        .checkpoint.in-progress {
            background-color: #ff9800;
        }
        .checkpoint.reviewing {
            background-color: #2196F3;
        }
        .checkpoint.submitted {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Progress for Report #<?php echo $report['id']; ?></h1>

    <div class="progress-container">
        <div class="checkpoints">
            <div class="progress-line"></div>
            <!-- Display checkpoints based on the report progress -->
            <div class="checkpoint <?php echo strtolower($report['progress']); ?>">
                <span>&#10003;</span>
            </div>
            <!-- Add more checkpoints as needed -->
        </div>

        <div>
            <!-- Show the current progress of the report -->
            <p>Current Progress: <?php echo $report['progress']; ?></p>
        </div>
    </div>
</body>
</html>
