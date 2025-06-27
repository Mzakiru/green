<?php
include 'db_config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $message);
        if ($stmt->execute()) {
            echo "Message sent successfully.";
        } else {
            echo "Error: Could not submit message.";
        }
    } else {
        echo "Database error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>