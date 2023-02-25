<?php
    session_start();
	unset($_SESSION['mail']);
	unset($_SESSION['actualpassword']);
	unset($_SESSION['is_logged_in']);

	// Détruit la session
	if(session_destroy())
	{
		// Déconnexion, redirection vers la page de connexion
		header('Location: http://localhost/le-chatelet/index.php?page=2');
		exit();
	}
?>