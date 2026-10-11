<?php
// LOGIN LOGIC — regex validation, credential check, attempts, lockout
// Included at the very top of login.php so redirects work before any HTML.
session_start();
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/patterns.php';

// --- DEMO CREDENTIALS & LOCKOUT SETTINGS ---
const STATIC_USERNAME = 'Admin';
const STATIC_PASSWORD = '00000000';
const MAX_ATTEMPTS    = 3;
const LOCKOUT_SECONDS = 30;

// Skips the login page.
if (!empty($_SESSION['loggedInUser'])) {
  header('Location: index.php');
  exit;
}

$identifier = '';
$errors     = [];
$alert      = '';

// Seconds left on an active lockout (0 if none)
$lockRemaining = max(0, ($_SESSION['lockoutUntil'] ?? 0) - time());

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $lockRemaining === 0) {
  $identifier = trim($_POST['identifier'] ?? '');
  $password   = $_POST['password'] ?? '';

  // --- VALIDATE IDENTIFIER (username or email) ---
  if ($identifier === '') {
    $errors['identifier'] = 'Please enter your username or email.';
  } elseif (!preg_match(PATTERN_USERNAME, $identifier) && !preg_match(PATTERN_EMAIL, $identifier)) {
    $errors['identifier'] = 'Enter a valid username (letters, numbers, _ or .) or a valid email address.';
  }

  // --- VALIDATE PASSWORD ---
  if ($password === '') {
    $errors['password'] = 'Please enter your password.';
  } elseif (strlen($password) < 5) {
    $errors['password'] = 'Password must be at least 5 characters long.';
  } elseif (!preg_match(PATTERN_LOGIN_PASSWORD, $password)) {
    $errors['password'] = 'Password cannot start or end with a space.';
  }

  // --- CHECK CREDENTIALS ---
  if (!$errors) {
    if (hash_equals(STATIC_USERNAME, $identifier) && hash_equals(STATIC_PASSWORD, $password)) {
      // SUCCESS: reset attempts, start a fresh session id, go to the home page
      session_regenerate_id(true);
      unset($_SESSION['attempts'], $_SESSION['lockoutUntil']);
      $_SESSION['loggedInUser'] = $identifier;
      header('Location: index.php');
      exit;
    }

    // FAILURE 
    $attempts = ($_SESSION['attempts'] ?? 0) + 1;

    if ($attempts >= MAX_ATTEMPTS) {
      $_SESSION['attempts']     = 0;
      $_SESSION['lockoutUntil'] = time() + LOCKOUT_SECONDS;
      $lockRemaining            = LOCKOUT_SECONDS;
    } else {
      $_SESSION['attempts'] = $attempts;
      $remaining = MAX_ATTEMPTS - $attempts;
      $alert = 'Incorrect username or password. ' . $remaining . ' attempt' .
               ($remaining === 1 ? '' : 's') . ' left before a ' . LOCKOUT_SECONDS . 's lockout.';
    }
  }
}

// While locked out, show the countdown message and disable the form
$locked = $lockRemaining > 0;
if ($locked) {
  $alert = 'Too many failed attempts. Please wait ' . $lockRemaining . 's before trying again.';
}
