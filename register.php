<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planify — Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'php/navbar.php'; ?>

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
        <h2 data-lang="register_title">Creează un cont nou 🎉</h2>
        <p class="auth-subtitle" data-lang="register_subtitle">Completează datele de mai jos</p>

        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="register">

            <div class="form-group">
                <label for="nume" data-lang="register_name">Nume complet</label>
                <input type="text" id="nume" name="nume" placeholder="Ion Popescu" required>
            </div>

            <div class="form-group">
                <label for="email" data-lang="register_email">Email</label>
                <input type="email" id="email" name="email" placeholder="exemplu@email.com" required>
            </div>

            <div class="form-group">
                <label for="parola" data-lang="register_password">Parolă</label>
                <input type="password" id="parola" name="parola" placeholder="Minimum 6 caractere" required>
            </div>

            <div class="form-group">
                <label for="confirma_parola" data-lang="register_confirm">Confirmă parola</label>
                <input type="password" id="confirma_parola" name="confirma_parola" placeholder="Repetă parola" required>
            </div>

            <button type="submit" class="btn-primary btn-full" data-lang="register_btn">Creează cont</button>

         <p class="auth-link">
    <span data-lang="register_login_link">Ai deja cont?</span>
    <a href="login.php" data-lang="register_login_btn">Autentifică-te</a>
</p>
        </form>
    </div>
</div>

<footer>
    <span data-lang="footer">© 2026 Planify. Toate drepturile rezervate.</span>
</footer>

<script src="js/script.js"></script>
</body>
</html>