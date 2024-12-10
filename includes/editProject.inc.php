<?php
include '../database/database.php';

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectId = validate($_POST['project_id']);
    $title = validate($_POST['title']);
    $description = validate($_POST['description']);
    $challenge = validate($_POST['challenge']);
    $approach = validate($_POST['approach']);
    $solution = validate($_POST['solution']);
    $conclusion = validate($_POST['conclusion']);
    $image_url = validate($_POST['image_url']); // Assuming image URL is provided as a text input
    $project_date = validate($_POST['project_date']); // Assuming project date is provided as a date input
    $selectedTechnologies = array_unique(explode(',', validate($_POST['selected_technologies'])));

    try {
        // Begin transaction
        $conn->beginTransaction();

        // Update the project in the database
        $stmt = $conn->prepare("UPDATE projects SET title = ?, description = ?, challenge = ?, approach = ?, solution = ?, conclusion = ?, image_url = ?, project_date = ? WHERE id = ?");
        $stmt->execute([$title, $description, $challenge, $approach, $solution, $conclusion, $image_url, $project_date, $projectId]);

        // Remove existing technologies
        $stmt = $conn->prepare("DELETE FROM project_technologies WHERE project_id = ?");
        $stmt->execute([$projectId]);

        // Insert the selected technologies into the project_technologies table
        $stmt = $conn->prepare("INSERT INTO project_technologies (project_id, technology_id) VALUES (?, ?)");
        foreach ($selectedTechnologies as $techId) {
            $stmt->execute([$projectId, $techId]);
        }

        // Commit transaction
        $conn->commit();

        // Redirect to the admin panel or project overview page
        header("Location: ../pages/adminPanel.php?success=Project updated successfully");
        exit();
    } catch (PDOException $e) {
        // Rollback transaction in case of error
        $conn->rollBack();
        // Handle database errors
        header("Location: ../pages/editProject.php?project_id=$projectId&error=Database error: " . $e->getMessage());
        exit();
    }
} else {
    echo "Invalid request method.";
    exit();
}
?>