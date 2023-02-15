<?php

//On récupère toute la liste des recettes
function getRecipes() : array {
    $recipes = array();
    try { 
        $conn = connexionPDO();
        $req = $conn->prepare("SELECT * FROM recipe");
        $req->execute();
        $recipes = $req->fetchAll();
        return $recipes;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//On récupère une recette dans la liste des recettes
function getOneRecipe() {
    try {
        if (isset($_GET['recipe'])){
            $id = $_GET['recipe'];
            $conn = connexionPDO();
            $req = $conn->prepare("SELECT * FROM recipe Where id=$id");
            $req->execute();
            $recipe = $req->fetchAll()[0]; //Mettre un fetch assoc
            return $recipe;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//On ajoute une nouvelle recette
function insertRecipe(string $nom, int $temps_preparation, int $temps_cuisson, int $niveau, string $categorie, string $preparation) {
    try { 
        $conn = connexionPDO();
        $req = $conn->prepare("INSERT INTO recipe(nom, temps_preparation, temps_cuisson, niveau, categorie, preparation) values (:nom, :temps_preparation, :temps_cuisson, :niveau, :categorie, :preparation)");
        $req->bindParam(':nom',$nom);
        $req->bindParam(':temps_preparation',$temps_preparation);
        $req->bindParam(':temps_cuisson',$temps_cuisson);
        $req->bindParam(':niveau',$niveau);
        $req->bindParam(':categorie',$categorie);
        $req->bindParam(':preparation',$preparation);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//On modifie une recette
function updateRecipe(int $id, string $nom, int $temps_preparation, int $temps_cuisson, int $niveau, string $categorie, string $preparation) {
    try { 
        $conn = connexionPDO();
        $req = $conn->prepare("UPDATE recipe SET nom = :nom, temps_preparation = :temps_preparation, temps_cuisson = :temps_cuisson, niveau = :niveau, categorie = :categorie, preparation = :preparation where id = :id");
        $req->bindParam(':id',$id);
        $req->bindParam(':nom',$nom);
        $req->bindParam(':temps_preparation',$temps_preparation);
        $req->bindParam(':temps_cuisson',$temps_cuisson);
        $req->bindParam(':niveau',$niveau);
        $req->bindParam(':categorie',$categorie);
        $req->bindParam(':preparation',$preparation);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

?>