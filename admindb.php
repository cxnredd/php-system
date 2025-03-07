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
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.5/css/boxicons.min.css">
</head>
<body>

    <div class="sidenav" id="sidenav">
        <h4 class="text-center" style="color: white; font-size: 20px;">Prefect Department</h4><br><br>
        
        <div class="avatar-container text-center">
            <img src="public/assets/images/avatar.jfif" alt="Avatar" class="avatar">
            <p class="username text-white">Admin</p>
            <p class="email text-white">admin1@gmail.com</p>
        </div>
        
        <div class="container mt-5">
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                <i class='bx bx-grid-alt'></i> Prefect of Discipline <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="admindb.php" style="text-decoration: none;"><span>Dashboard</span></a>
                    <a class="dropdown-a" href="admindb.php" style="text-decoration: none;"><span>Academic Violation Report</span></a>
                    <a class="dropdown-a" href="admindb.php" style="text-decoration: none;"><span>Discipline Violation Report</span></a>
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
    <h2 class="text-left" style="font-size: 22px;">Dashboard</h2><br>
    
    <div class="main" id="mainContentOuter">

<?php

    if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $violation = $_POST['violation'];
    $date = $_POST['date'];
    $type = $_POST['type'];

    // Corrected SQL query
    $sql = "INSERT INTO `submitted_reports` (name, violation, date, type) VALUES ('$name', '$violation', '$date', '$type')";
    $result = mysqli_query($con, $sql);
    
    if($result){
       // echo "Data inserted successfully";
       header('location:admindb.php');
    } else {
        die(mysqli_error($con));
    }
}    

?>

    <main class="main-panel">
        <div class="panel-header">
            <h2>Submitted Reports</h2>
            <input type="text" id="search" placeholder="🔍 Search reports..." onkeyup="searchReports()">
            <button onclick="openReportForm()">➕ Add Report</button>
        </div>

        <div class="reports-list" id="reports-list"></div>
    </main>

    <div id="report-form" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeReportForm()">&times;</span>
            <h2>Add/Edit Report</h2>
            <input type="text" id="report-name" placeholder="Student Name">
            <input type="text" id="report-violation" placeholder="Violation">
            <input type="date" id="report-date">
            <select id="report-type">
                <option value="Academic Violation">Academic Violation</option>
                <option value="Discipline Violation">Discipline Violation</option>
            </select>
            <button type="submit" class="btn btn-primary" name="submit">Save Report</button>
        </div>
    </div>

    <script>
        let reports = [];
        
        function openReportForm(index = null) {
            document.getElementById('report-form').style.display = 'block';
            if (index !== null) {
                const report = reports[index];
                document.getElementById('report-name').value = report.name;
                document.getElementById('report-violation').value = report.violation;
                document.getElementById('report-date').value = report.date;
                document.getElementById('report-type').value = report.type;
                document.getElementById('report-form').setAttribute('data-index', index);
            } else {
                document.getElementById('report-form').removeAttribute('data-index');
            }
        }

        function closeReportForm() {
            document.getElementById('report-form').style.display = 'none';
        }

        function saveReport() {
            const name = document.getElementById('report-name').value;
            const violation = document.getElementById('report-violation').value;
            const date = document.getElementById('report-date').value;
            const type = document.getElementById('report-type').value;
            const index = document.getElementById('report-form').getAttribute('data-index');

            if (index !== null) {
                reports[index] = { name, violation, date, type };
            } else {
                reports.push({ name, violation, date, type });
            }
            closeReportForm();
            renderReports();
        }

        function deleteReport(index) {
            reports.splice(index, 1);
            renderReports();
        }

        function renderReports() {
            const reportsList = document.getElementById('reports-list');
            reportsList.innerHTML = '';
            reports.forEach((report, index) => {
                reportsList.innerHTML += `
                    <div class="report" data-type="${report.type}">
                        <span class="name">${report.name}</span>
                        <span class="violation">${report.violation}</span>
                        <span class="date">${report.date}</span>
                        <button onclick="openReportForm(${index})">✏️ Edit</button>
                        <button onclick="deleteReport(${index})">❌ Delete</button>
                    </div>`;
            });
        }

        function filterReports() {
            const selectedType = document.getElementById('violation-type').value;
            const reportsList = document.getElementById('reports-list');
            reportsList.innerHTML = '';
            reports.forEach((report, index) => {
                if (selectedType === 'all' || report.type === selectedType) {
                    reportsList.innerHTML += `
                        <div class="report" data-type="${report.type}">
                            <span class="name">${report.name}</span>
                            <span class="violation">${report.violation}</span>
                            <span class="date">${report.date}</span>
                            <button onclick="openReportForm(${index})">✏️ Edit</button>
                            <button onclick="deleteReport(${index})">❌ Delete</button>
                        </div>`;
                }
            });
        }

        function searchReports() {
            const query = document.getElementById('search').value.toLowerCase();
            const reports = document.querySelectorAll('.report');
            
            reports.forEach(report => {
                const name = report.querySelector('.name').textContent.toLowerCase();
                const violation = report.querySelector('.violation').textContent.toLowerCase();
                const date = report.querySelector('.date').textContent.toLowerCase();
                
                if (name.includes(query) || violation.includes(query) || date.includes(query)) {
                    report.style.display = 'block';
                } else {
                    report.style.display = 'none';
                }
            });
        }
</script>
        



    <script>
        function openReportDetails(element) {
            const name = element.querySelector('.name').textContent;
            const violation = element.querySelector('.violation').textContent;
            const date = element.querySelector('.date').textContent;
            const status = element.querySelector('.status').textContent;
            const type = element.getAttribute('data-type');

            window.location.href = `report_details.php?name=${encodeURIComponent(name)}&violation=${encodeURIComponent(violation)}&date=${encodeURIComponent(date)}&status=${encodeURIComponent(status)}&type=${encodeURIComponent(type)}`;
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
