<?php  //connexion à la base đe donnée
    session_start();
    include('inc/constantes.php');
    include('inc/fonctions.php');
    connectBD();
    
    $formulaireValide = FALSE;
    if (isset($_POST['Envoyer'])) { //s'il existe "Envoyer"
        if(isset($_POST['Titre']) && trim($_POST['Titre']) != '' ) {// $_POST envoyer les donnees à la base de donnée
            // trim() pour enlever le caractère " " (vide) au début et à la fin de chaque chaine de caractère
            $titreI = mysqli_real_escape_string($connexion, $_POST['Titre']);
            $cateI = mysqli_real_escape_string($connexion, $_POST['Categorie']);
            $dateI = mysqli_real_escape_string($connexion, $_POST['date']);
            $quantiteI = mysqli_real_escape_string($connexion, $_POST['quantite']);
            //mysqli_real_escape_string créer un chaine de caractère pour utiliser dans mySQL
            
            // requete select activite
            $resultat = mysqli_query($connexion, 'SELECT nomI,cateI,dateI,dispoI FROM INGREDIENT WHERE nomI=\''.$titreI.'\',cateI=\''.$cateI.'\',dateI=\''.$dateI.'\',dispoI=\''.$quantiteI.'\';');
            if($resultat == TRUE && mysqli_num_rows($resultat) != 0) { // si le nombre de ligne est different à 0
                echo '<p>Cet ingrédient existe déjà !</p>';
            }
                else {
                    // insertion des valeurs ( mySQL )
                    // mysqli_query envoie un instruction à la base de donnée
                    $requete = 'INSERT INTO INGREDIENT VALUES(\''.$titreI.'\',\''.$cateI.'\',\''.$dateI.'\',\''.$quantiteI.'\');';
                     // 2 variables qui prennent les résultats d'exécution de code SQL
                    $resInsert = mysqli_query($connexion, $requete);
                    if($resInsert == FALSE) {
                    
                         include ('f.php');
                         exit();

                                       
                                    }
                    
                            include ('f1.php');
                            $formulaireValide = TRUE;
                                        
                                    }
                                }
                            }
                            if(!$formulaireValide) {
                            
                             include ('formulairei.php');
                        
                            }
                            
