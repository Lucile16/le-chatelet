<?php
    function connexionPDO() : PDO {
        try {
            $conn = new PDO(
                "mysql:host=localhost;dbname=chatelet;charset=utf8","root","",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
            return $conn;
        }
        catch (Exception $e) {
            print('Erreur de connexion PDO' . $e->getMessage());
            die();
        }
    }
?>