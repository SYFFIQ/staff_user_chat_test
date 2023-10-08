<?php
session_start();
include_once "Conn.php";

// Disable foreign key checks
mysqli_query($conn, "SET foreign_key_checks = 0;");

if (isset($_POST['message'], $_POST['incoming_id']) && isset($_SESSION['ID'], $_SESSION['user_type'])) {
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $incoming_id = (int) mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $outgoing_id = (int) $_SESSION['ID']; // Assuming the ID is stored in the session
    $sender_type = $_SESSION['user_type']; // User type from the session

    // Determine recipient type based on sender type
    $recipient_type = ($sender_type === 'Staff') ? 'User' : 'Staff';

    $sql = "INSERT INTO chat_messages (SenderType, SenderID, RecipientType, RecipientID, MessageContent) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "siiss", $sender_type, $outgoing_id, $recipient_type, $incoming_id, $message);
        $exec_result = mysqli_stmt_execute($stmt);

        if ($exec_result) {
            echo "Message sent";
        } else {
            echo "Error inserting message: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
} else {
    echo "All input fields are required!";
}

// Re-enable foreign key checks
mysqli_query($conn, "SET foreign_key_checks = 1;");
?>
