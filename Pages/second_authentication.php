<?php
    // Vérifier si le nombre de tentatives est défini dans la session
    if (!isset($_SESSION['login_attempts'])) {
        // Si non, initialiser à 0
        $_SESSION['login_attempts'] = 0;
    }

    if (isset($_SESSION['code']) && isset($_POST['code'])) {
        if ($_SESSION['code'] == $_POST['code']) {
            // Connecté, redirection vers la page d'accueil
            header('Location: http://localhost/le-chatelet/index.php?page=0');
            exit();
        } else {
            $_SESSION['login_attempts']++;
            // Vérifier si le nombre de tentatives a dépassé la limite
            if ($_SESSION['login_attempts'] >= 3) {
                echo('<div class="container"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Vous avez dépassé la limite de tentatives de connexion ! Vous devez patienter avant de réessayer...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div></div>');
                // Afficher le message d'erreur avant la pause
                ob_flush();
                flush();
                // Bloquer pendant 10 secondes
                sleep(20);
                $_SESSION['login_attempts'] = 0;
            } else {
                echo('<div class="container"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Code incorrect !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div></div>');
            }
        }
    }
?>
<div class="container">
    <div class="alert alert-success alert-dismissible fade show" id="envoi_mail" role="alert">
        Un e-mail vient de vous être envoyé !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <form method="POST">
        <div class="form-floating">
            <input type="text" class="form-control w-25" name="code" placeholder="code" pattern="\d{6}" title="Entrez un code à 6 chiffres" required>
            <label for="floatingPassword">Code*</label>
            <span class="validity"></span>
        </div>
        <button type="submit" class="btn btn-success btn-block mt-3">Confirmer le code</button>
    </form>
</div>
<script>
  // Récupérez l'élément d'alerte
  var alert = document.getElementById("envoi_mail");

  // Supprimer la classe "show" après 10 secondes
  setTimeout(function() {
    alert.classList.remove("show");
  }, 10000);
</script>