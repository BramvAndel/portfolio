<?php
include '../database/database.php';

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../pages/login.php');
    exit();
}

// Fetch all technologies
$stmt = $conn->prepare("SELECT * FROM technologies");
$stmt->execute();
$technologies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Project</title>
  <link rel="stylesheet" href="../assets/css/general.css">
  <link rel="stylesheet" href="../assets/css/fonts.css">
  <link rel="stylesheet" href="../assets/css/editProject.css">
  <script src="../assets/js/header.js" defer></script>
  <script src="../assets/js/script.js" defer></script>
  <script src="../assets/js/navbar.js" defer></script>
</head>

<body>
  <?php include '../templates/header.tpl.php'; ?>
  <form action="../includes/addProject.inc.php" method="post" id="addProjectForm">
    <div class="editTitle">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" placeholder="Title">
    </div>
    <div class="mainEditStuf">
      <div class="editField">
        <label for="description">Description</label>
        <textarea name="description" id="description" placeholder="Description"></textarea>
      </div>
      <div class="editField">
        <label for="challenge">Challenge</label>
        <textarea name="challenge" id="challenge" placeholder="Challenge"></textarea>
      </div>
      <div class="editField">
        <label for="approach">Approach</label>
        <textarea name="approach" id="approach" placeholder="Approach"></textarea>
      </div>
      <div class="editField">
        <label for="solution">Solution</label>
        <textarea name="solution" id="solution" placeholder="Solution"></textarea>
      </div>
      <div class="editField">
        <label for="conclusion">Conclusion</label>
        <textarea name="conclusion" id="conclusion" placeholder="Conclusion"></textarea>
      </div>
      <div class="editField">
        <label for="image_url">Image URL</label>
        <input type="text" name="image_url" id="image_url" placeholder="Image URL">
      </div>
      <div class="editField">
        <label for="project_date">Project Date</label>
        <input type="date" name="project_date" id="project_date">
      </div>
    </div>
    <div class="bottomEditRow">
      <div class="leftSideBottomRow">
        <?php foreach ($technologies as $technology): ?>
          <button type="button" class="techButton" data-tech-id="<?php echo htmlspecialchars($technology['id']); ?>">
            <img src="<?php echo htmlspecialchars($technology['icon_url']); ?>" alt="<?php echo htmlspecialchars($technology['name']); ?> icon/logo">
          </button>
        <?php endforeach; ?>
      </div>
      <div class="rightSideBottomRow">
        <button type="submit">Add project</button>
        <a href="../pages/adminPanel.php" id="cancelButton">Cancel</a>
      </div>
    </div>
    <input type="hidden" name="selected_technologies" id="selected_technologies">
  </form>
  <div id="backgroundImage"></div>
  <?php include '../templates/footer.tpl.php'; ?>
  <script>
    const selectedTechnologies = new Set();

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
  </script>
</body>

</html>