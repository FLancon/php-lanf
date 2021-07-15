<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.inc.html';?>
</head>

<body>
    <header>
        <?php include 'includes/header.inc.html';?>
    </header>

    <div class="row">
        <!-- NAV-BAR -->
         <div class="col-sm-3 p-3">
            <nav>
            <a href="index.php"><button type="button" class="btn btn-outline-secondary btn-block">Home</button>
            </a>

            <?php
            session_start();
            if(!empty($_SESSION)) {
                $table = $_SESSION['table'];
                include "includes/ul.inc.html";
            }          
            ?>

            </nav>
        </div>

        <!-- FORMULAIRE / AJOUT DONNÉES -->
        <div class="col-sm-9 p-3">
            <section>
                
                <?php 
                    // Envoi du formulaire dans Table
                    if(isset($_POST ["envoyer"])) {
                        $_SESSION['table']=[
                            'first_name'=>$_POST['first_name'],
                            'last_name'=>$_POST['last_name'],
                            'age'=>$_POST['age'],
                            'size'=>$_POST['size'],
                            'situation'=>$_POST['situation']
                        ];    
                            
                        echo '<h2 class="text-center">Données sauvegardées</h2>';
                    }

                    elseif(isset($_GET['add']))  {
                        include 'includes/form.inc.html';
                    }

                    elseif(isset($_GET['debugging']))  {
                        echo "<h2 class='text-left'>Débogage</h2>  <br> <p>===> Lecture du tableau à l'aide de la fonction print_r()</p>";
                        echo "<pre>";
                        print_r($table);
                        echo "</pre>";
                    }

                    elseif(isset($_GET['concatenation']))  {
                        // Titre de section
                        echo "<h2 class='text-left'>Concaténation<br></h2>";

                        // Projection Brut du tableau
                        echo "<p> <br> ===> Construction d'une phrase avec le contenu du tableau :</p>";
                        echo '<h3>' .$table[first_name]. " " .$table[last_name].'<br></h3> 
                        <p>' .$table[age]. ' ans, je mesure ' .$table[size]. ' et je fais partie des ' .$table[situation]. 's de la promo Simplon.<br></p>';

                        // Projection MAJ du tableau

                        $table[first_name] = ucfirst($table[first_name]);
                        $table[last_name] = mb_strtoupper($table[last_name]);

                        echo "<p> <br> ===> Construction d'une phrase après MAJ du tableau :</p>";
                        echo '<h3>' .$table[first_name]. " " .$table[last_name].'<br></h3> 
                        <p>' .$table[age]. ' ans, je mesure ' .$table[size]. ' et je fais partie des ' .$table[situation]. 's de la promo Simplon.</p><br>';

                        // Afficher une virgule à la place du point

                        $table[size] = str_replace('.', ',', ($table[size]));

                        echo "<p> <br> ===> Affichage d'une virgule à la place du point pour la taille :</p>";
                        echo '<h3>' .$table[first_name]. " " .$table[last_name].'<br></h3>
                        <p>' .$table[age]. ' ans, je mesure ' .$table[size]. ' et je fais partie des ' .$table[situation]. 's de la promo Simplon.<br></p>';;
                    }

                    elseif(isset($_GET['loop']))  {
                        echo "<h2 class='text-left'>Boucle</h2>  <br> <p>===> Lecture du tableau à l'aide d'une boucle foreach :</p>";
                        $i=0;
                        foreach ($table as $key => $value) {
                            echo '<div>À la ligne N°' .$i ++. ' correspond à la clé "'. $key . '" et contient "' . $value . '".<br></div>';
                        }
                    }

                    elseif(isset($_GET['function']))  {                 
                        echo "<h2 class='text-left'>Fonction</h2>  <br> <p>===> J'utilise ma fonction readTable() :</p>";
                    function ReadTable($table) {
                        $i=0;
                        foreach ($table as $key => $value) 
                        echo '<div>À la ligne N°' .$i ++. ' correspond à la clé "'. $key . '" et contient "' . $value . '".<br></div>';
                        }
                        readTable($table);
                    }

                    // Suppression Session
                    elseif(isset($_GET['del']))  {
                        session_destroy();
                        echo '<h2>Les données ont bien été supprimées</h2>';
                    }
                    // Affichage du bouton "Ajouter des données"
                    else  {
                        echo
                        '<a href="index.php?add"> <button type="button" class="btn btn-primary text-white px-5 type="button">Ajouter des données</button></a>';
                    }
                ?>
            </section>
        </div>
    </div>

    <footer>
        <?php include 'includes/footer.inc.html';?>
    </footer>

</body>
</html>