<?php if (!isset($_SESSION)) session_start(); ?>
<nav>
  <a class="logo" href="index.php">Planify</a>
  <div class="nav-right">
    <ul class="nav-links">
      <li><a href="index.php">Acasă</a></li>
      <li><a href="despre.php">Despre</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>

    <?php if (isset($_SESSION['user'])): ?>
      <a href="logout.php" class="btn-login">Deconectare</a>
    <?php else: ?>
      <a href="login.php" class="btn-login">Login/Register</a>
    <?php endif; ?>

    <div class="lang-selector">
      RO
      <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
        <path d="M3 4.5L6 7.5L9 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>

    <button class="icon-btn" aria-label="Dark mode">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
      </svg>
    </button>

    <?php if (isset($_SESSION['user'])): ?>
      <a href="profil.php" class="icon-btn" aria-label="Profil">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/>
          <circle cx="12" cy="8" r="3"/>
          <path d="M6.168 18.849A4 4 0 0 1 10 16h4a4 4 0 0 1 3.834 2.855"/>
        </svg>
      </a>
    <?php endif; ?>

  </div>
</nav>