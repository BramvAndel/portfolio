<?php
$isIndexPage = basename($_SERVER['PHP_SELF']) == 'index.php';
$pathPrefix = $isIndexPage ? './' : '../';
?>
<link rel="stylesheet" href="<?php echo $pathPrefix; ?>assets/css/footer.css">
<footer>
    <div class="footerFooter">
        <img src="<?php echo $pathPrefix; ?>assets/images/dot.svg" alt="white dot">
        <h2>Bottom thingy</h2>
        <img src="<?php echo $pathPrefix; ?>assets/images/dot.svg" alt="white dot">
    </div>
    <img src="<?php echo $pathPrefix; ?>assets/images/bottomLeftBig.svg" alt="decoration" id="footerDecoLeft">
    <div class="footerContentPages">
        <div class="footerlink">
            <a href="<?php echo $pathPrefix; ?>index.php">Home</a>
            <a href="<?php echo $pathPrefix; ?>pages/aboutme.php">About me</a>
            <a href="<?php echo $pathPrefix; ?>pages/projectOverview.php">Projects</a>
            <a href="<?php echo $pathPrefix; ?>pages/contactme.php">Contact me</a>
            <?php if (isset($_SESSION['username'])) : ?>
                <a href="<?php echo $pathPrefix; ?>pages/adminPanel.php">admin panel</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="footerContentMiddle">
        <h2>BvA</h2>
        <div class="footerContactinformation">
            <a href="mailto:disha@uplers.com"  target="_blank">
                <svg id="mail-icon" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 15C2.5875 15 2.2345 14.8533 1.941 14.5598C1.6475 14.2663 1.5005 13.913 1.5 13.5V4.5C1.5 4.0875 1.647 3.7345 1.941 3.441C2.235 3.1475 2.588 3.0005 3 3H15C15.4125 3 15.7658 3.147 16.0598 3.441C16.3538 3.735 16.5005 4.088 16.5 4.5V13.5C16.5 13.9125 16.3533 14.2658 16.0598 14.5598C15.7663 14.8538 15.413 15.0005 15 15H3ZM9 9.75L15 6V4.5L9 8.25L3 4.5V6L9 9.75Z"/>
                </svg>
            </a>
            <a href="tel:0618129070" target="_blank">
                <svg id="tel-icon" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.4223 11.4451L12.5173 11.2276C12.2933 11.2013 12.0662 11.2261 11.8532 11.3001C11.6402 11.3741 11.4467 11.4955 11.2873 11.6551L9.90729 13.0351C7.77833 11.952 6.04783 10.2215 4.96479 8.09257L6.35229 6.70507C6.67479 6.38257 6.83229 5.93257 6.77979 5.47507L6.56229 3.58507C6.51992 3.21914 6.34439 2.88159 6.06913 2.63677C5.79388 2.39194 5.43816 2.25697 5.06979 2.25757H3.77229C2.92479 2.25757 2.21979 2.96257 2.27229 3.81007C2.66979 10.2151 7.79229 15.3301 14.1898 15.7276C15.0373 15.7801 15.7423 15.0751 15.7423 14.2276V12.9301C15.7498 12.1726 15.1798 11.5351 14.4223 11.4451Z"/>
                </svg>
            </a>
            <a href="https://github.com/BramvAndel" target="_blank">
                <svg id="github-icon" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.9993 2.6665C14.2484 2.6665 12.5146 3.01138 10.8969 3.68144C9.27923 4.35151 7.80937 5.33363 6.57126 6.57175C4.07077 9.07223 2.66602 12.4636 2.66602 15.9998C2.66602 21.8932 6.49268 26.8932 11.786 28.6665C12.4527 28.7732 12.666 28.3598 12.666 27.9998V25.7465C8.97268 26.5465 8.18602 23.9598 8.18602 23.9598C7.57268 22.4132 6.70602 21.9998 6.70602 21.9998C5.49268 21.1732 6.79935 21.1998 6.79935 21.1998C8.13268 21.2932 8.83935 22.5732 8.83935 22.5732C9.99935 24.5998 11.9593 23.9998 12.7193 23.6798C12.8393 22.8132 13.186 22.2265 13.5593 21.8932C10.5993 21.5598 7.49268 20.4132 7.49268 15.3332C7.49268 13.8532 7.99935 12.6665 8.86602 11.7198C8.73268 11.3865 8.26602 9.99984 8.99935 8.19984C8.99935 8.19984 10.1193 7.83984 12.666 9.55984C13.7193 9.2665 14.866 9.11984 15.9993 9.11984C17.1327 9.11984 18.2793 9.2665 19.3327 9.55984C21.8793 7.83984 22.9993 8.19984 22.9993 8.19984C23.7327 9.99984 23.266 11.3865 23.1327 11.7198C23.9993 12.6665 24.506 13.8532 24.506 15.3332C24.506 20.4265 21.386 21.5465 18.4127 21.8798C18.8927 22.2932 19.3327 23.1065 19.3327 24.3465V27.9998C19.3327 28.3598 19.546 28.7865 20.226 28.6665C25.5193 26.8798 29.3327 21.8932 29.3327 15.9998C29.3327 14.2489 28.9878 12.5151 28.3177 10.8974C27.6477 9.27972 26.6656 7.80986 25.4274 6.57175C24.1893 5.33363 22.7195 4.35151 21.1018 3.68144C19.4841 3.01138 17.7503 2.6665 15.9993 2.6665Z"/>
                </svg>
            </a>
            <a href="#" target="_blank">
                <svg id="linkedin-icon" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.3333 4C26.0406 4 26.7189 4.28095 27.219 4.78105C27.719 5.28115 28 5.95942 28 6.66667V25.3333C28 26.0406 27.719 26.7189 27.219 27.219C26.7189 27.719 26.0406 28 25.3333 28H6.66667C5.95942 28 5.28115 27.719 4.78105 27.219C4.28095 26.7189 4 26.0406 4 25.3333V6.66667C4 5.95942 4.28095 5.28115 4.78105 4.78105C5.28115 4.28095 5.95942 4 6.66667 4H25.3333ZM24.6667 24.6667V17.6C24.6667 16.4472 24.2087 15.3416 23.3936 14.5264C22.5784 13.7113 21.4728 13.2533 20.32 13.2533C19.1867 13.2533 17.8667 13.9467 17.2267 14.9867V13.5067H13.5067V24.6667H17.2267V18.0933C17.2267 17.0667 18.0533 16.2267 19.08 16.2267C19.5751 16.2267 20.0499 16.4233 20.3999 16.7734C20.75 17.1235 20.9467 17.5983 20.9467 18.0933V24.6667H24.6667ZM9.17333 11.4133C9.76742 11.4133 10.3372 11.1773 10.7573 10.7573C11.1773 10.3372 11.4133 9.76742 11.4133 9.17333C11.4133 7.93333 10.4133 6.92 9.17333 6.92C8.57571 6.92 8.00257 7.1574 7.57999 7.57999C7.1574 8.00257 6.92 8.57571 6.92 9.17333C6.92 10.4133 7.93333 11.4133 9.17333 11.4133ZM11.0267 24.6667V13.5067H7.33333V24.6667H11.0267Z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="footerContentNewsLetter">
        <h2>Join the news letter!</h2>
        <form action="<?php echo $pathPrefix; ?>includes/newsletter.inc.php" method="post">
            <input type="text" name="email" id="email" placeholder="Email">
            <button type="submit" id="subscribe">
                <img src="<?php echo $pathPrefix; ?>assets/images/topLeftSmall.svg" alt="decoration" id="subscribeDecoLeft">
                Subscribe
                <img src="<?php echo $pathPrefix; ?>assets/images/bottomRightSmall.svg" alt="decoration" id="subscribeDecoRight">
            </button>
        </form>
    </div>
    <img src="<?php echo $pathPrefix; ?>assets/images/topRightBig.svg" alt="decoration" id="footerDecoRight">
</footer>