<?php
// SHARED HELPERS — used by the login and register pages

// One place to change the client name on the login/register pages
const SITE_NAME = 'Narrative Studios PH';

/** Escapes text so it is safe to print inside HTML. */
function e(string $text): string
{
  return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/** Returns the <svg> icon shown inside an input field (user, mail, lock, shield). */
function icon(string $name): string
{
  $icons = [
    'user'   => '<circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-6 8-6s8 2 8 6"/>',
    'mail'   => '<rect x="3.5" y="5.5" width="17" height="13" rx="2.2"/><path d="M4.5 7 12 12.5 19.5 7"/>',
    'lock'   => '<rect x="5" y="11" width="14" height="9" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/>',
    'shield' => '<path d="M12 3l7 3v5c0 4.6-3 8.3-7 10-4-1.7-7-5.4-7-10V6Z"/><path d="M9 12l2 2 4-4"/>',
  ];

  return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" '
       . 'stroke-linecap="round" stroke-linejoin="round">' . ($icons[$name] ?? '') . '</svg>';
}

/** Returns the red error text under a field (empty string when there is no error). */
function fieldError(array $errors, string $name): string
{
  return isset($errors[$name])
    ? '<span class="error-msg">' . e($errors[$name]) . '</span>'
    : '';
}

/**
 * Prints one complete form field: label, input, icon and error message.
 * Keys: id, label, type, placeholder, autocomplete, icon, [value], [error], [disabled]
 */
function renderField(array $f): void
{
  $hasError = !empty($f['error']);
  ?>
  <div class="field">
    <label for="<?= e($f['id']) ?>"><?= e($f['label']) ?></label>
    <div class="input-wrap">
      <input id="<?= e($f['id']) ?>" name="<?= e($f['id']) ?>" type="<?= e($f['type']) ?>"
             placeholder="<?= e($f['placeholder']) ?>" autocomplete="<?= e($f['autocomplete']) ?>"
             <?= isset($f['value']) ? 'value="' . e($f['value']) . '"' : '' ?>
             <?= $hasError ? 'class="input-error"' : '' ?>
             <?= !empty($f['disabled']) ? 'disabled' : '' ?> required>
      <span class="icon" aria-hidden="true"><?= icon($f['icon']) ?></span>
    </div>
    <?php if ($hasError): ?>
      <span class="error-msg"><?= e($f['error']) ?></span>
    <?php endif; ?>
  </div>
  <?php
}
