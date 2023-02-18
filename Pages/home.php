<!DOCTYPE html>
<html>
    <div>
        <h1 class="mt-5 text-center">Bienvenue <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) echo(", vous êtes connecté !"); ?> !</h1>
    </div>
</html>
<?php
    session_start(); // Démarrage de la session
    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
        var_dump("not logged in !");
        // Utilisateur non connecté, redirection vers la page de connexion
        header('Location: http://localhost/le-chatelet/index.php?page=2');
        exit();
    }
?>