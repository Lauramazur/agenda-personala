<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planify — Register</title>
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
  </div>
</nav>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-error">
        <?php
            if ($_GET['error'] == 'empty') echo 'Completează toate câmpurile!';
            elseif ($_GET['error'] == 'email') echo 'Adresa de email nu este validă!';
            elseif ($_GET['error'] == 'short') echo 'Parola trebuie să aibă minim 6 caractere!';
            elseif ($_GET['error'] == 'match') echo 'Parolele nu coincid!';
            elseif ($_GET['error'] == 'exists') echo 'Există deja un cont cu acest email!';
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        Contul a fost creat cu succes! <a href="login.php">Autentifică-te</a>
    </div>
<?php endif; ?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Creează un cont nou 🎉</h2>
        <p class="auth-subtitle">Completează datele de mai jos</p>

        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="register">

            <div class="form-group">
                <label for="nume">Nume complet</label>
                <input type="text" id="nume" name="nume" placeholder="Ion Popescu" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="exemplu@email.com" required>
            </div>

            <div class="form-group">
                <label for="parola">Parolă</label>
                <input type="password" id="parola" name="parola" placeholder="Minimum 6 caractere" required>
            </div>

            <div class="form-group">
                <label for="confirma_parola">Confirmă parola</label>
                <input type="password" id="confirma_parola" name="confirma_parola" placeholder="Repetă parola" required>
            </div>

            <button type="submit" class="btn-primary btn-full">Creează cont</button>

            <p class="auth-link">Ai deja cont? <a href="login.php">Autentifică-te</a></p>
        </form>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>