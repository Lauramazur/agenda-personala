<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planify — Adaugă Eveniment</title>
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
    <h1>Adaugă eveniment nou 📅</h1>
    <p>Completează detaliile evenimentului tău</p>
</div>

<div class="auth-container">
    <div class="auth-card">

        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="add_event">

            <div class="form-group">
                <label for="titlu">Titlul evenimentului *</label>
                <input type="text" id="titlu" name="titlu" 
                       placeholder="ex: Întâlnire echipă" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="data">Data *</label>
                    <input type="date" id="data" name="data" required>
                </div>
                <div class="form-group">
                    <label for="ora">Ora *</label>
                    <input type="time" id="ora" name="ora" required>
                </div>
            </div>

            <div class="form-group">
                <label for="categorie">Categorie *</label>
                <select id="categorie" name="categorie" required>
                    <option value="" disabled selected>Selectează categoria</option>
                    <option value="Personal">Personal</option>
                    <option value="Muncă">Muncă</option>
                    <option value="Școală">Școală</option>
                    <option value="Altele">Altele</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea id="descriere" name="descriere" 
                          placeholder="Adaugă detalii despre eveniment..." 
                          rows="4"></textarea>
            </div>

            <div class="form-row">
                <button type="submit" class="btn-primary btn-full">
                    Salvează evenimentul
                </button>
                <a href="dashboard.php" class="btn-outline btn-full">
                    Anulează
                </a>
            </div>

        </form>
    </div>
</div>

<footer class="footer">
    <p>© 2026 Planify. Toate drepturile rezervate.</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>