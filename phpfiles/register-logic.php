<?php
// REGISTER LOGIC
// Included at the very top of register.php so the redirect header can be sent.
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/patterns.php';

$values  = ['fullname' => '', 'email' => ''];
$errors  = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Collapse repeated spaces in the name, trim everything else
  $values['fullname'] = trim(preg_replace('/\s+/', ' ', $_POST['fullname'] ?? ''));
  $values['email']    = trim($_POST['email'] ?? '');
  $password           = $_POST['password'] ?? '';
  $confirm            = $_POST['confirm'] ?? '';
  $agree              = isset($_POST['agree']);

  // --- FULL NAME ---
  if ($values['fullname'] === '') {
    $errors['fullname'] = 'Please enter your full name.';
  } elseif (!preg_match(PATTERN_FULL_NAME, $values['fullname'])) {
    $errors['fullname'] = 'Name must be 2-60 characters and use only letters, spaces, apostrophes, dots or hyphens.';
  }

  // --- EMAIL ---
  if ($values['email'] === '') {
    $errors['email'] = 'Please enter your email address.';
  } elseif (!preg_match(PATTERN_EMAIL, $values['email']) || !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address.';
  }

  // --- PASSWORD ---
  if ($password === '') {
    $errors['password'] = 'Please create a password.';
  } elseif (!preg_match(PATTERN_NEW_PASSWORD, $password)) {
    $errors['password'] = 'Password must be at least 8 characters and include at least one letter and one number.';
  }

  // --- CONFIRM PASSWORD ---
  if ($confirm === '') {
    $errors['confirm'] = 'Please confirm your password.';
  } elseif (!hash_equals($password, $confirm)) {
    $errors['confirm'] = 'Passwords do not match. Please re-enter.';
  }

  // --- TERMS CHECKBOX ---
  if (!$agree) {
    $errors['agree'] = 'You must agree to the Terms of Service and Privacy Policy.';
  }

  // --- ALL VALID ---
  if (!$errors) {
    $success = true;
    $values  = ['fullname' => '', 'email' => ''];
    // Send the user to the login page after 2 seconds (must be sent before any HTML output)
    header('Refresh: 2; url=login.php');
  }
}
