<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get in touch!</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/contactme.css">
    <script src="../assets/js/header.js" defer></script>
    <script src="../assets/js/script.js" defer></script>
    <script src="../assets/js/navbar.js" defer></script>
</head>

<body>
    <?php include '../templates/header.tpl.php' ?>
    <main>
        <h1 id="getInTouch">Get in touch!</h1>
        <form action="../includes/contactme.inc.php" method="post" id="contactForm">
            <?php
                if (isset($_GET['error'])) {
                    echo '<p id="errorMessage">' . $_GET['error'] . '</p>';
                } else if (isset($_GET['success'])) {
                    echo '<p id="successMessage">Your message has been sent!</p>';
                }
            ?>
            <div class="fields">
                <div class="fieldsLeft">
                    <?php
                        if (isset($_GET['name'])) {
                            echo '<input type="text" name="name" placeholder="Name*" class="' . (empty($_GET['name']) ? 'inputError' : '') . '" value="' . $_GET['name'] . '">';
                        } else {
                            echo '<input type="text" name="name" placeholder="Name*">';
                        }
                        if (isset($_GET['phoneNumber'])) {
                            echo '<input type="number" name="phoneNumber" placeholder="Phone number*" class="' . (empty($_GET['phoneNumber']) ? 'inputError' : '') . '" value="' . $_GET['phoneNumber'] . '">';
                        } else {
                            echo '<input type="number" name="phoneNumber" placeholder="Phone number*">';
                        }
                        if (isset($_GET['email'])) {
                            echo '<input type="email" name="email" placeholder="Email address*" class="' . (empty($_GET['email']) ? 'inputError' : '') . '" value="' . $_GET['email'] . '">';
                        } else {
                            echo '<input type="email" name="email" placeholder="Email address*">';
                        }
                        if (isset($_GET['company'])) {
                            echo '<input type="text" name="company" placeholder="Company" value="' . $_GET['company'] . '">';
                        } else {
                            echo '<input type="text" name="company" placeholder="Company">';
                        }
                    ?>
                </div>
                <div class="fieldsRight">
                    <?php
                        if (isset($_GET['message'])) {
                            echo '<textarea name="message" placeholder="Message*" id="contactMessage" class="' . (empty($_GET['message']) ? 'inputError' : '') . '">' . $_GET['message'] . '</textarea>';
                        } else {
                            echo '<textarea name="message" placeholder="Message*" id="contactMessage"></textarea>';
                        }
                    ?>
                    <button type="submit" id="sendMessage">
                        <svg id="sendMessageDecoLeft" width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.9961 1.41821L1.70729 20.707" stroke-linecap="round"/>
                            <path d="M14.4375 2.57544L2.86422 14.1487" stroke-linecap="round"/>
                        </svg>
                        Send message
                        <svg id="sendMessageDecoRight" width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.00391 20.5818L20.2927 1.29299" stroke-linecap="round"/>
                            <path d="M7.5625 19.4246L19.1358 7.85128" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            <p id="required">* Required</p>
        </form>
    </main>
    <div id="backgroundImage"></div>
    <?php include '../templates/footer.tpl.php' ?>
</body>

</html>