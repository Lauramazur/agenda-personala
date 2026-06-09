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

<div class="contact-header">
    <h1 data-lang="contact_title">Contactează-ne</h1>
    <p data-lang="contact_subtitle">Suntem aici să te ajutăm</p>
</div>

<!-- SECTIUNEA PRINCIPALA -->
<div class="contact-wrapper">

    <!-- STANGA -->
    <div class="contact-info-box">
        <h3 data-lang="contact_info_title">Date de contact</h3>

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
            <span data-lang="contact_social">Urmărește-ne pe social media</span>
        </a>
    </div>

    <div class="contact-form-box">
        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="contact">

            <div class="contact-field">
    <label data-lang="contact_name">Nume complet:</label>
    <input type="text" name="nume" 
           data-placeholder="contact_placeholder_name"
           placeholder="Ion Popescu" required>
</div>

<div class="contact-field">
    <label data-lang="contact_email">Email:</label>
    <input type="email" name="email" 
           data-placeholder="contact_placeholder_email"
           placeholder="exemplu@email.com" required>
</div>

<div class="contact-field">
    <label data-lang="contact_message">Mesaj:</label>
    <input type="text" name="mesaj" 
           data-placeholder="contact_placeholder_message"
           placeholder="Scrie mesajul tău aici..." required>
</div>

            <button type="submit" class="btn-contact" data-lang="contact_send">
                Trimite mesajul
            </button>
        </form>
    </div>

</div>

<footer>
  <span data-lang="footer">
      © 2026 Planify. Toate drepturile rezervate.
  </span>
</footer>

<script src="js/script.js"></script>
</body>
</html>