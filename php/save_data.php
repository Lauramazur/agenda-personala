<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

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

        
        foreach ($users as $user) {
            if ($user['email'] == $email) {
                header('Location: ../register.php?error=exists');
                exit;
            }
        }

        
        $newUser = [
            'id' => uniqid(),
            'nume' => $nume,
            'email' => $email,
            'parola' => password_hash($parola, PASSWORD_DEFAULT),
            'dataInregistrare' => date('Y-m-d H:i:s')
        ];

    
        $users[] = $newUser;
        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));

        header('Location: ../register.php?success=1');
        exit;
    }
    if ($action == 'login') {
        $email = trim($_POST['email'] ?? '');
        $parola = $_POST['parola'] ?? '';

        
        if (empty($email) || empty($parola)) {
            header('Location: ../login.php?error=empty');
            exit;
        }

    
        $usersFile = '../data/users.json';
        $users = json_decode(file_get_contents($usersFile), true);

    
        foreach ($users as $user) {
            if ($user['email'] == $email && 
                password_verify($parola, $user['parola'])) {
            
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

        $itemsFile = '../data/items.json';
        $events = json_decode(file_get_contents($itemsFile), true);

        $newEvent = [
            'id' => uniqid(),
            'userId' => $_SESSION['user']['id'],
            'titlu' => $titlu,
            'data' => $data,
            'ora' => $ora,
            'categorie' => $categorie,
            'descriere' => $descriere
        ];

        $events[] = $newEvent;
        file_put_contents($itemsFile, json_encode($events, JSON_PRETTY_PRINT));

        header('Location: ../dashboard.php?success=added');
        exit;
    }
    if ($action == 'delete') {
        $id = $_GET['id'] ?? '';

        $itemsFile = '../data/items.json';
        $events = json_decode(file_get_contents($itemsFile), true);

        $events = array_filter($events, function($e) use ($id) {
            return $e['id'] != $id;
        });

        file_put_contents($itemsFile, json_encode(array_values($events), JSON_PRETTY_PRINT));

        header('Location: ../dashboard.php?success=deleted');
        exit;
    }
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

    
        $contactFile = '../data/contact.json';
        
    
        if (!file_exists($contactFile)) {
            file_put_contents($contactFile, '[]');
        }

        $messages = json_decode(file_get_contents($contactFile), true);

        $newMessage = [
            'id' => uniqid(),
            'nume' => $nume,
            'email' => $email,
            'mesaj' => $mesaj,
            'data' => date('Y-m-d H:i:s')
        ];

        $messages[] = $newMessage;
        file_put_contents($contactFile, json_encode($messages, JSON_PRETTY_PRINT));

        header('Location: ../contact.php?success=1');
        exit;
    }
}
?>