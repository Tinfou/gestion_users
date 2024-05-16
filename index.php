<?php include('header\header.php'); ?>
<?php include('header\nav-bar.php') ?>
<?php
require('db_connect.php');
require('functions.php');
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
        <?php include('message.php'); ?>
        <div class="card-body m-3 ">
            <div>
                <h5 class="card-title">Modifier</h5>
            </div>
            <div class="mb-2">
                <label class="label-form" for="username">Username : <?php echo $user['username'] ?></label>
            </div>
            <div class="mb-2">
                <label class="label-form" for="nom">Nom : <?php echo $user['nom'] ?></label>
            </div>
            <div class="mb-2">
                <label class="label-form" for="prenom">Prénom : <?php echo $user['prenom'] ?></label>
            </div>
            <div>
                <a class="btn btn-primary w-100" href="update_user.php">Modifier</a>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include('header\footer.php') ?>