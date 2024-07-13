<?php
include('includes/dbconnection.php');

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $sender_id = 5; // Example sender ID, change as needed

    $sql = "INSERT INTO tblmessages (message_text, sender_id) VALUES (:message, :sender_id)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->bindParam(':sender_id', $sender_id, PDO::PARAM_INT);
    
    if ($query->execute()) {
        header('Location: chat.php'); // Redirect to chat.php after successful insert
        exit;
    } else {
        echo "Error sending message";
    }
}
?>
