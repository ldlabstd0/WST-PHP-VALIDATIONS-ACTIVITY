<?php
// Validation, session and lockout logic: runs first so redirects work before any HTML
require 'phpfiles/login-logic.php';

// Values used by the shared partials below
$pageTitle = 'Log In — ' . SITE_NAME;
$cssFile   = 'loginStyle.css';
$tagline   = 'Sign in to manage sessions, bookings and galleries in one place.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'phpfiles/auth-head.php'; ?>
</head>
<body>

  <!-- BACKGROUND -->
  <?php include 'phpfiles/auth-background.php'; ?>

  <div class="stage">

    <!-- BRAND BLOCK -->
    <?php include 'phpfiles/auth-brand.php'; ?>

    <!-- LOGIN CARD -->
    <main class="card" role="main" aria-labelledby="login-heading">
      <?php include 'phpfiles/login-form.php'; ?>
    </main>

  </div>

  <!-- LOCKOUT COUNTDOWN -->
  <?php include 'phpfiles/login-countdown.php'; ?>

</body>
</html>
