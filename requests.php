<?php
    //On récupère toute la liste des utilisateurs
    function getUsers() : array {
        $users = array();
        try { 
            $conn = connexionPDO();
            $req = $conn->prepare("SELECT * FROM user");
            $req->execute();
            $users = $req->fetchAll();
            //var_dump($users);
            return $users;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    //On récupère un utilisateur
    function getOneUser($mail, $password) {
        try {
            $result = null;
            $conn = connexionPDO();
            $req = $conn->prepare("SELECT * FROM user WHERE mail=:mail AND password=:password");
            $req->bindParam(':mail', $mail);
            $req->bindParam(':password', $password);
            $req->execute();
            $user = $req->fetchAll();
            if (count($user) !== 0) {
                $result = $user[0];
            }
            return $result;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    //On modifie un utilisateur pour ajouter sa localisation
    function updateUserLocation(int $id, string $location) {
        try { 
            $conn = connexionPDO();
            $req = $conn->prepare("UPDATE user SET location = :location WHERE id = :id");
            $req->bindParam(':id',$id);
            $req->bindParam(':location',$location);
            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    //On modifie un utilisateur pour ajouter sa localisation
    function updateUserBrowser(int $id, string $browser) {
        try { 
            $conn = connexionPDO();
            $req = $conn->prepare("UPDATE user SET browser = :browser WHERE id = :id");
            $req->bindParam(':id',$id);
            $req->bindParam(':browser',$browser);
            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
?>