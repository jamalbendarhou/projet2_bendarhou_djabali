<?php

require_once('../controllers/UserController.php');


if(isset($_GET['id']) && !empty($_GET['id'])) {
    
    $user_id = $_GET['id'];

    
    $userController = new UserController();

    
    $user = $userController->getUserById($user_id);

    /
    if(!$user) {
        echo "Utilisateur non trouvé.";
        exit;
    }
} else {
    echo "ID de l'utilisateur non spécifié.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userDetails = array(
        'id' => $user_id, 
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'password' => $_POST['password'], 
        'role_id' => $_POST['role']
        
    );


    $userController = new UserController();

    $userController->updateUser($userDetails);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier utilisateurs - MOTO VIBE</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
</head>
<body>

    <div class="container_site">
        <?php include '../public/header.php' ?>
        <br><br>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Modifier l'utilisateur</h2>
            </div>

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Nom d'utilisateur :</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="fname">Prénom :</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user['fname']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="lname">Nom :</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user['lname']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Rôle :</label>
                            <select class="form-control" id="role" name="role">
                                <option value="1" <?php if ($user['role_id'] == 1) echo 'selected'; ?>>Super Admin</option>
                                <option value="2" <?php if ($user['role_id'] == 2) echo 'selected'; ?>>Admin</option>
                                <option value="3" <?php if ($user['role_id'] == 3) echo 'selected'; ?>>Client</option>
                               
                            </select>
                        </div>

                       

                        <button type="submit" class="btn">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
    <?php include '../public/footer.php' ?>
</body>
</html>


