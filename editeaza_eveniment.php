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
            if ($_GET['error'] == 'empty') echo 'Completează toate câmpurile obligatorii!';
        ?>
    </div>
<?php endif; ?>

<div class="page-header">
    <h1 data-lang="edit_title">Editează eveniment ✏️</h1>
    <p data-lang="edit_subtitle">Modifică detaliile evenimentului tău</p>
</div>

<div class="auth-container">
    <div class="auth-card">
        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="edit_event">
            <input type="hidden" name="id" value="<?php echo $event['id']; ?>">

            <div class="form-group">
                <label for="titlu" data-lang="add_event_title">Titlul evenimentului *</label>
                <input type="text" id="titlu" name="titlu"
                       value="<?php echo htmlspecialchars($event['titlu']); ?>"
                       data-placeholder="add_placeholder_title"
                       placeholder="ex: Întâlnire echipă" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="data" data-lang="add_date">Data *</label>
                    <input type="date" id="data" name="data"
                           value="<?php echo $event['data']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="ora" data-lang="add_time">Ora *</label>
                    <input type="time" id="ora" name="ora"
                           value="<?php echo $event['ora']; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="categorie" data-lang="add_category">Categorie *</label>
                <select id="categorie" name="categorie" required>
                    <option value="" disabled data-lang="add_select">Selectează categoria</option>
                    <option value="Personal" <?php echo $event['categorie'] == 'Personal' ? 'selected' : ''; ?> data-lang="dash_personal">Personal</option>
                    <option value="Muncă" <?php echo $event['categorie'] == 'Muncă' ? 'selected' : ''; ?> data-lang="dash_munca">Muncă</option>
                    <option value="Școală" <?php echo $event['categorie'] == 'Școală' ? 'selected' : ''; ?> data-lang="dash_scoala">Școală</option>
                    <option value="Altele" <?php echo $event['categorie'] == 'Altele' ? 'selected' : ''; ?> data-lang="add_other">Altele</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descriere" data-lang="add_description">Descriere</label>
                <textarea id="descriere" name="descriere"
                          data-placeholder="add_placeholder_desc"
                          placeholder="Adaugă detalii despre eveniment..."
                          rows="4"><?php echo htmlspecialchars($event['descriere']); ?></textarea>
            </div>

            <div class="form-row">
                <button type="submit" class="btn-primary btn-full" data-lang="edit_save">
                    Salvează modificările
                </button>
                <a href="dashboard.php" class="btn-outline btn-full" data-lang="add_cancel">
                    Anulează
                </a>
            </div>
        </form>
    </div>
</div>

<footer>
    <span data-lang="footer">© 2026 Planify. Toate drepturile rezervate.</span>
</footer>

<script src="js/script.js"></script>
</body>
</html>