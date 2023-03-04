<?php
    if (isset($_POST['mail']) && isset($_POST['actualpassword'])) {
        $mail = $_POST['mail'];
        $actualpassword = $_POST['actualpassword'];
        $user = getOneUser($mail, $actualpassword);
        $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);

        if (isset($user['password']) && password_verify($actualpassword, $user['password']) && 
            isset($user['mail']) && $user['mail'] === $mail) {
            // Stockage des informations de l'utilisateur dans la variable session
            $_SESSION['username'] = $user['username'];
            $_SESSION['mail'] = $mail;
            $_SESSION['actualpassword'] = $actualpassword;
            $_SESSION['is_logged_in'] = true;

            // Connecté, redirection vers la page d'envoi de mail
            header('Location: http://localhost/le-chatelet/index.php?page=4');
            exit();
        } else {
            // Affichage du message d'erreur
            echo("<script>alert('Identifiant ou mot de passe incorrect')</script>");
        }
    }
?>
<div class="card d-flex mx-auto text-center w-25 h-25 mt-5">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Connexion</button>
            </li>
        </ul>
    </div>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="card-body">
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="mail" placeholder="name@example.com" required>
                        <label for="floatingInput">Adresse mail*</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="actualpassword" placeholder="P@ssw0rd" required>
                        <label for="floatingPassword">Mot de passe*</label>
                    </div>
                    <!-- <div class="form-floating">
                        <input type="password" class="form-control" id="newpassword" placeholder="P@ssw0rd2" required>
                        <label for="floatingPassword">Nouveau mot de passe*</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="confirmedpassword" placeholder="P@ssw0rd3" required>
                        <label for="floatingPassword">Confirmation du mot de passe*</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary btn-block mt-3">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>