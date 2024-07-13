// send-message.php

<?php
session_start();
require_once('../includes/dbconnection.php'); // Ensure this line is added to include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['message'])) {
        $message = $_POST['message'];

        if (isset($_SESSION['sturecmsuid'])) {
            $sender_id = $_SESSION['sturecmsuid'];
            $sender_type = 'student';
        } elseif (isset($_SESSION['adminid'])) {
            $sender_id = $_SESSION['adminid'];
            $sender_type = 'admin';
        }

        // Debugging output
        echo "Message: $message, Sender ID: $sender_id, Sender Type: $sender_type";

        $sent_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO tblmessages (sender_id, sender_type, message_text, sent_at) VALUES (:sender_id, :sender_type, :message_text, :sent_at)";

        $query = $dbh->prepare($sql);
        $query->bindParam(':sender_id', $sender_id, PDO::PARAM_INT);
        $query->bindParam(':sender_type', $sender_type, PDO::PARAM_STR);
        $query->bindParam(':message_text', $message, PDO::PARAM_STR);
        $query->bindParam(':sent_at', $sent_at, PDO::PARAM_STR);

        if ($query->execute()) {
            header('Location: chat.php'); // Redirect to chat.php instead of index.php
            exit;
        } else {
            echo "Error sending message";
        }
    }
}
?>
