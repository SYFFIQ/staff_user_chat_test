<?php 
  session_start();
  if(isset($_SESSION['ID'])){
    include_once "Conn.php";
    $outgoing_id = $_SESSION['ID'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM chat_messages WHERE (SenderID = {$outgoing_id} AND RecipientID = {$incoming_id})
            OR (SenderID = {$incoming_id} AND RecipientID = {$outgoing_id}) ORDER BY MessageID";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
      while($row = mysqli_fetch_assoc($query)){
        if($row['SenderID'] === $outgoing_id){
          $output .= '<div class="chat outgoing">
                      <div class="details">
                        <p>'. $row['MessageContent'] .'</p>
                      </div>
                      </div>';
        }else{
          $output .= '<div class="chat incoming">
                      <div class="details">
                        <p>'. $row['MessageContent'] .'</p>
                      </div>
                      </div>';
        }
      }
    }else{
      $output .= '<div class="text">No messages are available. Once you send a message, they will appear here.</div>';
    }
    echo $output;
  }else{
    header("location: login.php");
  }
?>
