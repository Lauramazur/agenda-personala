<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$usersFile = 'data/users.json';
$users = json_decode(file_get_contents($usersFile), true);

$currentUser = null;
foreach ($users as $user) {
    if ($user['id'] == $_SESSION['user']['id']) {
        $currentUser = $user;
        break;
    }
}

$itemsFile = 'data/items.json';
$events = json_decode(file_get_contents($itemsFile), true);
$userEvents = array_filter($events, function($e) {
    return $e['userId'] == $_SESSION['user']['id'];
});
$totalEvents = count($userEvents);
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Planify - Profilul meu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<nav>
  <a class="logo" href="index.html">Planify</a>
  <div class="nav-right">
    <ul class="nav-links">
      <li><a href="index.html">Acasă</a></li>
      <li><a href="despre.php">Despre</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
    <span class="user-greeting">Bună, <?php echo $_SESSION['user']['nume']; ?>! 👋</span>
    <a href="logout.php" class="btn-login">Deconectare</a>
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

<div class="page-header">
  <h1>Profilul meu 👤</h1>
  <p>Datele contului tău Planify</p>
</div>

<section class="profile-section">

  <div class="profile-card">
    <div class="profile-avatar">
      <?php echo strtoupper(substr($currentUser['nume'], 0, 1)); ?>
    </div>
    <h2><?php echo htmlspecialchars($currentUser['nume']); ?></h2>
    <p class="profile-email"><?php echo htmlspecialchars($currentUser['email']); ?></p>

    <div class="profile-info">
      <div class="profile-info-item">
        <span class="profile-info-label">Nume complet</span>
        <span class="profile-info-value"><?php echo htmlspecialchars($currentUser['nume']); ?></span>
      </div>
      <div class="profile-info-item">
        <span class="profile-info-label">Email</span>
        <span class="profile-info-value"><?php echo htmlspecialchars($currentUser['email']); ?></span>
      </div>
      <div class="profile-info-item">
        <span class="profile-info-label">Data înregistrării</span>
        <span class="profile-info-value"><?php echo $currentUser['dataInregistrare']; ?></span>
      </div>
      <div class="profile-info-item">
        <span class="profile-info-label">Total evenimente</span>
        <span class="profile-info-value"><?php echo $totalEvents; ?> evenimente</span>
      </div>
    </div>

    <a href="dashboard.php" class="btn-primary" style="margin-top: 24px; display: inline-block;">
      Vezi evenimentele mele
    </a>
  </div>

</section>

<footer>
  <strong>© 2026 Planify.</strong> Toate drepturile rezervate.
</footer>

</body>
</html>