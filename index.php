<?php
// Server-side authentication guard
session_start();
if (empty($_SESSION['loggedInUser'])) {
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'phpfiles/header.php'; ?>
</head>
<body>

  <!-- NAVIGATION BAR -->
  <nav class="nav-strip py-3">
    <?php include 'phpfiles/navbar.php'; ?>
  </nav>

  <!-- HERO SECTION -->
  <header class="hero">
    <?php include 'phpfiles/hero.php'; ?>
  </header>

  <!-- SCRIPTS -->
  <?php include 'phpfiles/scripts.php'; ?>

</body>
</html>
