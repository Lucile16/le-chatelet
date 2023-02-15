<!DOCTYPE html>
<html>

    <body class="d-flex flex-column min-vh-100">

    <?php
        include_once('connexion_db.php');
        include_once('requests.php');
        include_once('functions.php');

        include 'Pages/header.php';

        if (!isset($_GET['page'])){ $_GET['page']=0; }

        
        switch ($_GET['page']) {

            default : include 'Pages/home.php';
                break;

            case 0 : include 'Pages/home.php';
                break;

            case 1 : if (!isset($_GET['recipe'])){
                include 'Pages/list_recipes.php';
                }else {
                    switch ($_GET['recipe']) {
                        case 0: include 'Pages/recipe.php';
                        break;
                        
                        case 1: include 'Pages/recipe.php';
                        break;
                        
                        case 2: include 'Pages/recipe.php';
                        break;

                        case 3: include 'Pages/recipe.php';
                        break;

                        case 4: include 'Pages/recipe.php';
                        break;

                        case 5: include 'Pages/recipe.php';
                        break;

                        case 6: include 'Pages/recipe.php';
                        break;

                        case 7: include 'Pages/recipe.php';
                        break;

                        case 8: include 'Pages/recipe.php';
                        break;

                        case 9: include 'Pages/recipe.php';
                        break;

                        case 10: include 'Pages/recipe.php';
                        break;

                        case 11: include 'Pages/recipe.php';
                        break;
                        }
                }
                break;

            case 2 : include 'Pages/add_recipe.php';
                break;

            case 3 : include 'Pages/submit_new_recipe.php';
                break;

            case 4 : include 'Pages/modify_recipe.php';
                break;

            case 5 : include 'Pages/submit_modified_recipe.php';
                break;

            case 6 : include 'Pages/contact.php';
                break;

            case 7 : include 'Pages/submit_contact.php';
                break;

            /*page de connexion utilisateur à ajouter*/

        }
        include 'Pages/footer.php';

    ?>
    </body>
</html>
