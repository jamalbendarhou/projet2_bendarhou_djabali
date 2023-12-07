<div class="container_site">
    <?php include '../public/header.php' ?>
    <br><br>
    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Connexion</h2>
        </div>

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <form id="contact-form" method="post" action="" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="email">Email <span class="red">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" />
                        </div>

                        <div class="col-md-12">
                            <label for="mot_de_passe">Mot de passe <span class="red">*</span></label>
                            <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" placeholder="Votre Mot de passe" />
                        </div>

                        <div class="col-md-12">
                            <center><input type="submit" class="btn" name="connexion" value="Connexion" /></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include '../public/footer.php' ?>
</body>
</html>
