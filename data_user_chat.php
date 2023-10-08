<?php
  session_start();
  print_r($_SESSION);
  include_once "Conn.php";
  $outgoing_id = $_SESSION['ID']; // Assuming the staff's ID is stored in the session
  $sql = "SELECT * FROM user_tbl ORDER BY ID DESC";
  $query = mysqli_query($conn, $sql);
  $output = "";

  while($row = mysqli_fetch_assoc($query)){
    $sql2 = "SELECT * FROM chat_messages WHERE (SenderID = {$row['ID']} OR RecipientID = {$row['ID']}) AND (SenderID = {$outgoing_id} OR RecipientID = {$outgoing_id}) ORDER BY MessageID DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['MessageContent'] : $result ="No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if(isset($row2['SenderID'])){
        ($outgoing_id == $row2['SenderID']) ? $you = "You: " : $you = "";
    }else{
        $you = "";
    }

    $output .= '<a href="chat.php?user_id='. $row['ID'] .'">
                <div class="content">
                <div class="details">
                    <span>'. $row['NAME_COL'] .'</span>
                    <p>'. $you . $msg .'</p>
                </div>
                </div>
            </a>';
  }

  echo $output;
?>
