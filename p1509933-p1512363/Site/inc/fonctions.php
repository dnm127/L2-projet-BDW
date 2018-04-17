<?php
	$connexion = NULL;

	// connexion à la BD
	function connectBD() {
		global $connexion;
		$connexion = mysqli_connect(SERVEUR, UTILISATRICE, MOTDEPASSE, BDD);
		if (mysqli_connect_errno()) {
		    printf("Échec de la connexion : %s\n", mysqli_connect_error());
		    exit();
		}
	}

	function deconnectBD() { // déconnexion à la BD
		global $connexion;
		mysqli_close($connexion);
	}

?>
