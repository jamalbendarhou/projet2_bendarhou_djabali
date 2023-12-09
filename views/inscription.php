<!-- Inscription Page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MOTO VIBE</title>
    <!-- Ajoutez vos liens CSS et JS ici -->
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
</head>

<body>
    <div class="container_site">
        <?php include '../public/header.php' ?>
        <br><br>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Inscription</h2>
            </div>

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="inscription-form" method="post" action="../controllers/inscription_process.php" role="form">
                        <!-- Champs du formulaire -->
                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>

                        <!-- Ajoutez les autres champs du formulaire ici -->

                        <center><input type="submit" name="envoyer" class="btn" value="Inscription" /></center>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
    <?php include '../public/footer.php' ?>
</body>

</html>
