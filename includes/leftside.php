<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/admin.css">

	<title>Manager</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">BLEN </span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class=' bx bx bxs-user-check icon ' ></i>
					<span class="text">View attendace</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-message-rounded-check icon' ></i>
					<span class="text">leave requests</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx  bx bxs-user-detail icon'></i>
					<span class="text">Employee Profile</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-calendar icon'></i>
					<span class="text">View Calendar</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-cloud-upload icon' ></i>
					<span class="text">Backup</span>
				</a>
			</li>
	
		
			<li>
				<a href="#" class="logout">
					<i class='bx bx-log-out icon' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->


	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/adminjs.js"></script>
</body>
</html>