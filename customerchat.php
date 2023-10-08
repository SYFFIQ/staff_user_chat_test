<?php
  session_start();
  include_once "Conn.php";
  if(!isset($_SESSION['ID'])){
  header("location: login.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff dashboard | Drs Dulang Hantaran</title>
    <!-- Include Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
	
    <!-- Include your custom CSS (dash_style.css) -->
    <link rel="stylesheet" href="css/staff_style.css">
	
	
    <?php include_once('sidebar_staff.php'); ?>
</head>
<body>
 <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM staffdetail WHERE ID = {$_SESSION['ID']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <div class="details">
            <span><?php echo $row['StaffName'] ?></span>
          </div>
        </div>
      </header>
      <div class="search">
        <span class="text">Select user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script>
    const usersList = document.querySelector(".users-list");

    setInterval(() => {
      let xhr = new XMLHttpRequest();
      xhr.open("GET", "data_user_chat.php", true);
      xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            usersList.innerHTML = data;
          }
        }
      };
      xhr.send();
    }, 500);
  </script>
  
</body>
</html>
<?php /*} */ ?>