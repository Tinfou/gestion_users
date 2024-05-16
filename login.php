<?php
include('header\header.php');
require('db_connect.php');
?>
<div class="d-flex justify-content-center">

    <div class="card m-5">
        <?php include('message.php') ?>
        <div class="card-body m-5 ">
            <div class="">
                <h5 class="card-title">LOGIN</h5>
            </div>
            <form action="" method="post">
                <div class="m-3">
                    <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <div class="m-3">
                    <input class="form-control" type="password" name="password" placeholder="password">
                </div>
                <div class="m-3">
                    <input class="btn btn-primary w-100" type="submit" value="Login">
                </div>
            </form>
            <div class="">
                <a class="nav-link" href="add_user.php">Sign up</a>
            </div>
        </div>
    </div>
</div>

<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `users` where username = '$username'";
    $execute_query = mysqli_query($connexion, $sql);
    $user = mysqli_fetch_assoc($execute_query);
    if (password_verify($password, $user['password'])) {
        if ($user['is_enable']) {
            if ($user['roles'] === "user") {
                $_SESSION['user_logged'] = [
                    'id_user' => $user['id_user'],
                    'nom' => $user['nom'],
                    'role' => $user['roles']
                ];
                header('Location: index.php');
            } elseif ($user['roles'] === "admin") {
                $_SESSION['user_logged'] = [
                    'id_user' => $user['id_user'],
                    'nom' => $user['nom'],
                    'role' => $user['roles'],
                ];
                header('Location: admin.php');
            }
        } else {
            $_SESSION['message_erreur_login'] = "Username ou mot de passe invalide";
            header('Location: login.php');
        }
    }
}
?>
<?php include('header\footer.php') ?>