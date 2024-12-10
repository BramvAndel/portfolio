<?php
session_start();
include '../database/database.php';

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = validate(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $password = validate(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));

    if (empty($username) && empty($password)) {
        header("location: ../pages/login.php?error=Fill in all the fields");
        exit();
    } elseif (empty($username)) {
        header("location: ../pages/login.php?error=Username is required");
        exit();
    } elseif (empty($password)) {
        header("location: ../pages/login.php?error=Password is required&username=" . urlencode($username));
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $storedHashedPassword = $row['password'];
        if (password_verify($password, $storedHashedPassword)) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("location: ../pages/adminPanel.php");
            exit();
        } else {
            header("location: ../pages/login.php?error=Incorrect Username or Password");
            exit();
        }
    } else {
        header("location: ../pages/login.php?error=Incorrect Username or Password");
        exit();
    }
}
?>
