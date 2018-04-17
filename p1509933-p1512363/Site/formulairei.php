<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css"/>
    <title>Formulaire ingrédient</title>
</head>

	<body>

		<?php include('static/header.php'); ?>
			<main>
				
				<?php include('static/menu.php'); ?>

				<!--Création du formulaire -->
				<form action="ajoutei.php" method="post" >

					<h1 id="reservation">Infomation Ingrédient</h1>
								<p><label for="nom">Nom de l'ingrédient</label><br :>
					            	<input type="text" name="Titre" id="Titre" autofocus/></p>
					            <p><label for="nom">Catégorie</label><br :>
					            	<input type="text" name="Categorie" id="cat" placeholder="Fruit , épcices.." /></p>
								<p><label for="nom">Date</label><br :>
									<input type="date" name="date" id="date" /></p>
				                <p><label for="nom">Quantité</label><br :>
				                    <input type="number" name="quantite" id="quantite" /></p>
								<p><input type="submit" class="bouton" value="Envoyer" name="Envoyer" ></code></p>
				</form>

				
			</main> 

		<?php include('static/footer.php'); ?>
			
	</body>

		

</html>
