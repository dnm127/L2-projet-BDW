<?php
	session_start();
	include('inc/constantes.php');
	include('inc/fonctions.php');
	connectBD();
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css"/>
    <title>Recettes & Ingredients</title>
</head>

<body>

	<?php include('static/header.php'); ?>
	
	<main>
	
		<?php include('static/menu.php'); ?>
		
		<?php
		
		$afficher = 'SELECT * FROM nbE;'; //création d'une varibale 
		
	// envoi de la requete au SGBD
		$resultat = mysqli_query($connexion, $afficher);
		
		if($resultat == FALSE) {
			printf("<p Erreur : problème d'exécution de la requête.</p>");
		}
			else {
				if(mysqli_num_rows($resultat) == 0) { // aucun résultat
				echo "<p>Il n'y a aucune recette dans la base.</p>";
			}
				else { // au moins un résultat
					$a=" ";
					?> <h1> Les recette </h1> <?php
					while ($row = mysqli_fetch_assoc($resultat)) { // boucle sur chaque n-uplet
						 
							
								  ?> <div id="recette"> <?php echo $row['titreR'];
															  echo $a;
									   						  echo $row['numeroE'];							// affichage de certains attributs de l'entité nbE , avec saut de ligne
															  echo $a;
															  echo $row['instruction']; ?>  </div> <?php
														   
															  
								   
						  
					}
				}
	        
	   	 }

	    $afficherIngredient = 'SELECT * FROM INGREDIENT;';
	    $resultatIngredient = mysqli_query($connexion, $afficherIngredient);
	        
	    if($resultatIngredient == FALSE) {
	            printf("<p Erreur : problème d'exécution de la requête.</p>");
	        }
	        else {
	            if(mysqli_num_rows($resultatIngredient) == 0) { // aucun résultat
	                echo "<p>Il n'y a aucun ingrédient dans la base.</p>";
	            }
	            else { // au moins un résultat
	                
	                ?> <table> <caption>Les Ingrédients</caption>
						<tr>
							<td>Ingredient</td>
							<td>Categorie</td>
							<td>Date</td>
							<td>Disponibilité</td>
						  </tr><?php
	                while ($row = mysqli_fetch_assoc($resultatIngredient)) { // boucle sur chaque n-uplet
	                   ?> 
	                   	  	<!-- affichage de certains attributs de l'entité Ingrédient , avec création d'un tableau pour insérer les élements affichés -->
							<tr>
							<th>  <?php echo $row['nomI']; ?>  </th>
							<th>  <?php echo $row['cateI']; ?>  </th> 				
							<th>  <?php echo $row['dateI']; ?>  </th>
							<th>  <?php echo $row['dispoI']; ?>  </th>
							
							
						  </tr>
						  
						  <?php
							
						
	                } ?></table><?php
	                
	            }
	            
	        }
	    
	    
		?>
	</main>
	

	<?php include('static/footer.php'); ?>


</body>
<?php
deconnectBD(); // deconnection de la base de données 
?>	




</html>