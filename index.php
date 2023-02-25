<!DOCTYPE html>
<html>
    <body class="d-flex flex-column min-vh-100">
    <?php
        include_once('connexion_db.php');
        include_once('requests.php');
        include 'Pages/header.php';

        if (!isset($_GET['page'])){ $_GET['page']=0; }
        
        switch ($_GET['page']) {
            default : include 'Pages/home.php';
                break;

            case 0 : include 'Pages/home.php';
                break;

            case 1 : include 'Pages/recommandations.php';
                break;
            
            case 2 : include 'Pages/login.php';
                break;

            case 3 : include 'Pages/logout.php';
                break;
        }

        include 'Pages/footer.php';
    ?>
    </body>
</html>
