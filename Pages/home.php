<?php
    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
        // Utilisateur non connecté, redirection vers la page de connexion
        header('Location: http://localhost/le-chatelet/index.php?page=2');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <div>
        <h1 class="mt-5 text-center">Bienvenue<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true) 
        { echo(" " . $_SESSION['username'] . ", vous êtes connecté "); } ?> !</h1>
    </div>
</html>