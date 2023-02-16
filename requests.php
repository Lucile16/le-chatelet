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
function getOneUser($mail) {
    try {
        $conn = connexionPDO();
        $req = $conn->prepare("SELECT * FROM utilisateur Where mail=:mail"); //and password
        $req->bindParam(':mail', $mail);
        $req->execute();
        $user = $req->fetchAll()[0];
        return $user;
        
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//On ajoute une nouvelle recette
// function insertRecipe(string $nom, int $temps_preparation, int $temps_cuisson, int $niveau, string $categorie, string $preparation) {
//     try { 
//         $conn = connexionPDO();
//         $req = $conn->prepare("INSERT INTO recipe(nom, temps_preparation, temps_cuisson, niveau, categorie, preparation) values (:nom, :temps_preparation, :temps_cuisson, :niveau, :categorie, :preparation)");
//         $req->bindParam(':nom',$nom);
//         $req->bindParam(':temps_preparation',$temps_preparation);
//         $req->bindParam(':temps_cuisson',$temps_cuisson);
//         $req->bindParam(':niveau',$niveau);
//         $req->bindParam(':categorie',$categorie);
//         $req->bindParam(':preparation',$preparation);
//         $req->execute();
//     } catch (PDOException $e) {
//         print "Erreur !: " . $e->getMessage();
//         die();
//     }
// }

// //On modifie une recette
// function updateRecipe(int $id, string $nom, int $temps_preparation, int $temps_cuisson, int $niveau, string $categorie, string $preparation) {
//     try { 
//         $conn = connexionPDO();
//         $req = $conn->prepare("UPDATE recipe SET nom = :nom, temps_preparation = :temps_preparation, temps_cuisson = :temps_cuisson, niveau = :niveau, categorie = :categorie, preparation = :preparation where id = :id");
//         $req->bindParam(':id',$id);
//         $req->bindParam(':nom',$nom);
//         $req->bindParam(':temps_preparation',$temps_preparation);
//         $req->bindParam(':temps_cuisson',$temps_cuisson);
//         $req->bindParam(':niveau',$niveau);
//         $req->bindParam(':categorie',$categorie);
//         $req->bindParam(':preparation',$preparation);
//         $req->execute();
//     } catch (PDOException $e) {
//         print "Erreur !: " . $e->getMessage();
//         die();
//     }
// }

?>