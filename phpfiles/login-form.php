<h1 id="login-heading">Welcome back!</h1>
      <p class="card__sub">Log in to check your booking, payment status and finished photos.</p>

      <!-- Alert box -->
      <div id="loginAlert" class="alert-box<?= $alert === '' ? ' d-none' : '' ?>" role="alert"><?= e($alert) ?></div>

      <!-- Login Form -->
      <form id="loginForm" action="login.php" method="post" novalidate>

        <?php renderField([
          'id'           => 'identifier',
          'label'        => 'Email or username',
          'type'         => 'text',
          'placeholder'  => 'Email@example.com',
          'autocomplete' => 'username',
          'icon'         => 'user',
          'value'        => $identifier,
          'error'        => $errors['identifier'] ?? null,
          'disabled'     => $locked,
        ]); ?>

        <?php renderField([
          'id'           => 'password',
          'label'        => 'Password',
          'type'         => 'password',
          'placeholder'  => '••••••••',
          'autocomplete' => 'current-password',
          'icon'         => 'lock',
          'error'        => $errors['password'] ?? null,
          'disabled'     => $locked,
        ]); ?>

        <!-- Options Row -->
        <div class="row-between">
          <label class="remember">
            <input type="checkbox" name="remember">
            Remember me
          </label>
          <a href="#" class="forgot-link">Forgot password?</a>
        </div>

        <button type="submit" class="btn" <?= $locked ? 'disabled' : '' ?>>Log in</button>
      </form>

      <p class="switch">New to <?= e(SITE_NAME) ?>? <a href="register.php">Create an account</a></p>
      <p class="demo-hint">Demo login — username: <strong>Admin</strong>, password: <strong>00000000</strong></p>
