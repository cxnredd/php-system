<?php 
   session_start();

   include("php/config.php");
   
?>


<div class="container">
    <link rel="stylesheet" href="public/css/acad.css">
	<div class="modal">
		<div class="modal__header">
			<span class="modal__title">Academic Violation Report</span><button class="button button--icon"><svg width="24" viewBox="0 0 24 24" height="24" xmlns="http://www.w3.org/2000/svg">
					<path fill="none" d="M0 0h24v24H0V0z"></path>
					<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path></svg></button>
		</div>
		<div class="modal__body">
			<div class="input">
			  <label class="input__label">Name</label>
			  <input class="input__field" type="text"> 
			</div>
			<div class="input">
			  <label class="input__label">Violation Type:</label>
			  <select class="input__field" id="violation-type">
				<option value="">Select a violation type</option>
				<option value="academic">Academic Misconduct</option>
				<option value="Cheating">Cheating</option>
				<option value="Plagiarism">Plagiarism</option>
				<option value="Collusion">Collusion</option>
				<option value="Unauthorized">Unauthorized Access</option>
			  </select>
			</div>
			<div class="input">
			  <label class="input__label">Description</label>
			  <textarea class="input__field input__field--textarea" id="violation-description"></textarea>
			</div>
		  </div>
		  <div class="modal__footer">
			<button class="button button--primary" id="submit-report">Report</button>
		  </div>

		  <script>
			document.getElementById("submit-report").addEventListener("click", function() {
			  window.location.href = "dashboard.php";
			});
		  </script>