<?php
// Validation logic
require 'phpfiles/register-logic.php';

// Values used by the shared partials below
$pageTitle = 'Register — ' . SITE_NAME;
$cssFile   = 'registerStyle.css';
$tagline   = 'Book sessions, track payments and download your gallery — all in one place.';
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

    <!-- REGISTER CARD -->
    <main class="card" role="main" aria-labelledby="register-heading">
      <?php include 'phpfiles/register-form.php'; ?>
    </main>

  </div>

</body>
</html>
