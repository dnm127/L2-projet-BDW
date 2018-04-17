<?php //connexion à la base đe donnée
    session_start();
    include('inc/constantes.php');
    include('inc/fonctions.php');
    connectBD();

    $formulaireValide = FALSE;
if (isset($_POST['Reserver'])) { //s'il existe "Reserver"
        if(isset($_POST['Titre']) && trim($_POST['Titre']) != '' ) { // $_POST envoyer les donnees à la base de donnée
            // trim() pour enlever le caractère " " (vide) au début et à la fin de chaque chaine de caractère
            $titreRecette = mysqli_real_escape_string($connexion, $_POST['Titre']);
            $cateR = mysqli_real_escape_string($connexion, $_POST['Categorie']);
            $description = mysqli_real_escape_string($connexion, $_POST['description']);
            $dateR = mysqli_real_escape_string($connexion, $_POST['date']);
            $nom = mysqli_real_escape_string($connexion, $_POST['Nom']);
            $choixI = mysqli_real_escape_string($connexion, $_POST['choix1']);
            $quant = mysqli_real_escape_string($connexion, $_POST['quant']);
            $unite = mysqli_real_escape_string($connexion, $_POST['unite']);
            //mysqli_real_escape_string créer un chaine de caractère pour utiliser dans mySQL
            
            // requete select activite
            $resultat = mysqli_query($connexion, 'SELECT titreR,cateR,description,dateU,nom FROM RECETTE WHERE titreR=\''.$titreRecette.'\',cateR=\''.$cateR.'\',description=\''.$description.'\',dateU=\''.$dateR.'\',nom=\''.$nom.'\';');
				if($resultat == TRUE && mysqli_num_rows($resultat) != 0) { // si le nombre de ligne est different à 0
					echo '<p>Cette recette existe déjà !</p>';
				}
					else {
						
						// insertion des valeurs ( mySQL )
						// mysqli_query envoie un instruction à la base de donnée
						$requete = 'INSERT INTO RECETTE VALUES(\''.$titreRecette.'\',\''.$cateR.'\',\''.$description.'\',\''.$dateR.'\',\''.$nom.'\');';
						$requete2 = 'INSERT INTO composeI VALUES(\''.$quant.'\',\''.$choixI.'\',\''.$titreRecette.'\',\''.$unite.'\');';
						// 2 variables qui prennent les résultats d'exécution de code SQL
						$resInsert = mysqli_query($connexion, $requete);
						$resInsert2 = mysqli_query($connexion, $requete2);

							if (($resInsert == FALSE) || ($resInsert == FALSE)) {
								
									 include ('f.php');
									
														exit();
													}
										
									 include ('f1.php');
									

													$formulaireValide = TRUE;
												}
											}
										}
									if(!$formulaireValide) {
								
									 include ('formulairer.php'); 
									
									}
									
	?>								