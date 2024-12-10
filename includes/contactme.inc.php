<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $company = $_POST['company'];

  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }
  if (isset($_POST['phoneNumber'])) {
    $phoneNumber = $_POST['phoneNumber'];
  }
  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  }
  if (isset($_POST['message'])) {
    $message = $_POST['message'];
  }

  $error = '';
  if (!$name || !$phoneNumber || !$email || !$message) {
    $error = 'Please fill in all the required fields';
  }

  header("location: ../pages/contactme.php?error=$error&name=$name&phoneNumber=$phoneNumber&email=$email&company=$company&message=$message");
  exit();
}