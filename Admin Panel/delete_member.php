<?php
// Include database connection
require_once "connection.php";

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the member based on the ID
    $sql = "DELETE FROM members WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Close the statement
    $stmt->close();
}

// Close database connection
$conn->close();

// Redirect to the member report page after deletion
header('Location: memberreport.php');
exit();
?>
