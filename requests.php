<?php
    //On récupère toute la liste des utilisateurs
    function getUsers() : array {
        $users = array();
        try { 
            $conn = connexionPDO();
            $req = $conn->prepare("SELECT * FROM utilisateur");
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
            $conn = connexionPDO();
            $req = $conn->prepare("SELECT * FROM utilisateur WHERE mail=:mail AND password=:password");
            $req->bindParam(':mail', $mail);
            $req->bindParam(':password', $password);
            $req->execute();
            $user = $req->fetchAll()[0];
            return $user;
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
?>