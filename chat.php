<?php 
  session_start();
  var_dump($_GET); // This will print all GET parameters
  include_once "Conn.php";
  if(!isset($_SESSION['ID'])){
    header("location: login.php");
  }
  $user_id = $_GET['user_id']; // Assuming the user ID is passed in the URL
?>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $sql = "SELECT * FROM user_tbl WHERE ID = {$user_id}";
          $query = mysqli_query($conn, $sql);
          if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
        ?>
        <a href="staff_chat_list.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <div class="details">
          <span><?php echo $row['NAME_COL']; ?></span>
        </div>
        <?php
          }else{
            header("location: staff_chat_list.php");
          }
        ?>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button type="button"><i class="fab fa-telegram-plane"></i></button>

      </form>
    </section>
  </div>

<script src="Js/chat.js"></script>

</body>
</html>
