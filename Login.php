<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>LOGIN</title>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/nava.css">
  </head>
  <body>
  <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="index.php">Blen</a></span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="index.php">BLEN</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                    <li><a href="About.php">About Us</a></li>
                    <li><a href="Team.php">Team </a></li>
                    <li><a href="login.php">Login</a></li>
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
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form method="post" action="../blen_final/includes/login.inc.php" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="./image/7.png" alt="easyclass" />
                <h4>BLEN</h4>
              </div>

              <div class="heading">
                <h2>  Welcome Back</h2>
                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
             
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    name="userID"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>User ID</label>
                </div>
                <!-- <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Compony ID</label>
                </div> -->
                <div class="input-wrap">
                  <input
                    type="password"
                    name="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" name="submit" value="log in" class="sign-btn" />
                
                <p class="text">

<h6></h6>
<h6></h6>
<a href="#" class="toggle"></a>
                
              </div>
                         </form>

            <form method="post" action="../blen_final/includes/login.inc.php" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="./image/7.png" alt="easyclass" />
                <h4>BLEN</h4>
              </div>

              <div class="heading">
                <h2>System Admin</h2>
                <h6>looking for company Login page?</h6>
                <a href="#" class="toggle">LOGIN</a>
              </div>
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    name="userID"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>User ID</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>
              

                <input type="submit" name="submit" value="Login" class="sign-btn" />
              
                <?php echo("working");?>
                <p class="text">
                          
               
                  //Forgotten your password or you login datails?
                  <a href="#">Sign up</a> signing in
                </p>
              </div>
            </form>
            <?php
                              
                              if(isset($_GET["error"])){
                                  if($_GET["error"] == "emptyinput"){
                                      echo "<p>Fill in all fields!</p>";
                                  }
                                  elseif($_GET["error"] == "wronglogin"){
                                      echo "<p>Incorrect Login information!</p>";
                                  }
                                  elseif($_GET["error"] == "cpw"){
                                      echo "<p>check pwd failed!</p>";
                                  }
                                  elseif($_GET["error"] == "inactive"){
                                      echo "<p>inactive user contact admin!</p>";
                                  }
                                  elseif($_GET["error"] == "successful"){
                                    echo "<p>Password Successfully Changed</p>";
                                }
                              }
                              
                                    ?>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./image/8.jpg" class="image img-1 show" alt="" />
              <img src="./image/4.png" class="image img-2" alt="" />
              <img src="./image/8.png" class="image img-3" alt="" />
              <img src="./image/.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>See Attendance Records</h2>
                  <h2>View Calendar  </h2>
                  <h2>Automatic Backup</h2>
                
                </div>
              </div>
             
        
              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="js/login.js"></script>
    <script src="js/nav.js"></script>

  </body>
</html>
