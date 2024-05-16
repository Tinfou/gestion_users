<?php
session_start();
require('db_connect.php');
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $sql = "DELETE FROM `users` WHERE id_user = $id_user";
    $execute_query = mysqli_query($connexion, $sql);
    if ($execute_query) {
        $_SESSION['utilisateur_supprimer'] = "Utilisateur supprimer";
        header('Location: admin.php');
    }
}
