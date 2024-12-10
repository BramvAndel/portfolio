<?php
include '../database/database.php';

if (isset($_GET['project_id'])) {
    $projectId = $_GET['project_id'];

    try {
        // Delete the project from the database
        $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$projectId]);

        // Redirect to the admin panel with a success message
        header("Location: ../pages/adminPanel.php?success=Project deleted successfully");
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        header("Location: ../pages/adminPanel.php?error=Database error: " . $e->getMessage());
        exit();
    }
} else {
    // Redirect to the admin panel with an error message if no project ID is provided
    header("Location: ../pages/adminPanel.php?error=No project ID specified");
    exit();
}
?>