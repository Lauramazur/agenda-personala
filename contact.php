<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planify — Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
  <a class="logo" href="#">Planify</a>
    <div class="nav-right">
  <ul class="nav-links">
    <li><a href="#">Acasă</a></li>
    <li><a href="#">Despre</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
    <a href="#" class="btn-login">Login/Register</a>
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
    <div class="nav-actions">
        <?php if (isset($_SESSION['user'])): ?>
            <span class="user-greeting">Bună, <?php echo $_SESSION['user']['nume']; ?>! 👋</span>
            <a href="logout.php" class="btn-danger">Deconectare</a>
        <?php else: ?>
            <a href="login.php" class="btn-outline">Login</a>
            <a href="register.php" class="btn-primary">Register</a>
        <?php endif; ?>
    </div>
    </div>
</nav>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-error">
        <?php
            if ($_GET['error'] == 'empty') echo 'Completează toate câmpurile!';
            elseif ($_GET['error'] == 'email') echo 'Adresa de email nu este validă!';
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        Mesajul a fost trimis cu succes! Îți mulțumim! 😊
    </div>
<?php endif; ?>

<div class="page-header">
    <h1>Contactează-ne 📬</h1>
    <p>Suntem aici să te ajutăm</p>
</div>

<div class="contact-container">

    <div class="contact-info">
        <h3>Date de contact</h3>
        <p>📍 Chișinău, Moldova</p>
        <p>✉️ planify@email.com</p>
        <p>📞 +373 XX XXX XXX</p>
    </div>

    <div class="auth-card">
        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="contact">

            <div class="form-group">
                <label for="nume">Nume complet *</label>
                <input type="text" id="nume" name="nume" 
                       placeholder="Ion Popescu" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" 
                       placeholder="exemplu@email.com" required>
            </div>

            <div class="form-group">
                <label for="mesaj">Mesaj *</label>
                <textarea id="mesaj" name="mesaj" rows="5" 
                          placeholder="Scrie mesajul tău aici..." 
                          required></textarea>
            </div>

            <button type="submit" class="btn-primary btn-full">
                Trimite mesajul
            </button>
        </form>
    </div>

</div>

<footer class="footer">
    <p>© 2026 Planify. Toate drepturile rezervate.</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>