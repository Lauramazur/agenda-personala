<?php
session_start();

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if (
    !isset($_SESSION['user']) &&
   !in_array($action, ['login', 'register', 'change_language', 'filter'])
) {
    header('Location: ../login.php');
    exit;
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

/* =========================
   REGISTER
========================= */
if ($action == 'register') {

    $nume = trim($_POST['nume'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $parola = $_POST['parola'] ?? '';
    $confirma = $_POST['confirma_parola'] ?? '';

    if (empty($nume) || empty($email) || empty($parola) || empty($confirma)) {
        header('Location: ../register.php?error=empty');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../register.php?error=email');
        exit;
    }

    if (strlen($parola) < 6) {
        header('Location: ../register.php?error=short');
        exit;
    }

    if ($parola !== $confirma) {
        header('Location: ../register.php?error=match');
        exit;
    }

    $usersFile = '../data/users.json';
    $users = json_decode(file_get_contents($usersFile), true);

    if (!is_array($users)) $users = [];

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            header('Location: ../register.php?error=exists');
            exit;
        }
    }

    $users[] = [
        'id' => uniqid(),
        'nume' => $nume,
        'email' => $email,
        'parola' => password_hash($parola, PASSWORD_DEFAULT),
        'dataInregistrare' => date('Y-m-d H:i:s')
    ];

    file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));

    header('Location: ../register.php?success=1');
    exit;
}

/* =========================
   LOGIN
========================= */
if ($action == 'login') {

    $email = trim($_POST['email'] ?? '');
    $parola = $_POST['parola'] ?? '';

    if (empty($email) || empty($parola)) {
        header('Location: ../login.php?error=empty');
        exit;
    }

    $users = json_decode(file_get_contents('../data/users.json'), true);
    if (!is_array($users)) $users = [];

    foreach ($users as $user) {
        if ($user['email'] == $email && password_verify($parola, $user['parola'])) {

            $_SESSION['user'] = [
                'id' => $user['id'],
                'nume' => $user['nume'],
                'email' => $user['email']
            ];

            header('Location: ../dashboard.php');
            exit;
        }
    }

    header('Location: ../login.php?error=invalid');
    exit;
}

/* =========================
   ADD EVENT
========================= */
if ($action == 'add_event') {

    $titlu = trim($_POST['titlu'] ?? '');
    $data = $_POST['data'] ?? '';
    $ora = $_POST['ora'] ?? '';
    $categorie = $_POST['categorie'] ?? '';
    $descriere = trim($_POST['descriere'] ?? '');

    if (empty($titlu) || empty($data) || empty($ora) || empty($categorie)) {
        header('Location: ../adauga_eveniment.php?error=empty');
        exit;
    }

    $file = '../data/items.json';
    $events = json_decode(file_get_contents($file), true);
    if (!is_array($events)) $events = [];

    $events[] = [
        'id' => uniqid(),
        'userId' => $_SESSION['user']['id'],
        'titlu' => $titlu,
        'data' => $data,
        'ora' => $ora,
        'categorie' => $categorie,
        'descriere' => $descriere
    ];

    file_put_contents($file, json_encode($events, JSON_PRETTY_PRINT));

    header('Location: ../dashboard.php?success=added');
    exit;
}

/* =========================
   EDIT EVENT
========================= */
if ($action == 'edit_event') {

    $id = $_POST['id'] ?? '';
    $titlu = trim($_POST['titlu'] ?? '');
    $data = $_POST['data'] ?? '';
    $ora = $_POST['ora'] ?? '';
    $categorie = $_POST['categorie'] ?? '';
    $descriere = trim($_POST['descriere'] ?? '');

    if (empty($id) || empty($titlu) || empty($data) || empty($ora) || empty($categorie)) {
        header('Location: ../edit_event.php?id=' . $id . '&error=empty');
        exit;
    }

    $file = '../data/items.json';
    $events = json_decode(file_get_contents($file), true);
    if (!is_array($events)) $events = [];

    foreach ($events as &$event) {
        if ($event['id'] == $id && $event['userId'] == $_SESSION['user']['id']) {
            $event['titlu'] = $titlu;
            $event['data'] = $data;
            $event['ora'] = $ora;
            $event['categorie'] = $categorie;
            $event['descriere'] = $descriere;
            break;
        }
    }

    file_put_contents($file, json_encode($events, JSON_PRETTY_PRINT));

    header('Location: ../dashboard.php?success=edited');
    exit;
}

/* =========================
   DELETE EVENT
========================= */
if ($action == 'delete') {

    $id = $_GET['id'] ?? $_POST['id'] ?? '';

    if (empty($id)) {
        header('Location: ../dashboard.php?error=delete');
        exit;
    }

    $file = '../data/items.json';
    $events = json_decode(file_get_contents($file), true);
    if (!is_array($events)) $events = [];

    $events = array_filter($events, function ($e) use ($id) {
        return $e['id'] != $id;
    });

    file_put_contents($file, json_encode(array_values($events), JSON_PRETTY_PRINT));

    header('Location: ../dashboard.php?success=deleted');
    exit;
}

/* =========================
   CONTACT
========================= */
if ($action == 'contact') {

    $nume = trim($_POST['nume'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mesaj = trim($_POST['mesaj'] ?? '');

    if (empty($nume) || empty($email) || empty($mesaj)) {
        header('Location: ../contact.php?error=empty');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../contact.php?error=email');
        exit;
    }

    $file = '../data/contact.json';

    if (!file_exists($file)) {
        file_put_contents($file, '[]');
    }

    $messages = json_decode(file_get_contents($file), true);
    if (!is_array($messages)) $messages = [];

    $messages[] = [
        'id' => uniqid(),
        'nume' => $nume,
        'email' => $email,
        'mesaj' => $mesaj,
        'data' => date('Y-m-d H:i:s')
    ];

    file_put_contents($file, json_encode($messages, JSON_PRETTY_PRINT));

    header('Location: ../contact.php?success=1');
    exit;
}