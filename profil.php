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

<?php include 'php/navbar.php'; ?>

<div class="page-header">
  <h1 data-lang="profile_title">Profilul meu 👤</h1>
  <p data-lang="profile_subtitle">Datele contului tău Planify</p>
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
        <span class="profile-info-label" data-lang="profile_name">Nume complet</span>
        <span class="profile-info-value"><?php echo htmlspecialchars($currentUser['nume']); ?></span>
      </div>
      <div class="profile-info-item">
        <span class="profile-info-label" data-lang="profile_email">Email</span>
        <span class="profile-info-value"><?php echo htmlspecialchars($currentUser['email']); ?></span>
      </div>
      <div class="profile-info-item">
        <span class="profile-info-label" data-lang="profile_date">Data înregistrării</span>
        <span class="profile-info-value"><?php echo $currentUser['dataInregistrare']; ?></span>
      </div>
      <div class="profile-info-item">
        <span class="profile-info-label" data-lang="profile_events">Total evenimente</span>
        <span class="profile-info-value"><?php echo $totalEvents; ?> <span data-lang="profile_events_count">evenimente</span></span>
      </div>
    </div>

    <a href="dashboard.php" class="btn-primary" style="margin-top: 24px; display: inline-block;" data-lang="profile_btn">
      Vezi evenimentele mele
    </a>
  </div>
</section>

<footer>
  <span data-lang="footer">© 2026 Planify. Toate drepturile rezervate.</span>
</footer>

<script src="js/script.js"></script>
</body>
</html>