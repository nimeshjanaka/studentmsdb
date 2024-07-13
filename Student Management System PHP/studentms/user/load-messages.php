

<?php
// Include the database connection file
require_once('../includes/dbconnection.php');

try {
    // Fetch messages from the database
    $sql = "SELECT m.*, a.AdminName, 'admin' as type FROM tblmessages m 
            INNER JOIN tbladmin a ON m.sender_id = a.ID 
            UNION ALL
            SELECT m.*, s.StudentName, 'student' as type FROM tblmessages m 
            INNER JOIN tblstudent s ON m.sender_id = s.ID
            ORDER BY sent_at ASC";

    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    // Output messages
    foreach ($results as $row) {
        $senderType = $row['type'];
        $senderName = isset($row['AdminName']) ? $row['AdminName'] : (isset($row['StudentName']) ? $row['StudentName'] : 'Unknown Sender');
        $messageText = $row['message_text'];
        $sentAt = $row['sent_at'];

        echo "<div class='message'>";
        echo "<p><strong>$senderName:</strong> $messageText</p>";
        echo "<span class='timestamp'>$sentAt</span>";
        echo "</div>";
    }
} catch (PDOException $e) {
    // Handle query errors
    die("Error fetching messages: " . $e->getMessage());
}
?>
