<?php session_start(); 
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planify — Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
  <a class="logo" href="#">Planify</a>
    <div class="nav-right">
  <ul class="nav-links">
    <li><a href="index.php">Acasă</a></li>
    <li><a href="despre.php">Despre</a></li>
    <li><a href="contact.php">Contact</a></li>
  </ul>
  
    <a href="login.php" class="btn-login">Login/Register</a>
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
  </div>
</nav>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-error">
        <?php
            if ($_GET['error'] == 'empty') echo 'Completează toate câmpurile!';
            elseif ($_GET['error'] == 'invalid') echo 'Email sau parolă incorectă!';
        ?>
    </div>
<?php endif; ?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Bine ai revenit! 👋</h2>
        <p class="auth-subtitle">Autentifică-te în contul tău</p>

        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="login">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" 
                       placeholder="exemplu@email.com" required>
            </div>

            <div class="form-group">
                <label for="parola">Parolă</label>
                <input type="password" id="parola" name="parola" 
                       placeholder="Parola ta" required>
            </div>

            <button type="submit" class="btn-primary btn-full">
                Autentifică-te
            </button>

            <p class="auth-link">
                Nu ai cont? <a href="register.php">Înregistrează-te</a>
            </p>
        </form>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>