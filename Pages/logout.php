<?php
    session_start();
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	unset($_SESSION['mail']);
	unset($_SESSION['actualpassword']);
	unset($_SESSION['is_logged_in']);
	unset($_SESSION['code']);
	unset($_SESSION['login_attempts']);

	// Détruit la session
	if(session_destroy())
	{
		// Déconnexion, redirection vers la page de connexion
		header('Location: http://localhost/le-chatelet/index.php?page=2');
		exit();
	}
?>