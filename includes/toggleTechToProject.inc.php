<?php
include '../database/database.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['project_id']) && isset($data['tech_id']) && isset($data['action'])) {
    $projectId = $data['project_id'];
    $techId = $data['tech_id'];
    $action = $data['action'];

    try {
        if ($action === 'add') {
            // Insert the technology into the project_technologies table
            $stmt = $conn->prepare("INSERT INTO project_technologies (project_id, technology_id) VALUES (?, ?)");
            $stmt->execute([$projectId, $techId]);
        } elseif ($action === 'remove') {
            // Remove the technology from the project_technologies table
            $stmt = $conn->prepare("DELETE FROM project_technologies WHERE project_id = ? AND technology_id = ?");
            $stmt->execute([$projectId, $techId]);
        }

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input']);
}
?>