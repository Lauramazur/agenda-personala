<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'] ?? '';
$itemsFile = 'data/items.json';
$events = json_decode(file_get_contents($itemsFile), true);

$event = null;
foreach ($events as $e) {
    if ($e['id'] == $id && $e['userId'] == $_SESSION['user']['id']) {
        $event = $e;
        break;
    }
}

if (!$event) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planify — Editează Eveniment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'php/navbar.php'; ?>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-error">
        <?php
            if ($_GET['error'] == 'empty') echo 'Completează toate câmpurile obligatorii!';
        ?>
    </div>
<?php endif; ?>

<div class="page-header">
    <h1>Editează eveniment ✏️</h1>
    <p>Modifică detaliile evenimentului tău</p>
</div>

<div class="auth-container">
    <div class="auth-card">

        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="edit_event">
            <input type="hidden" name="id" value="<?php echo $event['id']; ?>">

            <div class="form-group">
                <label for="titlu">Titlul evenimentului *</label>
                <input type="text" id="titlu" name="titlu" 
                       value="<?php echo htmlspecialchars($event['titlu']); ?>"
                       placeholder="ex: Întâlnire echipă" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="data">Data *</label>
                    <input type="date" id="data" name="data" 
                           value="<?php echo $event['data']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="ora">Ora *</label>
                    <input type="time" id="ora" name="ora" 
                           value="<?php echo $event['ora']; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="categorie">Categorie *</label>
                <select id="categorie" name="categorie" required>
                    <option value="" disabled>Selectează categoria</option>
                    <option value="Personal" <?php echo $event['categorie'] == 'Personal' ? 'selected' : ''; ?>>Personal</option>
                    <option value="Muncă" <?php echo $event['categorie'] == 'Muncă' ? 'selected' : ''; ?>>Muncă</option>
                    <option value="Școală" <?php echo $event['categorie'] == 'Școală' ? 'selected' : ''; ?>>Școală</option>
                    <option value="Altele" <?php echo $event['categorie'] == 'Altele' ? 'selected' : ''; ?>>Altele</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea id="descriere" name="descriere" 
                          placeholder="Adaugă detalii despre eveniment..." 
                          rows="4"><?php echo htmlspecialchars($event['descriere']); ?></textarea>
            </div>

            <div class="form-row">
                <button type="submit" class="btn-primary btn-full">
                    Salvează modificările
                </button>
                <a href="dashboard.php" class="btn-outline btn-full">
                    Anulează
                </a>
            </div>

        </form>
    </div>
</div>

<footer class="footer">
    <p>© 2025 Planify. Toate drepturile rezervate.</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>