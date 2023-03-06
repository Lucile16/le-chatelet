<?php
    // Vérifier si le nombre de tentatives est défini dans la session
    if (!isset($_SESSION['login_attempts'])) {
        // Si non, initialiser à 0
        $_SESSION['login_attempts'] = 0;
    }

    if (isset($_POST['mail']) && isset($_POST['actualpassword'])) {
        $mail = $_POST['mail'];
        $actualpassword = $_POST['actualpassword'];
        $user = getOneUser($mail, $actualpassword);
        if(isset($user['password'])) {
            $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);
        }

        if (isset($user['password']) && password_verify($actualpassword, $user['password']) && 
            isset($user['mail']) && $user['mail'] === $mail) {
            // Stockage des informations de l'utilisateur dans la variable session
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['mail'] = $mail;
            $_SESSION['actualpassword'] = $actualpassword;
            $_SESSION['is_logged_in'] = true;

            // Connecté, redirection vers la page d'envoi de mail
            header('Location: http://localhost/le-chatelet/index.php?page=4');
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
                    Identifiant ou mot de passe incorrect !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div></div>');
            }
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