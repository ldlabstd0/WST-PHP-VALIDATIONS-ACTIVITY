<div class="container-narrow">

      <!-- Dynamic Welcome Banner -->
      <div class="welcome-banner" id="welcomeBanner">Welcome, <?= htmlspecialchars($_SESSION['loggedInUser'], ENT_QUOTES, 'UTF-8') ?>!</div>

      <div class="row align-items-center g-5">

        <!-- Left Column -->
        <div class="col-lg-6">
          <h1>Every booking, payment, and photo — in one place.</h1>
          <p class="lede">
            A management and booking system built for events photographers and studios still running their calendar out of notebooks, spreadsheets, and group chats.
          </p>
          <div class="d-flex flex-wrap gap-3 mt-4">
            <a href="#" class="btn btn-amber">See what it does</a>
            <a href="#" class="btn btn-outline-ivory">Why studios need it</a>
          </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-6">
          <div class="contact-sheet">
            <div class="row g-2">
              <!-- Grid Item 1: Wedding Session Preview -->
              <div class="col-6">
                <div class="frame f1">
                  <img src="images/wedding.jpg" alt="Wedding session, May 12">
                  <span>Wedding, 05.12</span>
                </div>
              </div>
              <!-- Grid Item 2: Portrait Session Preview -->
              <div class="col-6">
                <div class="frame f2">
                  <img src="images/portrait.jpg" alt="Portrait session, May 14">
                  <span>Portrait, 05.14</span>
                </div>
              </div>
              <!-- Grid Item 3: Event Session Preview -->
              <div class="col-6">
                <div class="frame f3">
                  <img src="images/events.jpg" alt="Event session, May 17">
                  <span>Event, 05.17</span>
                </div>
              </div>
              <!-- Grid Item 4: Product Session Preview -->
              <div class="col-6">
                <div class="frame f4">
                  <img src="images/product.jpg" alt="Product session, May 19">
                  <span>Product, 05.19</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Contact sheet caption text -->
          <p class="sheet-caption">Confirmed bookings, this week — no two shoots on the same slot.</p>
        </div>

      </div>
    </div>
