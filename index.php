<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blood Bank Management System</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- Navigation Bar -->
    <header>
      <nav class="navbar">
        <div class="logo">
          <img src="logo.jpeg" alt="Blood Bank Logo" />
        </div>
        <ul class="nav-links">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#why-choose-us">Why Choose Us</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="login-link">
          <a href="login.php">Login</a>
        </div>
      </nav>
    </header>
    <div class="background-slideshow"></div>
    <!-- Sidebar Navigation -->
    <div class="sidebar" id="sidebar">
      <div class="logo">
        <h2>Dashboard</h2>
      </div>
      <ul class="sidebar-links">
        <li><a href="index.php">🏠 Home</a></li>
        <li><a href="donor.php">🩸 Donor Management</a></li>
        <li><a href="recipient.php">🧑‍🤝‍🧑 Recipient Management</a></li>
        <li><a href="contact.php">📞 Contact Us</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Menu Toggle Button -->
      <button class="menu-btn" onclick="toggleMenu()">☰ MENU</button>

      <!-- Hero Section -->
      <!-- <section id="home" class="hero">
        <h1>Welcome to the Blood Bank Management System</h1>
        <p>
          Efficiently managing blood donations and distributions to save lives.
        </p>
        <a href="#about" class="cta-button">Learn More</a>
      </section> -->
<!-- Hero Section -->
<section id="home" class="hero">
        <div class="hero-content">
          <h4>Donate blood, save life!</h4>
          <h1>YOUR BLOOD CAN BRING SMILE IN OTHER PERSON FACE</h1>
          <div class="cta-buttons">
            <a href="#donate" class="cta-button">DONATE NOW</a>
            <a href="tel:+411009872333" class="call-now">CALL: 411-009-872-333</a>
          </div>
        </div>
      </section>
      <!-- About Section -->
      <section id="about" class="about">
        <h2>About Us</h2>
        <p>
          The Blood Bank Management System is a comprehensive platform designed
          to manage blood donations, donor records, blood inventory, and
          recipient matching. Our mission is to streamline the process of blood
          collection, storage, and distribution to save lives and make the
          system transparent.
        </p>
      </section>
      <!-- Why Choose Us Section -->
      <section id="why-choose-us" class="why-choose-us">
        <h2>Why Choose Us?</h2>
        <div class="features">
          <div class="feature">
            <h3>🔒 Secure</h3>
            <p>
              We ensure your data is safe and protected with advanced security
              protocols.
            </p>
          </div>
          <div class="feature">
            <h3>📊 Transparent</h3>
            <p>
              Access real-time blood inventory levels and recipient matching
              information.
            </p>
          </div>
          <div class="feature">
            <h3>🌍 Accessible</h3>
            <p>Our system is available anytime, anywhere with 24/7 support.</p>
          </div>
        </div>
      </section>

      <!-- Statistics Section -->
      <section id="stats" class="stats">
        <h2>Our Impact</h2>
        <div class="stats-cards">
          <div class="stat-card">
            <h3>30+</h3>
            <p>Registered Donors</p>
          </div>
          <div class="stat-card">
            <h3>30+</h3>
            <p>Happy Recipients</p>
          </div>
          <div class="stat-card">
            <h3>2,500+</h3>
            <p>Blood Units (ml) Collected</p>
          </div>
        </div>
      </section>

      <!-- Testimonials Section -->
      <section id="testimonials" class="testimonials">
        <h2>What People Say</h2>
        <div class="testimonial">
          <p>
            "This platform made it so easy to find donors when we needed blood
            urgently. A real lifesaver!"
          </p>
          <h4>- Jane Doe</h4>
        </div>
        <div class="testimonial">
          <p>
            "Managing our hospital's blood inventory has never been easier.
            Highly recommended!"
          </p>
          <h4>- Dr. John Smith</h4>
        </div>
      </section>

      <!-- Contact Section -->
      <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <p>For inquiries or support, reach out to us at:</p>
        <p>Email: support@bloodbank.com</p>
        <p>Phone: +123 456 7890</p>
      </section>
    </div>

    <!-- Footer -->
    <footer>
      <p>&copy; 2024 Blood Bank Management System. All rights reserved.</p>
      <p>
        <a href="#home">Home</a> | <a href="#about">About</a> |
        <a href="#contact">Contact</a>
      </p>
    </footer>

    <!-- JavaScript -->
    <script>
      function toggleMenu() {
          const sidebar = document.getElementById('sidebar');
          if (sidebar.style.right === "0px") {
              sidebar.style.right = "-250px";
          } else {
              sidebar.style.right = "0px";
          }
      }
    </script>
  </body>
</html>
