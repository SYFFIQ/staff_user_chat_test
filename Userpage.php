<?php
session_start();

@include 'Conn.php';

if (!isset($_SESSION['user_name'])) {
    header('Location: index.php');
    exit();
}
//fetch data from database table product_stock_tbl
$takes_data = "SELECT * FROM product_stock_tbl WHERE ID = 1";
//run the sql query
$run_query = mysqli_query($conn, $takes_data);

//initialize an array to store the stock information for different products
$stocks = array();

//loop through the result and store the stock information in the $stocks array
while ($row = mysqli_fetch_assoc($run_query)) {
    $stocks['Pack_A_Hid'] = $row['Pack_A_Hid'];
    $stocks['Pack_B_Hid'] = $row['Pack_B_Hid'];
    $stocks['Pack_Ex_Hid'] = $row['Pack_Ex_Hid'];
    $stocks['Pack_A_Opn'] = $row['Pack_A_Opn'];
    $stocks['Pack_B_Opn'] = $row['Pack_B_Opn'];
    $stocks['Pack_Ex_Opn'] = $row['Pack_Ex_Opn'];
}

// Fetch total items from cart_tbl
$query = "SELECT * FROM `cart_tbl` WHERE EMAIL_COL = '{$_SESSION['email']}'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page | Drs Dulang Hantaran</title>
    <link rel="stylesheet" href="css/User_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/cdn.jsdelivr.net_npm_swiper@10.0.4_swiper.css">


    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Elsie' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" >
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <a href="#" class="logo">Drs Dulang Hantaran </a>

        <ul class="navbar">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#Order">Order</a></li>
            <li><a href="#AboutUs">About us</a></li>
        </ul>
    <div class="main">


		<!-- Total Cart Function -->
		<a class="cart" href="cart.php">
			<i class="ri-shopping-cart-fill"></i>
			<?php echo mysqli_num_rows($result); ?>
		</a>
		<a class="chat" href="#" id="openChatModal">
		   <i class="ri-chat-4-fill"></i>
		</a>
		
		<a class="notification" href="#" >
			<i class="ri-notification-2-fill"></i>
		</a>
		<!-- display another page using popup -->
		
<div class="dropdown"> 
            <a class="dropbtn"><i class="ri-user-fill"></i></a>
            <div class="dropdown-content">
                <a href="Logout.php">Logout</a>
            </div>
        </div>
		        <a class="user"><h3><?php echo $_SESSION['user_name'] ?></h3></a>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
    </header>
	
<!-- chat popup -->
<div id="chatModal" class="modal">
        <div class="modal-content">
            <!-- Include an iframe to display chat.php -->
            <iframe src="chat.php" frameborder="0"></iframe>
            <span class="close" id="closeChatModal">&times;</span>
        </div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const openChatModal = document.getElementById("openChatModal");
    const chatModal = document.getElementById("chatModal");
    const closeChatModal = document.getElementById("closeChatModal");

    openChatModal.addEventListener("click", function () {
        chatModal.style.display = "block";
    });

    closeChatModal.addEventListener("click", function () {
        chatModal.style.display = "none";
    });
});
</script>

<!-- end chat popup -->

<!-- notification popup -->
<div id="notification-popup" class="popupnotification">
    <div class="popup-contentnotification">
        <span class="closenotification" onclick="closePopup()">&times;</span>
        <h2>Notification Title</h2>
        <p>notification message.</p>
    </div>
</div>

<style>
/* CSS for the popup container */
.popupnotification {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
}

/* CSS for the popup content */
.popup-contentnotification {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* CSS for the close button (X) */
.closenotification {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    position: relative;
}

.close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 10px;
    cursor: pointer;
}

iframe {
    width: 100%;
    height: 300px; /* Set the height as needed */
}

</style>

<script>
    // Function to open the popup
    function openPopup() {
        var popup = document.getElementById("notification-popup");
        popup.style.display = "block";
    }

    // Function to close the popup
    function closePopup() {
        var popup = document.getElementById("notification-popup");
        popup.style.display = "none";
    }

    // Add an event listener to the notification icon
    document.querySelector(".notification").addEventListener("click", openPopup);
</script>
		<!-- end notification popup -->



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

    

    <div class="section2">
        <div class="title" id="Order" data-aos="fade-down" >
            <h3>Service Package</h3>
            <h1>What Our Shop <span>Provides</span></h1>
        </div>
<div class="product-card-container"  data-aos="fade-up">
          <a <?php if ($stocks['Pack_A_Hid'] != 0) { echo 'href="Order_details.php?packID=1"'; } ?>   class="product-card" > 
            <img src="css/images/HiddenA1.jpeg" alt="Product 1">
            <div class="product-info">
              <h2>Package A</h2>
              <p class="product-price">RM 25/Dulang</p>
            </div>
            <div class="more-info">
                <h4>Hidden</h4>
                <h4>Stock =
                    <?php echo ($stocks['Pack_A_Hid'] != 0) ? $stocks['Pack_A_Hid'] : 'Out of stock'; ?>
                </h4>
            </div>
            <p class="product-details">Can choose the color of the fabric that is available | can choose the color of flower that is available | Random Dulang</p>
          </a>
          
          <a <?php if ($stocks['Pack_B_Hid'] != 0) { echo 'href="Order_details.php?packID=2"'; } ?>   class="product-card" > 
            <img src="css/images/pic2.jpeg" alt="Product 2">
            <div class="product-info">
              <h2>Package B</h2>
              <p class="product-price">RM 30/Dulang</p>
            </div>
            <div class="more-info">
                <h4>Hidden</h4>
                <h4>Stock =
                    <?php echo ($stocks['Pack_B_Hid'] != 0) ? $stocks['Pack_B_Hid'] : 'Out of stock'; ?>
                </h4>
            </div>
            <p class="product-details">Can choose the color of the fabric that is available | can choose type of Dulang | can choose the flower that is available</p>
          </a>
          
          <a <?php if ($stocks['Pack_Ex_Hid'] != 0) { echo 'href="Order_details.php?packID=3"'; } ?>  class="product-card" > 
            <img src="css/images/HiddenExclu1.jpeg" alt="Product 3">
            <div class="product-info">
              <h2>Package Exclusive</h2>
              <p class="product-price">RM 35/Dulang</p>
            </div>
            <div class="more-info">
                <h4>Hidden</h4>
                <h4>Stock =
                <?php echo ($stocks['Pack_Ex_Hid'] != 0) ? $stocks['Pack_Ex_Hid'] : 'Out of stock'; ?>
                </h4>
            </div>
            <p class="product-details">Can choose the flower that is available | can choose the fabric that is available | Exclusive Dulang gold</p>
          </a>
        </div>
    
        <div class="product-card-container"  data-aos="fade-up">
            <a <?php if ($stocks['Pack_A_Opn'] != 0) { echo 'href="Order_details.php?packID=4"'; } ?>  class="product-card" > 
              <img src="css/images/pic4.jpeg" alt="Product 4">
              <div class="product-info">
                <h2>Package A</h2>
                <p class="product-price">RM 25/Dulang</p>
              </div>
                <div class="more-info">
                    <h4>Open</h4>
                    <h4>Stock =
                        <?php echo ($stocks['Pack_A_Opn'] != 0) ? $stocks['Pack_A_Opn'] : 'Out of stock'; ?>
                    </h4>
                </div>
              <p class="product-details">Include Dulang and Gubahan</p>
            </a>
            
            <a <?php if ($stocks['Pack_B_Opn'] != 0) { echo 'href="Order_details.php?packID=5"'; } ?>  class="product-card" > 
              <img src="css/images/OpenB1.jpeg" alt="Product 5">
              <div class="product-info">
                <h2>Package B</h2>
                <p class="product-price">RM 30/Dulang</p>
              </div>
              <div class="more-info">
                    <h4>Open</h4>
                    <h4>Stock =
                        <?php echo ($stocks['Pack_B_Opn'] != 0) ? $stocks['Pack_B_Opn'] : 'Out of stock'; ?>
                    </h4>
                </div>
              <p class="product-details">ring Dulang | dowry | bracelet etc RM 30/Dulang</p>
            </a>
            
            <a <?php if ($stocks['Pack_Ex_Opn'] != 0) { echo 'href="Order_details.php?packID=6"'; } ?>  class="product-card" > 
              <img src="css/images/OpenExclu1.jpeg" alt="Product 6">
              <div class="product-info">
                <h2>Package Exclusive</h2>
                <p class="product-price">RM 38/Dulang</p>
              </div>
              <div class="more-info">
                    <h4>Open</h4>
                    <h4>Stock =
                    <?php echo ($stocks['Pack_Ex_Opn'] != 0) ? $stocks['Pack_Ex_Opn'] : 'Out of stock'; ?>
                    </h4>
                </div>
              <p class="product-details">Include Dulang and Gubahan</p>
            </a>
        </div>
        
    </div>

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

    <div class="section4" >
        <div class="title" data-aos="fade-down" id="AboutUs">
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
    
    <!-- footer link -->
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- swiper reviews link -->
    <script src="Js/cdn.jsdelivr.net_npm_swiper@10.0.4_swiper.js"></script>
    <script src="Js/javascipt.js"></script>

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