<?php
session_start();
include '../database/database.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../pages/login.php');
    exit();
}

if (isset($_GET['project_id'])) {
    $projectId = $_GET['project_id'];
    $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->execute([$projectId]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        echo "Project not found.";
        exit();
    }

    // Fetch all technologies
    $stmt = $conn->prepare("SELECT * FROM technologies");
    $stmt->execute();
    $technologies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch technologies associated with the project
    $stmt = $conn->prepare("SELECT technology_id FROM project_technologies WHERE project_id = ?");
    $stmt->execute([$projectId]);
    $projectTechnologies = $stmt->fetchAll(PDO::FETCH_COLUMN);
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
  <title>Edit project</title>
  <link rel="stylesheet" href="../assets/css/general.css">
  <link rel="stylesheet" href="../assets/css/fonts.css">
  <link rel="stylesheet" href="../assets/css/editProject.css">
  <script src="../assets/js/header.js" defer></script>
  <script src="../assets/js/script.js" defer></script>
  <script src="../assets/js/navbar.js" defer></script>
</head>

<body>
  <?php include '../templates/header.tpl.php'; ?>
  <form action="../includes/editProject.inc.php" method="post" id="editProjectForm">
    <input type="hidden" name="project_id" value="<?php echo htmlspecialchars($project['id']); ?>">
    <input type="hidden" name="selected_technologies" id="selected_technologies">
    <div class="editTitle">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" placeholder="Title" value="<?php echo htmlspecialchars($project['title']); ?>">
    </div>
    <div class="mainEditStuf">
      <div class="editField">
        <label for="description">Description</label>
        <textarea name="description" id="description" placeholder="Description"><?php echo htmlspecialchars($project['description']); ?></textarea>
      </div>
      <div class="editField">
        <label for="challenge">Challenge</label>
        <textarea name="challenge" id="challenge" placeholder="Challenge"><?php echo htmlspecialchars($project['challenge']); ?></textarea>
      </div>
      <div class="editField">
        <label for="approach">Approach</label>
        <textarea name="approach" id="approach" placeholder="Approach"><?php echo htmlspecialchars($project['approach']); ?></textarea>
      </div>
      <div class="editField">
        <label for="solution">Solution</label>
        <textarea name="solution" id="solution" placeholder="Solution"><?php echo htmlspecialchars($project['solution']); ?></textarea>
      </div>
      <div class="editField">
        <label for="conclusion">Conclusion</label>
        <textarea name="conclusion" id="conclusion" placeholder="Conclusion"><?php echo htmlspecialchars($project['conclusion']); ?></textarea>
      </div>
      <div class="editField">
        <label for="image_url">Image URL</label>
        <input type="text" name="image_url" id="image_url" placeholder="Image URL" value="<?php echo htmlspecialchars($project['image_url']); ?>">
      </div>
      <div class="editField">
        <label for="project_date">Project Date</label>
        <input type="date" name="project_date" id="project_date" value="<?php echo htmlspecialchars($project['project_date']); ?>">
      </div>
    </div>
    <div class="bottomEditRow">
      <div class="leftSideBottomRow">
        <?php foreach ($technologies as $technology): ?>
          <button type="button" class="techButton <?php echo in_array($technology['id'], $projectTechnologies) ? 'selected' : ''; ?>" data-tech-id="<?php echo htmlspecialchars($technology['id']); ?>">
            <img src="<?php echo htmlspecialchars($technology['icon_url']); ?>" alt="<?php echo htmlspecialchars($technology['name']); ?> icon/logo">
          </button>
        <?php endforeach; ?>
      </div>
      <div class="rightSideBottomRow">
        <button type="submit">Save changes</button>
        <a href="../pages/adminPanel.php" id="cancelButton">Cancel</a>
      </div>
    </div>
  </form>
  <div id="backgroundImage"></div>
  <?php include '../templates/footer.tpl.php'; ?>
  <script>
    const selectedTechnologies = new Set(<?php echo json_encode($projectTechnologies); ?>);

    document.querySelectorAll('.techButton').forEach(button => {
      button.addEventListener('click', function() {
        const techId = this.getAttribute('data-tech-id');
        if (this.classList.contains('selected')) {
          this.classList.remove('selected');
          selectedTechnologies.delete(techId);
        } else {
          this.classList.add('selected');
          selectedTechnologies.add(techId);
        }
        document.getElementById('selected_technologies').value = Array.from(selectedTechnologies).join(',');
      });
    });

    // Initialize the hidden input with the current selected technologies
    document.getElementById('selected_technologies').value = Array.from(selectedTechnologies).join(',');
  </script>
  <style>
    .techButton.selected {
      background-color: #1dc4b3;
    }
  </style>
</body>

</html>