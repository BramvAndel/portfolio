<?php
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
    <title>Projects overview</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/projectOverview.css">
    <script src="../assets/js/header.js" defer></script>
    <script src="../assets/js/script.js" defer></script>
    <script src="../assets/js/navbar.js" defer></script>
</head>

<body>
    <?php include '../templates/header.tpl.php' ?>
    <main<?php echo count($projects) > 0 ? '' : ' id="temp"'; ?>>
        <section class="mainpageTitle">
            <div class="projectOvTitle">
                <h1>Projects</h1>
                <p>Learn all about the past projects I have been a part of.</p>
            </div>
        </section>
        <!-- <section class="projectList">
            <div class="project">
                <img src="#" alt="#" class="projectImage">
                <h2 class="projectTitle">Facebook profile</h2>
                <p class="projectDescription">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
                <div class="projectBottomPart">
                    <a href="./project.php?project=" class="projectButton">
                        <p>Learn more</p>
                        <img src="../assets/images/arrow.svg" alt="#">
                    </a>
                    <p class="projectDate">01/01/2001</p>
                </div>
            </div>
        </section> -->
        <?php if (count($projects) > 0): ?>
            <section class="projectList">
                <?php foreach ($projects as $project): ?>
                    <div class="project">
                        <img src="<?php echo htmlspecialchars($project['image_url']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="projectImage">
                        <h2 class="projectTitle"><?php echo htmlspecialchars($project['title']); ?></h2>
                        <p class="projectDescription"><?php echo htmlspecialchars($project['description']); ?></p>
                        <div class="projectBottomPart">
                            <a href="./project.php?project=<?php echo urlencode($project['title']); ?>" class="projectButton">
                                <p>Learn more</p>
                                <svg width="18" height="36" viewBox="0 0 18 36" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.2354 19.0665L8.74991 27.552L6.62891 25.431L14.0539 18.006L6.62891 10.581L8.74991 8.45996L17.2354 16.9455C17.5166 17.2268 17.6746 17.6082 17.6746 18.006C17.6746 18.4037 17.5166 18.7852 17.2354 19.0665Z"/>
                                </svg>
                            </a>
                            <p class="projectDate"><?php echo htmlspecialchars($project['project_date']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php else: ?>
            <div class="noprojectDisplay">
                <h2>Looks like there are no projects yet</h2>
                <p>Sign up for the news letter to get notified for when I add a project!</p>
                <div class="newsSignUp">
                    <input type="email" placeholder="Email address" id="newsEmail">
                    <button id="newsSignUpButton">
                        <img src="../assets/images/topLeftSmallBlack.svg" alt="decoration" id="newsSignUpButtonDecoLeft">
                        Sign up
                        <img src="../assets/images/bottomRightSmallBlack.svg" alt="decoration" id="newsSignUpButtonDecoRight">
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </main>
    <div id="backgroundImage"></div>
    <?php include '../templates/footer.tpl.php' ?>
</body>

</html>