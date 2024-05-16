<?php include('header\header.php');
include('header\nav-bar.php');
require('db_connect.php');
include('functions.php');
if (!isset($_SESSION['user_logged'])) {
    header('Location: login.php');
}
include('message.php');
?>
<div class="container mb-5 mt-5">
    <table class="table ">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Création</th>
                <th>Role</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM users where roles = 'user'";
            $execute_query = mysqli_query($connexion, $sql);
            while ($user = mysqli_fetch_assoc($execute_query)) {
            ?>
                <tr>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['nom'] ?></td>
                    <td><?php echo $user['prenom'] ?></td>
                    <td><?php echo $user['created_date'] ?></td>
                    <td><?php echo $user['roles'] ?></td>
                    <td><?php get_status($user['is_enable']) ?></td>
                    <td>
                        <a class="btn btn-warning" href="info_user.php?id_user=<?php echo $user['id_user']; ?>">Détails</a>
                        <a class="btn btn-primary" href="update_user_admin.php?id_user=<?php echo $user['id_user']; ?>">Modifier</a>
                        <a class="btn btn-danger" href="delete.php?id_user=<?php echo $user['id_user']; ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>
<?php include('header\footer.php') ?>