<?php require('db_connect.php'); ?>
<?php include('header\header.php') ?>

<div class="d-flex justify-content-center">

    <div class="card m-5">
        <?php include('message.php'); ?>
        <div class="card-body m-3 ">
            <div>
                <h5 class="card-title">Ajout utilisateur</h5>
            </div>
            <form class="text-start" action="" method="post" enctype="multipart/form-data">
                <div>
                    <label class="label-form" for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                <div>
                    <label class="label-form" for="nom">Nom</label>
                    <input class="form-control" type="text" name="nom" id="nom">
                </div>
                <div>
                    <label class="label-form" for="prenom">Prénom</label>
                    <input class="form-control" type="text" name="prenom" id="prenom">
                </div>
                <div>
                    <label class="label-form" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div>
                    <input type="submit" name="submit" class="btn btn-primary w-100 mt-3" value="Enregister">
                </div>
            </form>
            <div class="">
                <a class="nav-link mt-3" href="login.php">Login</a>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['username']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $is_enable = false;
        $password = $_POST['password'];
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $created_date = date('Y-m-d H:i:s');
        $roles = "user";
        $sql = "INSERT INTO `users`(`id_user`, `username`, `nom`, `prenom`, `is_enable`, `created_date`, `roles`, `password`) VALUES (null,'$username','$nom','$prenom','$is_enable','$created_date','$roles','$password_hashed')";
        $execute_query = mysqli_query($connexion, $sql);
        if ($execute_query) {
            $_SESSION['ajout_utilisateur'] = "Inscription réussie";
            header('Location: login.php');
        } else {
            $_SESSION['formulaire_invalide'] = "formulaire invalide";
            header('Location: add_user.php');
        }
    } else {
        $_SESSION['formulaire_invalide'] = "formulaire invalide";
        header('Location: add_user.php');
    }
}

?>


<?php include('header\footer.php') ?>