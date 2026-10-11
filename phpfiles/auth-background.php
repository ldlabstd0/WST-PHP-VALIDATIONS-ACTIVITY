<!-- Full-screen backdrop overlay for color and texture gradients -->
  <div class="backdrop" aria-hidden="true"></div>

  <!-- Decorative SVG camera lens aperture graphic -->
  <svg class="aperture" viewBox="0 0 400 400" aria-hidden="true" focusable="false">
    <defs>
      <!-- Single aperture blade, reused 8 times below -->
      <path id="blade" d="M200,200 L235,36 L270,52 Z" fill="var(--accent)" />
    </defs>

    <!-- Guide circles -->
    <g fill="none" stroke="var(--accent)" stroke-width="1">
      <circle cx="200" cy="200" r="188" opacity="0.22" />
      <circle cx="200" cy="200" r="150" opacity="0.16" />
      <circle cx="200" cy="200" r="112" opacity="0.12" />
    </g>

    <!-- 8 blades rotated every 45 degrees around the center (200, 200) -->
    <g opacity="0.16">
      <?php foreach (range(0, 315, 45) as $degrees): ?>
        <use href="#blade" transform="rotate(<?= $degrees ?> 200 200)" />
      <?php endforeach; ?>
    </g>
  </svg>
