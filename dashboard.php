<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}


$itemsFile = 'data/items.json';
$events = json_decode(file_get_contents($itemsFile), true);

$userId = $_SESSION['user']['id'];
$userEvents = array_filter($events, function($e) use ($userId) {
    return $e['userId'] == $userId;
});

$filterCategorie = $_GET['categorie'] ?? '';
$filterData = $_GET['data'] ?? '';

if (!empty($filterCategorie)) {
    $userEvents = array_filter($userEvents, function($e) use ($filterCategorie) {
        return $e['categorie'] == $filterCategorie;
    });
}

if (!empty($filterData)) {
    $userEvents = array_filter($userEvents, function($e) use ($filterData) {
        return $e['data'] == $filterData;
    });
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planify — Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="nav-logo">Planify</div>
    <ul class="nav-links">
        <li><a href="index.html">Acasă</a></li>
        <li><a href="despre.php">Despre</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
    <div class="nav-actions">
        <span class="user-greeting">Bună, <?php echo $_SESSION['user']['nume']; ?>! 👋</span>
        <a href="logout.php" class="btn-danger">Deconectare</a>
    </div>
</nav>

<div class="dashboard-header">
    <div>
        <h1>Evenimentele tale 📅</h1>
        <p>Gestionează și planifică activitățile tale</p>
    </div>
    <a href="adauga_eveniment.php" class="btn-primary">+ Adaugă eveniment</a>
</div>

<div class="filter-bar">
    <form method="GET" action="dashboard.php" class="filter-form">
        <span class="filter-label">Filtrează:</span>
        
        <a href="dashboard.php" 
           class="btn-filter <?php echo empty($filterCategorie) ? 'active' : ''; ?>">
           Toate
        </a>
        <a href="dashboard.php?categorie=Personal" 
           class="btn-filter <?php echo $filterCategorie == 'Personal' ? 'active' : ''; ?>">
           Personal
        </a>
        <a href="dashboard.php?categorie=Muncă" 
           class="btn-filter <?php echo $filterCategorie == 'Muncă' ? 'active' : ''; ?>">
           Muncă
        </a>
        <a href="dashboard.php?categorie=Școală" 
           class="btn-filter <?php echo $filterCategorie == 'Școală' ? 'active' : ''; ?>">
           Școală
        </a>
        <a href="dashboard.php?categorie=Altele" 
           class="btn-filter <?php echo $filterCategorie == 'Altele' ? 'active' : ''; ?>">
           Altele
        </a>

        <input type="date" name="data" value="<?php echo $filterData; ?>" 
               class="filter-date" onchange="this.form.submit()">
    </form>
</div>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        <?php
            if ($_GET['success'] == 'added') echo 'Eveniment adăugat cu succes!';
            elseif ($_GET['success'] == 'deleted') echo 'Eveniment șters cu succes!';
            elseif ($_GET['success'] == 'edited') echo 'Eveniment editat cu succes!';
        ?>
    </div>
<?php endif; ?>


<div class="events-grid">
    <?php if (empty($userEvents)): ?>
        <div class="no-events">
            <p>Nu ai niciun eveniment <?php echo !empty($filterCategorie) ? 'în categoria "'.$filterCategorie.'"' : ''; ?>.</p>
            <a href="adauga_eveniment.php" class="btn-primary">+ Adaugă primul eveniment</a>
        </div>
    <?php else: ?>
        <?php foreach ($userEvents as $event): ?>
            <div class="event-card category-<?php echo strtolower(str_replace('ă', 'a', $event['categorie'])); ?>">
                <div class="event-card-header">
                    <h3><?php echo htmlspecialchars($event['titlu']); ?></h3>
                    <div class="event-actions">
                        <a href="editeaza_eveniment.php?id=<?php echo $event['id']; ?>" 
                           class="btn-edit" title="Editează">✏️</a>
                        <a href="php/save_data.php?action=delete&id=<?php echo $event['id']; ?>" 
                           class="btn-delete" title="Șterge"
                           onclick="return confirm('Ești sigur că vrei să ștergi acest eveniment?')">🗑️</a>
                    </div>
                </div>
                <div class="event-info">
                    <span>📅 <?php echo $event['data']; ?></span>
                    <span>⏰ <?php echo $event['ora']; ?></span>
                </div>
                <span class="badge badge-<?php echo strtolower(str_replace('ă', 'a', $event['categorie'])); ?>">
                    <?php echo $event['categorie']; ?>
                </span>
                <p class="event-description">
                    <?php echo htmlspecialchars($event['descriere']); ?>
                </p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<footer class="footer">
    <p>© 2026 Planify. Toate drepturile rezervate.</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>