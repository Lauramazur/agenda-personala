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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reenie+Beanie&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'php/navbar.php'; ?>

<!-- DASHBOARD HEADER -->
<div class="dash-header">
    <div class="dash-header-left">
        <h1>Evenimentele tale 🗓️</h1>
        <p>Gestionează și planifică activitățile tale</p>
    </div>
    <a href="adauga_eveniment.php" class="btn-add">+ Adaugă eveniment</a>
</div>

<!-- FILTRE -->
<div class="dash-filter-bar">
    <span class="dash-filter-label">Filtrează:</span>
    <a href="dashboard.php" class="dash-filter-btn <?php echo empty($filterCategorie) && empty($filterData) ? 'active' : ''; ?>">Toate</a>
    <a href="dashboard.php?categorie=Personal" class="dash-filter-btn <?php echo $filterCategorie == 'Personal' ? 'active' : ''; ?>">Personal</a>
    <a href="dashboard.php?categorie=Muncă" class="dash-filter-btn <?php echo $filterCategorie == 'Muncă' ? 'active' : ''; ?>">Muncă</a>
    <a href="dashboard.php?categorie=Școală" class="dash-filter-btn <?php echo $filterCategorie == 'Școală' ? 'active' : ''; ?>">Școală</a>

    <form method="GET" action="dashboard.php" style="margin-left: auto;">
        <?php if (!empty($filterCategorie)): ?>
            <input type="hidden" name="categorie" value="<?php echo $filterCategorie; ?>">
        <?php endif; ?>
        <button type="submit" class="dash-filter-btn <?php echo !empty($filterData) ? 'active' : ''; ?>" onclick="document.getElementById('datepicker').style.display='block'">
            Filtrează dată
        </button>
        <input type="date" id="datepicker" name="data" value="<?php echo $filterData; ?>" onchange="this.form.submit()" style="display:none; position:absolute;">
    </form>
</div>

<!-- MESAJE -->
<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success" style="margin: 16px 40px;">
        <?php
            if ($_GET['success'] == 'added') echo 'Eveniment adăugat cu succes!';
            elseif ($_GET['success'] == 'deleted') echo 'Eveniment șters cu succes!';
            elseif ($_GET['success'] == 'edited') echo 'Eveniment editat cu succes!';
        ?>
    </div>
<?php endif; ?>

<!-- GRID EVENIMENTE -->
<div class="dash-events-grid">
    <?php if (empty($userEvents)): ?>
        <div class="no-events">
            <p>Nu ai niciun eveniment <?php echo !empty($filterCategorie) ? 'în categoria "'.$filterCategorie.'"' : ''; ?>.</p>
            <a href="adauga_eveniment.php" class="btn-add">+ Adaugă primul eveniment</a>
        </div>
    <?php else: ?>
        <?php foreach ($userEvents as $event): ?>
        <div class="dash-event-card">
            <div class="dash-card-top">
                <h3><?php echo htmlspecialchars($event['titlu']); ?></h3>
                <a href="editeaza_eveniment.php?id=<?php echo $event['id']; ?>" class="dash-edit-btn">✏️</a>
            </div>
            <div class="dash-card-info">
                <span>🗓️ <?php echo date('d M Y', strtotime($event['data'])); ?></span>
                <span>⏰ <?php echo $event['ora']; ?></span>
            </div>
            <div class="dash-card-bottom">
                <span class="dash-badge dash-badge-<?php echo strtolower(str_replace('ă', 'a', $event['categorie'])); ?>">
                    <?php echo $event['categorie']; ?>
                </span>
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <p class="dash-description"><?php echo htmlspecialchars($event['descriere']); ?></p>
                    <a href="php/save_data.php?action=delete&id=<?php echo $event['id']; ?>"
                       class="dash-delete-btn"
                       onclick="return confirm('Ești sigur că vrei să ștergi acest eveniment?')">🗑️</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<footer>
    <strong>© 2026 Planify.</strong> Toate drepturile rezervate.
</footer>

<script src="js/script.js"></script>
</body>
</html>