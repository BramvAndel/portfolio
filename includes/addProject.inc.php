<?php
include '../database/database.php';

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = validate($_POST['title']);
    $description = validate($_POST['description']);
    $challenge = validate($_POST['challenge']);
    $approach = validate($_POST['approach']);
    $solution = validate($_POST['solution']);
    $conclusion = validate($_POST['conclusion']);
    $image_url = validate($_POST['image_url']); // Assuming image URL is provided as a text input
    $project_date = validate($_POST['project_date']); // Assuming project date is provided as a date input
    $selectedTechnologies = explode(',', validate($_POST['selected_technologies']));

    try {
        // Insert the new project into the database
        $stmt = $conn->prepare("INSERT INTO projects (title, description, challenge, approach, solution, conclusion, image_url, project_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $challenge, $approach, $solution, $conclusion, $image_url, $project_date]);

        // Get the ID of the newly inserted project
        $projectId = $conn->lastInsertId();

        // Insert the selected technologies into the project_technologies table
        $stmt = $conn->prepare("INSERT INTO project_technologies (project_id, technology_id) VALUES (?, ?)");
        foreach ($selectedTechnologies as $techId) {
            $stmt->execute([$projectId, $techId]);
        }

        // Redirect to the admin panel or project overview page
        header("Location: ../pages/adminPanel.php?success=Project added successfully");
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        header("Location: ../pages/addProject.php?error=Database error: " . $e->getMessage());
        exit();
    }
} else {
    echo "Invalid request method.";
    exit();
}
?>