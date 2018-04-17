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
    <title>Formulaire Recette</title>
</head>

	<body>

		<?php include('static/header.php'); ?>
		<main>
				<?php include('static/menu.php'); ?>  
						
				
				<!-- Création du formulaire -->
				<form action="ajouter.php " method="post" >
					
									
				<h1>Information Recette</h1>


				<p><label >Titre </label><br :>
				<input type="text" name="Titre" id="Titre" autofocus/></p>
				<p><label >Categorie </label><br :>
				<input type="text" name="Categorie" id="Categorie" placeholder="Dessert , plat.." /></p>
				<p><label f>Description </label><br />
				<textarea name="description" rows="10" cols="50"></textarea>
				<p><label >Date</label><br :>
				<input type="date" name="date" id="date" /></p>
				<p><label >Nom personne</label><br />
				<input type="text" name="Nom" id="Nom" /></p>

				<?php $afficherIngredient = 'SELECT * FROM INGREDIENT;'; // création d'une variable avec selection de tous les attributs d'ingrédient
						  $resultatIngredient = mysqli_query($connexion, $afficherIngredient);// afficher tous les ingrédients
					
					if($resultatIngredient == FALSE) {
						printf("<p Erreur : problème d'exécution de la requête.</p>");
					}
						else {
								if(mysqli_num_rows($resultatIngredient) == 0) { // aucun résultat
									echo "<p>Il n'y a aucun ingredient dans la base.</p>";
								}
									else { // au moins un résultat
										
										while ($row = mysqli_fetch_assoc($resultatIngredient)) { // boucle sur chaque n-uplet
											
											?> 		 <!-- Affichage dans le formulaire de tous les ingrédients déjà rentrés dans la BDD -->
													<div id="case"><input type="checkbox" name="choix1" value="1"><?php  ?>  <?php echo $row['nomI']; ?> <p>
													<label > Quantité </label><br :>
													<input type="text" name="quant" id="quant" autofocus/></p>
													<p><label > Unité </label><br :>
													<input type="text" name="unite" id="unite" autofocus/></p> </div> <?php
																								}
										 }
								}
					
					?>

					<p><input type="submit" class="bouton" value="Réserver" name="Reserver" ></code></p>




			</form>
		</main>

			<?php include('static/footer.php'); ?>


	</body>
<?php
deconnectBD();
?>	

</html>

