<?php 
   session_start();

   include("php/config.php");
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Details</title>
    <link rel="stylesheet" href="public/css/report_details.css">
</head>
<body>
    <div class="card">
        <h2>Report Details</h2>
        <p><strong>Name:</strong> <span id="report-name"></span></p>
        <p><strong>Violation:</strong> <span id="report-violation"></span></p>
        <p><strong>Date:</strong> <span id="report-date"></span></p>
        <p><strong>Status:</strong> <span id="report-status"></span></p>
        <a href="admindb.php" class="back-button">🔙 Back</a>  <!-- Updated link -->
    </div>

    <script>
        function getQueryParams() {
            const params = new URLSearchParams(window.location.search);
            return {
                name: params.get('name'),
                violation: params.get('violation'),
                date: params.get('date'),
                status: params.get('status')
            };
        }

        window.onload = function () {
            const report = getQueryParams();
            document.getElementById("report-name").textContent = report.name;
            document.getElementById("report-violation").textContent = report.violation;
            document.getElementById("report-date").textContent = report.date;
            document.getElementById("report-status").textContent = report.status;
        };
    </script>
</body>
</html>