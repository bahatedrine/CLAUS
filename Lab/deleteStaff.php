<?php
include 'session.php';
include 'dbconn.php';

if (isset($_GET['staffId'])) {
    $staffId = $_GET['staffId'];

    // Perform the deletion
    $sql = "DELETE FROM staff WHERE staffId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $staffId);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt) {
        echo "
        <script>
        alert('Staff Removed');
        window.location = 'adminPage.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Error removing staff');
        window.location = 'adminPage.php';
        </script>
        ";
    }
} else {
    // If staffId is not set, redirect back to admin page
    header("Location: adminPage.php");
    exit();
}
?>
