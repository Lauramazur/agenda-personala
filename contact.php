<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planify — Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        Mesajul a fost trimis cu succes! Îți mulțumim! 😊
    </div>
<?php endif; ?>

<!-- HERO -->
<div class="contact-header">
    <h1>Contactează-ne</h1>
    <p>Suntem aici să te ajutăm</p>
</div>

<!-- SECTIUNEA PRINCIPALA -->
<div class="contact-wrapper">

    <!-- STANGA -->
    <div class="contact-info-box">
        <h3>Date de contact</h3>

        <div class="contact-info-item">
            <i class="fa-solid fa-location-dot"></i>
            <span>Chișinău, Moldova</span>
        </div>
        <div class="contact-info-item">
            <i class="fa-regular fa-envelope"></i>
            <span>planify@email.com</span>
        </div>
        <div class="contact-info-item">
            <i class="fa-solid fa-fax"></i>
            <span>+373 XX XXX XXX</span>
        </div>

        <a href="#" class="social-btn">
            <i class="fa-solid fa-earth-americas"></i>
            Urmărește-ne pe social media
        </a>
    </div>

    <!-- DREAPTA -->
    <div class="contact-form-box">
        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="contact">

            <div class="contact-field">
                <label>Nume complet:</label>
                <input type="text" name="nume" placeholder="Ion Popescu" required>
            </div>

            <div class="contact-field">
                <label>Email:</label>
                <input type="email" name="email" placeholder="exemplu@email.com" required>
            </div>

            <div class="contact-field">
                <label>Mesaj:</label>
                <input type="text" name="mesaj" placeholder="Scrie mesajul tău aici..." required>
            </div>

            <button type="submit" class="btn-contact">
                Trimite mesajul
            </button>
        </form>
    </div>

</div>

<footer>
    <strong>© 2026 Planify.</strong> Toate drepturile rezervate.
</footer>

<script src="js/script.js"></script>
</body>
</html>