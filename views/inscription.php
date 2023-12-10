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
                            <label for="email">Email :</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur :</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fname">Prénom :</label>
                            <input type="text" name="fname" id="fname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Nom :</label>
                            <input type="text" name="lname" id="lname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <!-- Vous pouvez ajouter d'autres champs du formulaire ici -->

                        <!-- Les champs comme le rôle et l'adresse seront attribués automatiquement -->
                        <input type="hidden" name="role" value="3"> <!-- 3 correspond au rôle 'client' -->

                        <!-- Adresse par défaut fictive (vous pouvez adapter ces champs en fonction de votre structure) -->
                        <input type="hidden" name="billing_address" value="1"> <!-- ID d'une adresse fictive -->
                        <input type="hidden" name="shipping_address" value="1"> <!-- ID d'une adresse fictive -->

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
