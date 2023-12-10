<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MOTO VIBE</title>
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
                        <div class="form-group">
    <label for="billing_address_id">Adresse de facturation :</label>
    <select name="billing_address_id" id="billing_address_id" class="form-control" required>
        <?php
        // Inclure le fichier de connexion à la base de données
        require_once('../utils/Crud.php');

        // Créer une instance de la classe Crud pour établir la connexion
        $crud = new Crud();

        // Récupérer les adresses depuis la base de données
        $billingAddresses = $crud->getAll('address');

        // Afficher les adresses de facturation comme options dans le menu déroulant
        foreach ($billingAddresses as $address) {
            echo "<option value='" . $address['id'] . "'>" . $address['street_name'] . ", " . $address['city'] . ", " . $address['country'] . "</option>";
        }
        ?>
    </select>
</div>

        <div class="form-group">
            <label for="shipping_address_id">Adresse de livraison :</label>
            <select name="shipping_address_id" id="shipping_address_id" class="form-control" required>
                <?php
                // Récupérer les adresses depuis la base de données
                $shippingAddresses = $crud->getAll('address');

                // Afficher les adresses de livraison comme options dans le menu déroulant
                foreach ($shippingAddresses as $address) {
                    echo "<option value='" . $address['id'] . "'>" . $address['street_name'] . ", " . $address['city'] . ", " . $address['country'] . "</option>";
                }
                ?>
            </select>
        </div>

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
