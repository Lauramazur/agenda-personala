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
            elseif ($_GET['error'] == 'invalid') echo 'Email sau parolă incorectă!';
        ?>
    </div>
<?php endif; ?>

<div class="auth-container">
    <div class="auth-card">
        <h2 data-lang="login_title">Bine ai revenit! 👋</h2>
        <p class="auth-subtitle" data-lang="login_subtitle">Autentifică-te în contul tău</p>

        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="login">

            <div class="form-group">
                <label for="email" data-lang="login_email">Email</label>
                <input type="email" id="email" name="email"
                       placeholder="exemplu@email.com" required>
            </div>

            <div class="form-group">
                <label for="parola" data-lang="login_password">Parolă</label>
                <input type="password" id="parola" name="parola"
                       placeholder="Parola ta" required>
            </div>

            <button type="submit" class="btn-primary btn-full" data-lang="login_btn">
                Autentifică-te
            </button>

           <p class="auth-link">
    <span data-lang="login_register_link">Nu ai cont?</span>
    <a href="register.php" data-lang="login_register_btn">Înregistrează-te</a>
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