
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/admmin.css">

	<link href="css/calendarr.css" rel="stylesheet">
    <script async src="js/calendar.js"></script>
	<title>CALENDAR</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
		<i class='bx  bx-recycle'></i>
			<span class="text">ReLink Technologies </span>
		</a>
		<ul class="side-menu top">
		<li>
				<a href="index.php">
				<i class=' bx bx bxs-dashboard icon ' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="viewattendance.php">
					<i class=' bx bx bxs-user-check icon ' ></i>
					<span class="text">View attendace</span>
				</a>
			</li>
			<li>
				<a href="request.php">
					<i class='bx bx-message-rounded-check icon' ></i>
					<span class="text">Request Leave</span>
				</a>
			</li>
		
		
			<li class="active">
				<a href="viewcalendar.php">
					<i class='bx bx-calendar icon'></i>
					<span class="text">View Calendar</span>
				</a>
			</li>
			
			<li>
				<a href="change_password.php" >
				<i class='bx bx-select-multiple'></i>
					<span class="text">Change Password</span>
				</a>
			</li>
	
		
			<li>
				<a href="logout.php" class="logout">
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
			
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<div id="cal-wrap">
      <!--  PERIOD SELECTOR -->
      <div id="cal-date">
        <select id="cal-mth"></select>
        <select id="cal-yr"></select>
      </div>

      <!-- CALENDAR -->
      <div id="cal-container"></div>

      <!-- EVENT FORM -->
      <form id="cal-event">
        <h1 id="evt-head"></h1>
        <div id="evt-date"></div>
        <textarea id="evt-details" required></textarea>
        <input id="evt-close" type="button" value="Close"/>
        <input id="evt-del" type="button" value="Delete"/>
      </form>
    </div>

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/adminjs.js"></script>
</body>
</html>