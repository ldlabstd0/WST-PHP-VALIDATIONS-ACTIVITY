<h1 id="register-heading">Create your account</h1>
      <p class="card__sub">Set up your profile once, then book and manage every future session.</p>

      <!-- Success banner -->
      <?php if ($success): ?>
        <div id="registerSuccess" class="alert-box success" role="alert">
          Account created! Redirecting you to the login page…
        </div>
      <?php endif; ?>

      <!-- Registration Form -->
      <form id="registerForm" action="register.php" method="post" novalidate>

        <?php renderField([
          'id'           => 'fullname',
          'label'        => 'Full name',
          'type'         => 'text',
          'placeholder'  => 'Your Full Name',
          'autocomplete' => 'name',
          'icon'         => 'user',
          'value'        => $values['fullname'],
          'error'        => $errors['fullname'] ?? null,
        ]); ?>

        <?php renderField([
          'id'           => 'email',
          'label'        => 'Email address',
          'type'         => 'email',
          'placeholder'  => 'Email@example.com',
          'autocomplete' => 'email',
          'icon'         => 'mail',
          'value'        => $values['email'],
          'error'        => $errors['email'] ?? null,
        ]); ?>

        <?php renderField([
          'id'           => 'password',
          'label'        => 'Password',
          'type'         => 'password',
          'placeholder'  => 'At least 8 characters, letters and numbers',
          'autocomplete' => 'new-password',
          'icon'         => 'lock',
          'error'        => $errors['password'] ?? null,
        ]); ?>

        <?php renderField([
          'id'           => 'confirm',
          'label'        => 'Confirm password',
          'type'         => 'password',
          'placeholder'  => 'Re-enter your password',
          'autocomplete' => 'new-password',
          'icon'         => 'shield',
          'error'        => $errors['confirm'] ?? null,
        ]); ?>

        <!-- Terms & Conditions Checkbox -->
        <label class="terms">
          <input type="checkbox" id="agree" name="agree" <?= isset($_POST['agree']) && !$success ? 'checked' : '' ?> required>
          <span>I agree to the <u>Terms of Service</u> and <u>Privacy Policy</u></span>
        </label>
        <?= fieldError($errors, 'agree') ?>

        <button type="submit" class="btn">Create account</button>
      </form>

      <p class="switch">Already have an account? <a href="login.php">Log in</a></p>
