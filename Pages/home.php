<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
</head>

    <div>
        <h1 class="mt-5 text-center">Bienvenue !</h1>
        
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

</html>
<?php
    if(isset($_POST['mail'])) {
        echo('ok');
        $email = $_POST['mail'];
        $pwd = $_POST['actualpassword'];

        //var_dump($email);
        $user[] = getOneUser($email);
        $hash = $user[0]['password'];
        var_dump($hash, $pwd);
        //var_dump("*****" . $user[0]['password'], $pwd);
        var_dump(password_verify('a', '$2y$10$AQm6EoexBqSIzSK7FYgavO7J89XDzKOsiTL47e5Q0IvlCJdHJ3ePO'));
        //var_dump($user);
    }
    

    
    //var_dump($users);
?>


<!-- <div id="CO">
        <div class="cpt"><h2>Connectez-vous à votre compte</h2>
    </div>
<center>
    <div class="compte">
        <form  method="GET" style="border-radius: 20px;width:50%;display:flex;">
        <input type="hidden" name="pages" value=2 />
        <input type="hidden" name="connexion">
        <h2>CONNEXION</h2>
            <div>
                <label for="email">Email :</label>
                <input type="text" name="email" id="nom/email" required />
            </div>
            <div>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" required />
            </div>
            <div>
                <input type="submit" value="Connexion" name="connexion">
            </div>
        </form>
    </div>
</center> -->
        <?php
// include 'connexion-base.php';
if (isset($_GET['email']) && isset($_GET['mdp'])) {

    $email = $_GET['email'];
    $mdp = $_GET['mdp'];

    $requete = $pdo->prepare ("SELECT utilnom, utilprenom, utiladresse, utilcp, utilville, utiltel, utilmail from utilisateur where utilmail='$email' and utilmdp='$mdp'");

    if($requete->execute()){

        if (($requete->rowcount())==1) {
            $_SESSION['personne'] = $requete->fetch(PDO::FETCH_ASSOC);
            header("Status: 301 Moved Permanently", false, 301);
            header("Location: http://localhost/mangaland/Index.php?pages=4");
            exit();
        }else {
            echo "<script>alert('Compte inexistant | Veuiller vous inscrire!');</script>";
        }
    

    

    }else {
        echo "<script>alert('Erreur Vous n'avez pas peu vous connecté');</script>";

    }
}

?>
