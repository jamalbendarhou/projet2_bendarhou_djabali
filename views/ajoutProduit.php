<?php
// page pour l ajout d un produit 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../controllers/ProduitController.php');
    $produitController = new ProduitController();

    
    $data = array(
        'name' => $_POST['name'],
        'qtty' => $_POST['qtty'],
        'price' => $_POST['price'],
        'url_img' => $_FILES['image'],
        'description' => $_POST['description']
    );

    $produitController->ajouterProduit($data);

    
    header("Location: manage_product.php");
    exit();
} else {
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des produits</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="..." crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="...">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>
</head>

    <body>

    <div class="container_site">
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Ajout Produit</h2>
            </div>

            <form enctype="multipart/form-data" method="post" action="">
                
                <div class="row">
                    <div class="col-md-4">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"  />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="name">Nom  <span class="red">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Entrez le nom du produit"  />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="qtty">Quantité  <span class="red">*</span></label>
                        <input type="number" id="qtty" name="qtty" class="form-control" placeholder="Entrez la quantité" min="0" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="price">Prix  <span class="red">*</span></label>
                        <div class="input-group">
                            <input type="number" id="price" name="price" class="form-control" placeholder="Entrez le prix" min="0" />
                            <span class="input-group-addon">$</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="description">Description  <span class="red">*</span></label>
                        <textarea id="description" name="description" class="form-control" placeholder="Entrez la description du produit"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <center><input type="submit" name="envoyer" class="btn" value="Ajouter"/></center>
                </div>
            </form>
        </div>
    </div>

    </body>
    </html>

    <?php
}
?>
