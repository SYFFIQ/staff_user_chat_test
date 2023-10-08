<?php
session_start();

@include 'Conn.php';

/* old
//Login form submit
if (isset($_POST['loginSubmit'])) {
  $email = $_POST['loginEmail'];
  $password = $_POST['loginPassword'];

  // Check if the user exists in the user_tbl
  $query = "SELECT * FROM user_tbl WHERE EMAIL_COL = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
      // User exists, perform login authentication
      $user = mysqli_fetch_assoc($result);
      $hashedPassword = md5($password); // Hash the password using MD5
      if ($hashedPassword == $user['PASSWORD_COL']) {
          $_SESSION['user_name'] = $user['NAME_COL'];
          $_SESSION['email'] = $email;
          header('Location: Userpage.php');
          exit(); // No need to execute the rest of the code if logged in successfully.
      } else {
          echo "<script>alert('Incorrect password. Please try again.');</script>";
      }
  } else {
      // Check if the user is an admin in the admin_tbl
      $query = "SELECT * FROM admin_tbl WHERE Admin_email = ?";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) == 1) {
          $admin = mysqli_fetch_assoc($result);
          $hashedPassword = md5($password); // Hash the password using MD5
          if ($hashedPassword == $admin['Admin_password']) {
              $_SESSION['user_name'] = $admin['Admin_name'];
              header('Location: Admin_dashboard.php');
              exit(); // No need to execute the rest of the code if logged in successfully as an admin.
          } else {
              echo "<script>alert('Incorrect password. Please try again.');</script>";
          }
      } else
		  {
          echo "<script>alert('Email does not exist. Please check your email or register an account.');</script>";
      }
  }
}
*/

if (isset($_POST['loginSubmit'])) {
  $email = $_POST['loginEmail'];
  $password = $_POST['loginPassword'];

  // Check if the user exists in the user_tbl
  $query = "SELECT * FROM user_tbl WHERE EMAIL_COL = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
    // User exists, perform login authentication
    $user = mysqli_fetch_assoc($result);
    $hashedPassword = md5($password); // Hash the password using MD5
	if ($hashedPassword == $user['PASSWORD_COL']) {
	  $_SESSION['user_name'] = $user['NAME_COL'];
	  $_SESSION['ID'] = $user['ID'];  // added Set the ID in the session
	  $_SESSION['email'] = $email;
	  $_SESSION['user_type'] = 'User';
	  header('Location: Userpage.php');
	  exit();
	} else {
      echo "<script>alert('Incorrect password. Please try again.');</script>";
    }
  } else {
    // Check if the user is an admin in the admin_tbl
    $query = "SELECT * FROM admin_tbl WHERE Admin_email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
      $admin = mysqli_fetch_assoc($result);
      $hashedPassword = md5($password); // Hash the password using MD5
      if ($hashedPassword == $admin['Admin_password']) {
        $_SESSION['user_name'] = $admin['Admin_name'];
        header('Location: Admin_dashboard.php');
        exit(); // No need to execute the rest of the code if logged in successfully as an admin.
      } else {
        echo "<script>alert('Incorrect password. Please try again.');</script>";
      }
    } else {
      // Check if the user is a staff in the staffdetail table
      $query = "SELECT * FROM staffdetail WHERE StaffEmail = ?";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) == 1) {
        $staff = mysqli_fetch_assoc($result);
        $hashedPassword = md5($password); // Hash the password using MD5
        if ($hashedPassword == $staff['StaffPassword']) {
          $_SESSION['user_name'] = $staff['StaffName'];
		  $_SESSION['ID'] = $staff['ID'];
		  $_SESSION['user_type'] = 'Staff'; 
          header('Location: staff_dashboard.php');
          exit(); // No need to execute the rest of the code if logged in successfully as staff.
        } else {
          echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
      } else {
        echo "<script>alert('Email does not exist. Please check your email or register an account.');</script>";
      }
    }
  }
}


// Register Form Submit
if (isset($_POST['registerSubmit'])) {
    $name = $_POST['registerName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];
    $confirmPassword = $_POST['registerConfirmPassword'];

    $pattern = '/^(?=.*\d)(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/';

    // Check if the email already exists in the database
    $query = "SELECT * FROM user_tbl WHERE EMAIL_COL = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists. Please use a different email.');</script>";
    } else {
        // Check if the password meets the required criteria based on pattern
        if (!preg_match($pattern, $password)) {
            echo "<script>alert('Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be at least 8 characters long.');</script>";
        } elseif ($password !== $confirmPassword) {
            // Password and confirm password do not match, show error message or take appropriate action
            echo "<script>alert('Password and confirm password do not match. Please re-enter your password.');</script>";
        } else {
            // Hash the password using MD5
            $hashedPassword = md5($password);

            // Insert a new user into the database with the hashed password
            $query = "INSERT INTO user_tbl (NAME_COL, EMAIL_COL, PASSWORD_COL) VALUES ('$name', '$email', '$hashedPassword')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Registration successful
                echo "<script>alert('Registration successful.');</script>";
                echo "<script>closeRegisterPopup(); openLoginPopup();</script>";
                // Reset the input fields
                echo "<script>document.getElementById('registerName').value = '';</script>";
                echo "<script>document.getElementById('registerEmail').value = '';</script>";
                echo "<script>document.getElementById('registerPassword').value = '';</script>";
                echo "<script>document.getElementById('registerConfirmPassword').value = '';</script>";
            } else {
                echo "<script>alert('Registration Failed.');</script>";
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Drs Dulang Hantaran</title>
    <link rel="stylesheet" href="css/index_style.css">
    <link rel="stylesheet" href="css/cdn.jsdelivr.net_npm_swiper@10.0.4_swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Elsie' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" >
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>

<!------------------- NAVBAR ---------------------->
    <header>
        <a href="#" class="logo">Drs Dulang Hantaran </a>

        <ul class="navbar">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#Order">Order</a></li>
            <li><a href="#AboutUs">About us</a></li>
        </ul>
    <div class="main">
        <a href="#" class="user" id="loginButton"><i class="ri-user-fill"></i>Log In</a>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
    </header>
<!-------------------END OF NAVBAR ---------------------->


<!------------------- SECTION 1 ---------------------->
    <div class="section1"> 
        <div class="font" data-aos="fade-right">
            <h3>Welcome to Drs Dulang Hantaran</h3>
            <h1>We Provide a Dulang Hantaran <br> Rental Service</h1>
            <p>We are a shop that provides Dulang Hantaran rentals around Penang. A variety of interesting 
                <br> and unique Dulang are available in our shop. This website was also developed to make it easier 
                <br> for our customers to order Dulang from us.</p>
            <a class="button-27" href="#Order">Order here</a>
            
        </div>
        <div class="logo2" data-aos="fade-left">
            <img src="css/images/logo.png">
        </div>

    </div>
<!------------------- END OF SECTION 1 ---------------------->
    

<!------------------- SECTION 2 ---------------------->
    <div class="section2">
        <div class="title" id="Order" data-aos="fade-down" >
            <h3>Service Package</h3>
            <h1>What Our Shop <span>Provides</span></h1>
        </div>

        <div class="product-card-container"  data-aos="fade-up">
          <a href="#" class="product-card" id="orderButton1"> 
            <img src="css/images/HiddenA1.jpeg" alt="Product 1">
            <div class="product-info">
              <h2>Package A</h2>
              <p class="product-price">RM 25/Dulang</p>
            </div>
            <h4>Hidden</h4>
            <p class="product-details">Can choose the color of the fabric that is available | can choose the color of flower that is available | Random Dulang</p>
          </a>
          
          <a href="#" class="product-card" id="orderButton2"> 
            <img src="css/images/pic2.jpeg" alt="Product 2">
            <div class="product-info">
              <h2>Package B</h2>
              <p class="product-price">RM 30/Dulang</p>
            </div>
            <h4>Hidden</h4>
            <p class="product-details">Can choose the color of the fabric that is available | can choose type of Dulang | can choose the flower that is available</p>
          </a>
          
          <a href="#" class="product-card" id="orderButton3"> 
            <img src="css/images/HiddenExclu1.jpeg" alt="Product 3">
            <div class="product-info">
              <h2>Package Exclusive</h2>
              <p class="product-price">RM 35/Dulang</p>
            </div>
            <h4>Hidden</h4>
            <p class="product-details">Can choose the flower that is available | can choose the fabric that is available | Exclusive Dulang gold</p>
          </a>
        </div>
    
        <div class="product-card-container"  data-aos="fade-up">
            <a href="#" class="product-card" id="orderButton4"> 
              <img src="css/images/pic4.jpeg" alt="Product 4">
              <div class="product-info">
                <h2>Package A</h2>
                <p class="product-price">RM 25/Dulang</p>
              </div>
              <h4>Open</h4>
              <p class="product-details">Include Dulang and Gubahan</p>
            </a>
            
            <a href="#" class="product-card" id="orderButton5"> 
              <img src="css/images/OpenB1.jpeg" alt="Product 5">
              <div class="product-info">
                <h2>Package B</h2>
                <p class="product-price">RM 30/Dulang</p>
              </div>
              <h4>Open</h4>
              <p class="product-details">ring Dulang | dowry | bracelet etc RM 30/Dulang</p>
            </a>
            
            <a href="#" class="product-card" id="orderButton6"> 
              <img src="css/images/OpenExclu1.jpeg" alt="Product 6">
              <div class="product-info">
                <h2>Package Exclusive</h2>
                <p class="product-price">RM 38/Dulang</p>
              </div>
              <h4>Open</h4>
              <p class="product-details">Include Dulang and Gubahan</p>
            </a>
          </div>
      </div>
<!------------------- END OF SECTION 2 ---------------------->



<!------------------- SECTION 3 ---------------------->
    <div class="section3">
        <div class="title" data-aos="fade-down" >
            <h3>Reviews</h3>
            <h1>What Our Customer <span>Review</span></h1>
        </div>

        <div class="slider-container swiper" data-aos="fade-up">
            <div class="slider-content">
                <div class="card-wrapper swiper-wrapper">
                    <div class="card swiper-slide">
                        <div class="icon-content">
                            <span class="overlay"></span>
    
                            <div class="card-image">
                                <i class="ri-discuss-fill"></i>
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Atirah</h2>
                            <p class="description">Btw thanks tau sgt puas hati dulang hantaran.Sgt cantik,kemas,elegance.ramai puji cantik ambik dari mana.No worries saya dah recommend kat orang lain.</p>
                        </div>
                    </div>
                    
                    <div class="card swiper-slide">
                        <div class="icon-content">
                            <span class="overlay"></span>
    
                            <div class="card-image">
                                <i class="ri-discuss-fill"></i>
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Sakinah</h2>
                            <p class="description">Terbaik dulang sgt cantik ,family suka sgt.design pun kemas dan estetik.terima kasih sgt, apa-apa pun terbaik lah service</p>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="icon-content">
                            <span class="overlay"></span>
    
                            <div class="card-image">
                                <i class="ri-discuss-fill"></i>
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Syakirah</h2>
                            <p class="description">Tqvm nampak unik  dan mahai,bunga meriah dari jauh npk bunga tu kembang mekar dan cantik sgt.Memang recommend bungkuskan pun kemas</p>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="icon-content">
                            <span class="overlay"></span>
    
                            <div class="card-image">
                                <i class="ri-discuss-fill"></i>
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">khadijah</h2>
                            <p class="description">Thank you so much ye,it was very beautiful,thank you for all the hard work you put.my friend will be sending it back today i think.</p>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="icon-content">
                            <span class="overlay"></span>
    
                            <div class="card-image">
                                <i class="ri-discuss-fill"></i>
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Husna</h2>
                            <p class="description">Thank you so much tauu.cantik sangat.Suami saya cakap dia suka sgt sbb cantik .design pun unik my friend and my family pun teruja tengok hantaran lawa.</p>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="icon-content">
                            <span class="overlay"></span>
    
                            <div class="card-image">
                                <i class="ri-discuss-fill"></i>
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Olivia</h2>
                            <p class="description">This is my review for drs dulang hantaran.The design of the tray is aesthetic and elegant.The seller is so hospitally and creative,I will rate this shop is fantasic.</p>
                        </div>
                    </div>

                    
                </div>
                
            </div>
            <div class="swiper-pagination"></div>
        </div>
        
    </div>
<!------------------- END OF SECTION 3 ---------------------->

<!------------------- SECTION 4 ---------------------->
    <div   class="section4" >
        <div class="title" id="AboutUs" data-aos="fade-down" >
            <h3>About Us</h3>
            <h1>Know more <span>about us</span></h1>
        </div>

        <div class="about" >
            <div class="paragph" data-aos="fade-up"> 
                <h2>Who are we?</h2>
                <p>We, Drs Dulang Hantaran, provide a service for renting exquisite gift trays with a variety of designs. We offer a wide range of fabric colors and flower themes. Our captivating and premium gift tray arrangements, along with attractive themes, are offered at affordable prices. We aim to enhance the atmosphere of your engagement or wedding ceremony. Join us in subscribing to our Drs Dulang Hantaran service to make your engagement and wedding celebrations even more enchanting.
                </p>
            </div>
            
            <div class="map" data-aos="fade-down">
                <h2>Where you can find us</h2>
                <p><i class="ri-map-pin-fill"></i>1ST FLOOR OF NO 33 PERSIARAN SEKSYEN 4/7 BANDAR PUTERA BERTAM 13200 KEPALA BATAS PULAU PINANG</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d349.0240360815163!2d100.48133239603717!3d5.519601690250517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ad0fce0c0cffb%3A0x161b8d181fad2a79!2s33%2C%20Persiaran%20Seksyen%204%2F7%2C%20Bandar%20Putra%20Bertam%2C%2013200%20Kepala%20Batas%2C%20Pulau%20Pinang!5e1!3m2!1sen!2smy!4v1689148020989!5m2!1sen!2smy" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
<!------------------- END OF SECTION 4 ---------------------->


<!------------------- FOOTER ---------------------->
    <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social_icon">
            <li><a href="#" target="blank"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="https://instagram.com/drsdulang.hantaran?igshid=MzRlODBiNWFlZA==" target="blank"><ion-icon name="logo-instagram"></ion-icon></a></li>
            <li><a href="#" target="blank"><ion-icon name="logo-tiktok"></ion-icon></a></li>
            <li><a href="https://wa.me/0149044532" target="blank"><ion-icon name="logo-whatsapp"></ion-icon></ion-icon></a></li>
        </ul>

        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#AboutUs">About</a></li>
            <li><a href="#Order">Services</a></li>
            <li><a href="mailto:imanmuhdazam@gmail.com">Email</a></li>
        </ul>

        <p>©2023 Drs Dulang Hantaran - All Rights Reserved</p>

    </footer>
<!------------------- END OF FOOTER ---------------------->


<!------------------- LOGIN AND REGISTER POPUP ---------------------->
    <!-- Popups -->
    <div class="popup-container" id="loginPopup">
      <div class="popup">
        <div class="popup-header">
          <h2>Login</h2>
          <span class="close" id="loginClose">&times;</span>
        </div>
        <div class="popup-content">
          <!-- Login form -->
          <form method="POST" action="">
            <div class="form-group">
              <label for="loginEmail">Email</label>
              <div class="input-box">
                <input type="email" id="loginEmail" name="loginEmail" required>
                <i class="bx bx-envelope"></i>
              </div>
            </div>
            <div class="form-group">
              <label for="loginPassword">Password</label>
              <div class="input-box">
                <input type="password" id="loginPassword" name="loginPassword" required>
                <i class="bx bx-lock"></i>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" class="button-27popup" name="loginSubmit" value="Login">
            </div>
          </form>
          <div class="switch-popup">
            <p>Don't have an account? <a href="#" id="registerLink">Register here</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="popup-container" id="registerPopup">
      <div class="popup">
        <div class="popup-header">
          <h2>Registration</h2>
          <span class="close" id="registerClose">&times;</span>
        </div>
        <div class="popup-content">
          <!-- Register form -->
          <form method="POST" action="">
            <div class="form-group">
              <label for="registerName">Name</label>
              <div class="input-box">
                <input type="text" id="registerName" name="registerName" required>
                <i class='bx bxs-user'></i>
              </div>
            </div>
            <div class="form-group">
              <label for="registerEmail">Email</label>
              <div class="input-box">
                <input type="email" id="registerEmail" name="registerEmail" required>
                <i class="bx bx-envelope"></i>
              </div>
            </div>
            <div class="form-group">
              <label for="registerPassword">Password</label>
              <div class="input-box">
                <input type="password" id="registerPassword" name="registerPassword" required>
                <i class="bx bx-lock"></i>
              </div>
            </div>
            <div class="form-group">
              <label for="registerConfirmPassword">Confirm Password</label>
              <div class="input-box">
                <input type="password" id="registerConfirmPassword" name="registerConfirmPassword" required>
                <i class="bx bx-lock"></i>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" class="button-27popup" name="registerSubmit" value="Register">
            </div>
          </form>
          <div class="switch-popup">
            <p>Already have an account? <a href="#" id="loginLink">Log in</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Popups -->
<!------------------- END OF LOGIN AND REGISTER POPUP ---------------------->


    <!-- footer link -->
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- swiper reviews link -->
    <script src="Js/cdn.jsdelivr.net_npm_swiper@10.0.4_swiper.js"></script>

    <script src="Js/javascipt.js"></script>
    <script src="Js/Popup.log&Reg_script.js"></script>

    <!-- animation fade link and script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        offset: 200,
        duration: 1500,});
    </script>

    <!-- menu bar script -->
    <script>
        var menu = document.querySelector('#menu-icon');
        var navbar = document.querySelector('.navbar');

        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navbar.classList.toggle('open');
        }
    </script>
</body>
</html>