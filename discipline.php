<?php 
   session_start();

   include("php/config.php");
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Sms4</title>
    <link rel="stylesheet" href="public/css/dstyle.css">
    <link rel="stylesheet" href="public/css/style4.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.5/css/boxicons.min.css">
</head>
<body>

    <div class="sidenav" id="sidenav">
        <h4 class="text-center" style="color: white; font-size: 20px;">Prefect Department</h4><br><br>
        
        <div class="avatar-container text-center">
            <img src="public/assets/images/avatar.jfif" alt="Avatar" class="avatar">
            <p class="username text-white">Juan Delacruz</p>
            <p class="email text-white">juandelacruz@gmail.com</p>
        </div>
        
        <div class="container mt-5">
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                <i class='bx bx-grid-alt'></i> Prefect of Discipline <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="studentdb.php" style="text-decoration: none;"><span>Dashboard</span></a>
                    <a class="dropdown-a" href="academic.php" style="text-decoration: none;"><span>Academic Violation Report</span></a>
                    <a class="dropdown-a" href="discipline.php" style="text-decoration: none;"><span>Discipline Violation Report</span></a>
                </div>
            </div>
        
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-user'></i> Student Information <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Student Personal Information</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Student Personal Information</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Student Personal Information</span></a>
                </div>
            </div>
    
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-money'></i> Document <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Document Request</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Document Request</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Document Request</span></a>
                </div>
            </div>
    
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-file'></i> Curriculum <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Courses</span></a>
                </div>
            </div>
    
            
    
            <div class="dropdownSmsprofile">
                <a class="dropdown-a" href="logout.php" style="text-decoration: none;"><i class='bx bx-log-out'></i> <span>Log Out</span></a>  
            </div>
        </div>
    </div>
    
    
<div class="main" id="mainContent">
    <button class="btn" id="toggleButton">&nbsp; ☰ &nbsp;</button>
    <hr>
    <h2 class="text-left" style="font-size: 22px;">Discipline Dashboard</h2><br>
    
    <div class="main" id="mainContentOuter">

	<aside>
        <label for="violation-type">Select Violation Type:</label>
        <select id="violation-type" onchange="filterReports()">
            <option value="all">All Violations</option>
            <option value="Academic Violation">Academic Violation</option>
            <option value="Discipline Violation">Discipline Violation</option>
        </select>
    </aside>

    <main class="main-panel">
        <div class="panel-header">
            <h2>Submitted Reports</h2>
            <input type="text" id="search" placeholder="🔍 Search reports..." onkeyup="searchReports()">
        </div>

        <div class="reports-list" id="reports-list">
            <div class="report unread" data-type="Discipline Violation" onclick="openReportDetails(this)">
                <span class="status unread">🟢 Unread</span>
                <span class="name">John Doe</span>
                <span class="violation">Bullying</span>
                <span class="date">Feb 21, 2025</span>
            </div>
            <div class="report unread" data-type="Academic Violation" onclick="openReportDetails(this)">
                <span class="status unread">🟢 Unread</span>
                <span class="name">Jane Doe</span>
                <span class="violation">Cheating</span>
                <span class="date">Feb 21, 2025</span>
            </div>
        </div>
    </main>

    <script>
        function openReportDetails(element) {
            const name = element.querySelector('.name').textContent;
            const violation = element.querySelector('.violation').textContent;
            const date = element.querySelector('.date').textContent;
            const status = element.querySelector('.status').textContent;
            const type = element.getAttribute('data-type');

            window.location.href = `report-details.html?name=${encodeURIComponent(name)}&violation=${encodeURIComponent(violation)}&date=${encodeURIComponent(date)}&status=${encodeURIComponent(status)}&type=${encodeURIComponent(type)}`;
        }

        function filterReports() {
            const selectedType = document.getElementById('violation-type').value;
            const reports = document.querySelectorAll('.report');
            
            reports.forEach(report => {
                if (selectedType === 'all' || report.getAttribute('data-type') === selectedType) {
                    report.style.display = 'block';
                } else {
                    report.style.display = 'none';
                }
            });
        }
	</script>
        
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const toggleButton = document.getElementById('toggleButton');
const sidenav = document.getElementById('sidenav');
const mainContent = document.getElementById('mainContent');
const toggleButtonOuter = document.getElementById('toggleButtonOuter');
const mainContentOuter = document.getElementById('mainContentOuter');

// Attach event listener to the toggle button
toggleButton.addEventListener('click', () => {
  sidenav.classList.toggle('hidden');
  mainContent.classList.toggle('shift');
});

// Attach event listener to the outer toggle button
toggleButtonOuter.addEventListener('click', () => {
  sidenav.classList.toggle('hidden');
  mainContentOuter.classList.toggle('shift');
});

// Dropdown
function toggleDropdown(button) {
  button.classList.toggle("active");
  var dropdownContent = button.nextElementSibling;
  dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
}

window.onclick = function(event){
  if (!event.target.matches('.dropdown-btn')) {
    var dropdowns = document.getElementsByClassName("dropdown-container");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.style.display === "block"){
        openDropdown.style.display = "none";
      }
    }
  }
};

</script>
</body>
</html>
