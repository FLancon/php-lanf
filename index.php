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
        <div class="col-3 p-5">
            <nav>
            <a href="index.php"><button type="button" class="btn btn-outline-secondary btn-block">Home</button>
            </a>
            <?php include 'includes/ul.inc.html';?>
            </nav>
        </div>

        <!-- FORMULAIRE / AJOUT DONNÉES -->
        <div class="col-9 p-5">
            <section>
                <a href="index.php?add"><button class="btn btn-primary text-white px-5" type="button">Ajouter des données
                </button></a>
                
                <?php 
                if(isset(($_GET['add'])))  {
                    include 'includes/form.inc.html';
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