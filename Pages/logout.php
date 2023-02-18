<?php
    session_start();
    // Détruire la session
	if(session_destroy())
	{
		// Redirection vers la page de connexion
		header('Location: http://localhost/le-chatelet/index.php?page=2');
	}
?>