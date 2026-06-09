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
    <h1 data-lang="despre_title">Despre Planify</h1>
    <p data-lang="despre_subtitle">O aplicație creată pentru oameni organizați</p>
</div>

    <section class="about-section">

        <div class="about-text">
            <h2 data-lang="ce_este_title">Ce este Planify?</h2>

            <p data-lang="ce_este_desc">
                Planify este o aplicație web modernă destinată organizării
                evenimentelor personale. Fie că este vorba de întâlniri,
                termene limită sau activități personale, Planify îți oferă
                un spațiu centralizat și elegant pentru a le gestiona eficient.
            </p>
        </div>

        <div class="benefits-card">

            <div class="benefit">
                <span class="check">✓</span>
                <p data-lang="benefit1">Interfață modernă și intuitivă</p>
            </div>

            <div class="benefit">
                <span class="check">✓</span>
                <p data-lang="benefit2">Gestionare completă a evenimentelor</p>
            </div>

            <div class="benefit">
                <span class="check">✓</span>
                <p data-lang="benefit3">Disponibil în 3 limbi</p>
            </div>

        </div>

    </section>
<section class="technologies">

    <h2 data-lang="tech_title">Tehnologii folosite</h2>

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
  <span data-lang="footer">
      © 2026 Planify. Toate drepturile rezervate.
  </span>
</footer>
<script src="js/script.js"></script>
</body>
</html>