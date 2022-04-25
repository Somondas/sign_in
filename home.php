<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'login.php'; ?>
  </head>
  <body>
    <?php

     if (!isset( $_SESSION['username'])) {
      header('location:index.php');
    } ?>
    <h1>Hello <?php echo  $_SESSION['username']; ?></h1>
    <a href="logout.php">
    log out</a>
  </body>
</html>
