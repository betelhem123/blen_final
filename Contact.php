<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>contact us</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/footer.css">

    <link rel="stylesheet" href="css/nava.css">
    <link rel="stylesheet" href="css/conn.css">
  </head>
  <body>

  <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="index.php">Blen</a></span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="index.php">Blen</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="team.php">Team</a></li>
                    <li><a href="login.php">login</a></li>
                   
                </ul>
            </div>

            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>

                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                   </div>

                    <div class="search-field">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script src="js/nav.js"></script>
   <!-- body-->
   
   <div class="container">
    <div class="content">
      <div class="image-box">
        <img src="image/contact-png.png" alt="">
        
      </div>
      <form action="#">
      <div class="topic">Send us a message</div>
      <div class="input-box">
        <input type="text" required>
        <label>Enter your name</label>
      </div>
      <div class="input-box">
      <input type="number"  required>
      <label>Mobile Number</label>
       </div>
      <div class="input-box">
        <input type="text" required>
        <label>Enter your email</label>
      </div>
      <div class="message-box">
        <textarea></textarea>
        <label>Enter your message</label>
      </div>
      <div class="input-box">
        <input type="submit" value="Send Message">
        
      </div>
    </form>
    
  </div>
  </div>

  
  </body>
</html>