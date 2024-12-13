<?php
session_start();
$isIndexPage = basename($_SERVER['PHP_SELF']) == 'index.php';
$pathPrefix = $isIndexPage ? './' : '../';
?>
<link rel="stylesheet" href="<?php echo $pathPrefix; ?>assets/css/header.css">
<script src="<?php echo $pathPrefix; ?>assets/js/darkmode.js" defer></script>

<header>
    <a href="<?php echo $pathPrefix; ?>index.php">BvA</a>
    <svg class="menuToggle" id="menuToggle" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
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
    <button id="theme-switch">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
    </button>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="<?php echo $pathPrefix; ?>includes/logout.inc.php" id="loginSymbolPerson">
            <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 14L19.2 16.8L24.4 22H4V26H24.4L19.2 31.2L22 34L32 24L22 14ZM40 38H24V42H40C42.2 42 44 40.2 44 38V10C44 7.8 42.2 6 40 6H24V10H40V38Z" />
            </svg>
        </a>
    <?php endif; ?>
</nav>