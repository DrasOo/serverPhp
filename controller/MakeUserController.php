<?php

require_once MODEL_PATH . '/UserModel.php';

if (isset($_POST['submit'])) {
    $user = new UserModel(
        0,
        $_POST['prenom'],
        $_POST['nom'],
        $_POST['region'] ?? null,
        $_POST['ville'] ?? null,
        $_POST['metier'] ?? null,
        !empty($_POST['naissance']) ? new DateTimeImmutable($_POST['naissance']) : null,
        $_POST['portable'] ?? null,
        isset($_POST['competences']) ? explode(',', $_POST['competences']) : [],
        $_POST['email']
    );

    // Enregistrer l'utilisateur dans la base de données
    $user->toArray();
}