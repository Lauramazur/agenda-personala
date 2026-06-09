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
    <h1 data-lang="add_title">Adaugă eveniment nou 📅</h1>
    <p data-lang="add_subtitle">Completează detaliile evenimentului tău</p>
</div>

<div class="auth-container">
    <div class="auth-card">
        <form action="php/save_data.php" method="POST">
            <input type="hidden" name="action" value="add_event">

           <div class="form-group">
    <label for="titlu" data-lang="add_event_title">Titlul evenimentului *</label>
    <input type="text" id="titlu" name="titlu"
           data-placeholder="add_placeholder_title"
           placeholder="ex: Întâlnire echipă" required>
</div>

            <div class="form-row">
                <div class="form-group">
                    <label for="data" data-lang="add_date">Data *</label>
                    <input type="date" id="data" name="data" required>
                </div>
                <div class="form-group">
                    <label for="ora" data-lang="add_time">Ora *</label>
                    <input type="time" id="ora" name="ora" required>
                </div>
            </div>

            <div class="form-group">
                <label for="categorie" data-lang="add_category">Categorie *</label>
                <select id="categorie" name="categorie" required>
                    <option value="" disabled selected data-lang="add_select">Selectează categoria</option>
                    <option value="Personal" data-lang="dash_personal">Personal</option>
                    <option value="Muncă" data-lang="dash_munca">Muncă</option>
                    <option value="Școală" data-lang="dash_scoala">Școală</option>
                    <option value="Altele" data-lang="add_other">Altele</option>
                </select>
            </div>

         <div class="form-group">
    <label for="descriere" data-lang="add_description">Descriere</label>
    <textarea id="descriere" name="descriere"
              data-placeholder="add_placeholder_desc"
              placeholder="Adaugă detalii despre eveniment..."
              rows="4"></textarea>
</div>

            <div class="form-row">
                <button type="submit" class="btn-primary btn-full" data-lang="add_save">
                    Salvează evenimentul
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