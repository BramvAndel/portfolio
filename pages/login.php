<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <script src="../assets/js/header.js" defer></script>
    <script src="../assets/js/script.js" defer></script>
    <script src="../assets/js/navbar.js" defer></script>
</head>

<body>
    <?php include '../templates/header.tpl.php' ?>
    <main>
        <form action="../includes/login.inc.php" method="post" id="loginForm">
            <h1>Login</h1>
            <?php if (isset($_GET['error']))
                {
                   echo "<p class='error'>" . $_GET['error'] ."</p>";

                   switch ($_GET['error']) {
                       case "Fill in all the fields":
                           echo "<input type='text' name='username' placeholder='Username' class='inputError'>";
                           echo "<input type='password' name='password' placeholder='Password' class='inputError'>";
                           break;
                       case "Username is required":
                           echo "<input type='text' name='username' placeholder='Username' class='inputError'>";
                           echo "<input type='password' name='password' placeholder='Password'>";
                           break;
                       case "Password is required":
                           echo "<input type='text' name='username' placeholder='Username' value='" . htmlspecialchars($_GET['username']) . "'>";
                           echo "<input type='password' name='password' placeholder='Password' class='inputError'>";
                           break;
                       case "Incorrect Username or Password":
                           echo "<input type='text' name='username' placeholder='Username' class='inputError'>";
                           echo "<input type='password' name='password' placeholder='Password' class='inputError'>";
                           break;
                       default:
                           echo "<input type='text' name='username' placeholder='Username'>";
                           echo "<input type='password' name='password' placeholder='Password'>";
                           break;
                   }
                } else
                {
                    echo "<input type='text' name='username' placeholder='Username'>";
                    echo "<input type='password' name='password' placeholder='Password'>";
                }

            ?>
            <!-- <input type='text' name='username' placeholder='Username'>
            <input type='password' name='password' placeholder='Password'> -->
            <button type="submit" id="login">
                <img src="../assets/images/topLeftSmall.svg" alt="decoration" id="loginDecoLeft">
                Login
                <img src="../assets/images/bottomRightSmall.svg" alt="decoration" id="loginDecoRight">
            </button>
        </form>
    </main>
    <div id="backgroundImage"></div>
    <?php include '../templates/footer.tpl.php' ?>
</body>

</html>