<?php if ($locked): ?>
  <!-- Live countdown while locked outand it reloads the page when the lockout ends -->
  <script>
    (function () {
      var seconds = <?= (int)$lockRemaining ?>;
      var box = document.getElementById("loginAlert");
      var timer = setInterval(function () {
        seconds -= 1;
        if (seconds <= 0) {
          clearInterval(timer);
          window.location.href = "login.php";
        } else {
          box.textContent = "Too many failed attempts. Please wait " + seconds + "s before trying again.";
        }
      }, 1000);
    })();
  </script>
<?php endif; ?>
