<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ./login.php');
    exit();
}
include '../database/database.php';

$stmt = $conn->prepare("SELECT * FROM projects");
$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/adminPanel.css">
    <script src="../assets/js/header.js" defer></script>
    <script src="../assets/js/script.js" defer></script>
    <script src="../assets/js/navbar.js" defer></script>
</head>

<body>
    <?php include '../templates/header.tpl.php' ?>
    <main>
        <div class="panel">
            <div class="projectList">
                <?php if (count($projects) > 0): ?>
                    <?php foreach ($projects as $project): ?>
                        <div class="project">
                            <a class="projectInfo" href="./editProject.php?project_id=<?php echo htmlspecialchars($project['id']); ?>" data-projectID="<?php echo htmlspecialchars($project['id']); ?>">
                                <div class="projectTitleDiv">
                                    <img src="../assets/images/dot.svg" alt="dot">
                                    <h2><?php echo htmlspecialchars($project['title']); ?></h2>
                                    <img src="../assets/images/dot.svg" alt="dot">
                                </div>
                                <p class="projectDate"><?php echo htmlspecialchars(date('d-m-Y', strtotime($project['project_date']))); ?></p>
                            </a>
                            <div class="projectButtons">
                                <a href="./editProject.php?project_id=<?php echo htmlspecialchars($project['id']); ?>" class="projectButton" data-projectID="<?php echo htmlspecialchars($project['id']); ?>"><img src="../assets/images/pencil.svg" alt="pencil"></a>
                                <a href="../includes/deleteProject.inc.php?project_id=<?php echo htmlspecialchars($project['id']); ?>" class="projectButton" onclick="return confirm('Are you sure you want to delete this project?');"><img src="../assets/images/trash.svg" alt="trashcan"></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No projects found.</p>
                <?php endif; ?>
            </div>
            <div class="panelButtons">
                <a href="./addProject.php" class="addProjectButton"><img src="../assets/images/plus.svg" alt="plus"></a>
                <a href="https://web03.sd-lab.nl:8443/" target="_blank"><img src="../assets/images/plesk.svg" alt="plesk logo"></a>
            </div>
        </div>
    </main>
    <div id="backgroundImage"></div>
    <?php include '../templates/footer.tpl.php' ?>
</body>

</html>