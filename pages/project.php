<?php
include '../database/database.php';

if (isset($_GET['project'])) {
    $projectTitle = $_GET['project'];
    $stmt = $conn->prepare("SELECT * FROM projects WHERE title = ?");
    $stmt->execute([$projectTitle]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        echo "Project not found.";
        exit();
    }

    // Fetch technologies associated with the project
    $stmt = $conn->prepare("SELECT t.name, t.icon_url FROM technologies t
                            JOIN project_technologies pt ON t.id = pt.technology_id
                            JOIN projects p ON pt.project_id = p.id
                            WHERE p.title = ?");
    $stmt->execute([$projectTitle]);
    $technologies = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "No project specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($project['title']); ?></title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/project.css">
    <script src="../assets/js/header.js" defer></script>
    <script src="../assets/js/script.js" defer></script>
    <script src="../assets/js/navbar.js" defer></script>
</head>

<body>
    <?php include '../templates/header.tpl.php' ?>
    <main>
        <section>
            <div class="projectTitle">
                <h1><?php echo htmlspecialchars($project['title']); ?></h1>
                <p><?php echo htmlspecialchars($project['description']); ?></p>
            </div>
        </section>
        <section>
            <div class="aboutProject">
                <img src="<?php echo htmlspecialchars($project['image_url']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                <div class="aboutProjectText">
                    <h2>About the project</h2>
                    <p><?php echo htmlspecialchars($project['description']); ?></p>
                </div>
        </section>
        <div class="projectMadewidth">
            <img src="../assets/images/bottomLeftBig.svg" alt="decoration" id="projectMadeWidthDecoLeft">
            <div class="centerItems">
                <h2>This project has been made with</h2>
                <div class="logos">
                    <?php foreach ($technologies as $technology): ?>
                        <img src="<?php echo htmlspecialchars($technology['icon_url']); ?>" alt="<?php echo htmlspecialchars($technology['name']); ?> logo">
                    <?php endforeach; ?>
                </div>
            </div>
            <img src="../assets/images/topRightBig.svg" alt="decoration" id="projectMadeWidthDecoRight">
        </div>
        <section>
            <div class="projectProblemStuff">
                <div class="projectTop">
                    <h2>Challenge</h2>
                    <p><?php echo htmlspecialchars($project['challenge']); ?></p>
                </div>
                <div class="projectBottom">
                    <h2>Approach</h2>
                    <p><?php echo htmlspecialchars($project['approach']); ?></p>
                </div>
            </div>
        </section>
        <div class="contactMeBalk">
            <img src="../assets/images/bottomLeftBigWhite.svg" alt="decoration" id="contactMeBalkDecoRight">
            <div class="centerItems">
                <h2 class="projectMaybe">Got a project in mind? Get in touch!</h2>
                <a href="../pages/contactme.php" class="contactMeButton">
                    <img src="../assets/images/topLeftSmallBlack.svg" alt="decoration" id="contactmeButtonDecoLeft">
                    Contact me
                    <img src="../assets/images/bottomRightSmallBlack.svg" alt="decoration" id="contactmeButtonDecoRight">
                </a>
            </div>
            <img src="../assets/images/topRightBigWhite.svg" alt="decoration" id="contactMeBalkDecoLeft">
        </div>
        <section>
            <div class="projectProblemStuff">
                <div class="projectBottom">
                    <h2>Solution</h2>
                    <p><?php echo htmlspecialchars($project['solution']); ?></p>
                </div>
                <div class="projectTop">
                    <h2>Conclusion</h2>
                    <p><?php echo htmlspecialchars($project['conclusion']); ?></p>
                </div>
            </div>
        </section>
    </main>
    <div id="backgroundImage"></div>
    <?php include '../templates/footer.tpl.php' ?>
</body>

</html>
