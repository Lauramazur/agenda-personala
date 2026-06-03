<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Planify - Despre</title>
  <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php include 'php/navbar.php'; ?>

<div class="about-header">
    <h1>Despre Planify</h1>
    <p>O aplicație creată pentru oameni organizați</p>
</div>

    <section class="about-section">

        <div class="about-text">
            <h2>Ce este Planify?</h2>

            <p>
                Planify este o aplicație web modernă destinată organizării
                evenimentelor personale. Fie că este vorba de întâlniri,
                termene limită sau activități personale, Planify îți oferă
                un spațiu centralizat și elegant pentru a le gestiona eficient.
            </p>
        </div>

        <div class="benefits-card">

            <div class="benefit">
                <span class="check">✓</span>
                <p>Interfață modernă și intuitivă</p>
            </div>

            <div class="benefit">
                <span class="check">✓</span>
                <p>Gestionare completă a evenimentelor</p>
            </div>

            <div class="benefit">
                <span class="check">✓</span>
                <p>Disponibil în 3 limbi</p>
            </div>

        </div>

    </section>
<section class="technologies">

    <h2>Tehnologii folosite</h2>

    <div class="tech-grid">

        <div class="tech-card purple">
            <i class="fa-brands fa-php"></i>
            PHP
        </div>

        <div class="tech-card blue">
            <i class="fa-brands fa-css3-alt"></i>
            CSS
        </div>
<div class="tech-card green">
    <i class="fa-brands fa-square-js"></i>
    JS
</div>

        <div class="tech-card orange">
            <i class="fa-solid fa-database"></i>
            JSON
        </div>

    </div>

</section>
<footer>
  <strong>© 2026 Planify.</strong> Toate drepturile rezervate.
</footer>

</body>
</html>