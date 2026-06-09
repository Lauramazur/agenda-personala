<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Planify - Acasă</title>
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Reenie+Beanie&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php include 'php/navbar.php'; ?>

<section>
  <div class="hero">
    <div class="hero-text">
      <h1 class="hero-title" data-lang="hero_title">Organizează-ți timpul,<br>
        <span data-lang="hero_subtitle">trăiește mai bine.</span>
      </h1>
      <p data-lang="hero_desc">Planify îți permite să gestionezi evenimentele personale simplu, elegant și eficient.</p>
      <div class="hero-actions">
        <a href="register.php" class="btn-primary" data-lang="btn_start">Începe gratuit</a>
        <a href="despre.php" class="btn-outline" data-lang="btn_more">Află mai mult</a>
      </div>
    </div>

    <div class="hero-visual">
      <div class="event-card">
        <span class="event-icon purple"></span>
        <span data-lang="event1">Întâlnire echipa - 10:00</span>
      </div>
      <div class="event-card">
        <span class="event-icon green"></span>
        <span data-lang="event2">Proiect DAW - 14:30</span>
      </div>
      <div class="event-card">
        <span class="event-icon orange"></span>
        <span data-lang="event3">Examen PHP - 09:00</span>
      </div>
    </div>
  </div>
</section>

<section class="why-section">
  <h2 data-lang="why">De ce Planify?</h2>
  <div class="features-grid">

    <div class="feature-card">
      <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="4" width="18" height="18" rx="3"/>
        <line x1="16" y1="2" x2="16" y2="6"/>
        <line x1="8" y1="2" x2="8" y2="6"/>
        <line x1="3" y1="10" x2="21" y2="10"/>
      </svg>
      <h3 data-lang="card1_title">Organizat</h3>
      <p data-lang="card1_desc">Toate evenimentele tale într-un singur loc.</p>
    </div>

    <div class="feature-card">
      <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <rect x="5" y="11" width="14" height="10" rx="2"/>
        <path d="M8 11V7a4 4 0 0 1 8 0v4"/>
      </svg>
      <h3 data-lang="card2_title">Securizat</h3>
      <p data-lang="card2_desc">Contul tău protejat prin autentificare sigură.</p>
    </div>

    <div class="feature-card">
      <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="9"/>
        <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
      </svg>
      <h3 data-lang="card3_title">Multilingv</h3>
      <p data-lang="card3_desc">Disponibil în română, engleză și rusă.</p>
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