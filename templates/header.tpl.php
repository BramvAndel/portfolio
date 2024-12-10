<?php
session_start();
$isIndexPage = basename($_SERVER['PHP_SELF']) == 'index.php';
$pathPrefix = $isIndexPage ? './' : '../';
?>
<link rel="stylesheet" href="<?php echo $pathPrefix; ?>assets/css/header.css">

<header>
    <a href="<?php echo $pathPrefix; ?>index.php">BvA</a>
    <svg id="menuToggle" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M32 32H40V40H32V32ZM20 32H28V40H20V32ZM8 32H16V40H8V32ZM32 20H40V28H32V20ZM20 20H28V28H20V20ZM8 20H16V28H8V20ZM32 8H40V16H32V8ZM20 8H28V16H20V8ZM8 8H16V16H8V8Z"/>
    </svg>

</header>
<nav id="navbar">
    <div class="navItems">
        <a href="<?php echo $pathPrefix; ?>index.php">Home</a>
        <a href="<?php echo $pathPrefix; ?>pages/aboutme.php">About me</a>
        <a href="<?php echo $pathPrefix; ?>pages/projectOverview.php">Projects</a>
        <a href="<?php echo $pathPrefix; ?>pages/contactme.php">Contact me</a>
        <?php if (isset($_SESSION['username'])) : ?>
            <a href="<?php echo $pathPrefix; ?>pages/adminPanel.php">admin panel</a>
        <?php endif; ?>
    </div>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="<?php echo $pathPrefix; ?>includes/logout.inc.php" id="loginSymbolPerson">
            <img src="<?php echo $pathPrefix; ?>assets/images/logout.svg" alt="person symbol">
        </a>
    <?php endif; ?>
    <svg id="navbarMenuToggle" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M32 32H40V40H32V32ZM20 32H28V40H20V32ZM8 32H16V40H8V32ZM32 20H40V28H32V20ZM20 20H28V28H20V20ZM8 20H16V28H8V20ZM32 8H40V16H32V8ZM20 8H28V16H20V8ZM8 8H16V16H8V8Z"/>
    </svg>
</nav>