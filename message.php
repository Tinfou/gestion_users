<?php
if (isset($_SESSION['message_erreur_login'])):
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erreur. </strong><?php echo $_SESSION['message_erreur_login'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['message_erreur_login']);
endif;
?>
<?php
if (isset($_SESSION['ajout_utilisateur'])):
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Super. </strong><?php echo $_SESSION['ajout_utilisateur'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['ajout_utilisateur']);
endif;
?>
<?php
if (isset($_SESSION['formulaire_invalide'])):
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erreur. </strong><?php echo $_SESSION['formulaire_invalide'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['formulaire_invalide']);
endif;
?>

<?php
if (isset($_SESSION['modification_termine'])):
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Super. </strong><?php echo $_SESSION['modification_termine'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['modification_termine']);
endif;
?>

<?php
if (isset($_SESSION['utilisateur_supprimer'])):
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Attention. </strong><?php echo $_SESSION['utilisateur_supprimer'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['utilisateur_supprimer']);
endif;
?>

