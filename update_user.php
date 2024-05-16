<?php include('header\header.php'); ?>
<?php include('header\nav-bar.php') ?>
<?php
require('db_connect.php');
if (!isset($_SESSION['user_logged'])) {
    header('Location: login.php');
}
?>
<?php
$id_user = $_SESSION['user_logged']['id_user'];
$sql = "SELECT * FROM `users` where id_user = '$id_user'";
$execute_query = mysqli_query($connexion, $sql);
$user = mysqli_fetch_assoc($execute_query);
?>
<div class="d-flex justify-content-center">
    <div class="card m-5">
        <div class="card-body m-3 ">
            <div>
                <h5 class="card-title">Modifier</h5>
            </div>
            <form class="text-start" action="" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <label class="label-form" for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" value="<?php echo $user['username']; ?>">
                </div>
                <div class="mb-2">
                    <label class="label-form" for="nom">Nom</label>
                    <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $user['nom']; ?>">
                </div>
                <div class="mb-2">
                    <label class="label-form" for="prenom">Prénom</label>
                    <input class="form-control" type="text" name="prenom" id="prenom" value="<?php echo $user['prenom']; ?>">
                </div>
                <div class="mb-2">
                    <label class="label-form" for="password">Nouveau password</label>
                    <input class="form-control" type="text" name="password" id="password">
                </div>
                <div>
                    <input type="submit" name="submit" class="btn btn-primary w-100" value="Enregister">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['username']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
        $username = $_POST['username'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        if (empty($_POST['password'])) {
            $default_password = $user['password'];
            $password_hashed = $default_password;
        }else{
            $password = $_POST['password'];
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        }
        $sql = "UPDATE `users` SET `username`='$username',`nom`='$nom',`prenom`='$prenom',`password`='$password_hashed' WHERE id_user = $id_user";
        $execute_query = mysqli_query($connexion, $sql);
        if ($execute_query) {
            $_SESSION['modification_termine'] = "Modification terminé";
            header('Location: index.php');
        } else {
            $_SESSION['formulaire_invalide'] = "formulaire invalide";
            header('Location: update_user.php');
        }
    }else{
        $_SESSION['formulaire_invalide'] = "formulaire invalide";
        header('Location: update_user.php');
    }
}
?>