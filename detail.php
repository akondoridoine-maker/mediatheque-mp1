<?php
require_once 'data/livres.php';
require_once 'includes/fonctions.php';
include 'includes/header.php';

$livre = null;
$erreur = null;

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id !== false && $id !== null) {
        $livre = trouverLivreParId($livres, $id);
        if (!$livre) {
            $erreur = "Aucun ouvrage ne correspond à cet identifiant.";
        }
    } else {
        $erreur = "L'identifiant fourni est invalide.";
    }
} else {
    $erreur = "Aucun identifiant de livre n'a été spécifié.";
}
?>

<h2>Détails du livre</h2>

<?php if ($erreur): ?>
    <div class="error-msg"><?php echo $erreur; ?></div>
    <a href="catalogue.php" class="btn">&larr; Retour au catalogue</a>
<?php else: ?>
    <div class="detail-box">
        <h3><?php echo e($livre['titre']); ?></h3>
        <table class="table-detail">
            <tr><th>Auteur :</th><td><?php echo e($livre['auteur']); ?></td></tr>
            <tr><th>Année de parution :</th><td><?php echo e($livre['annee']); ?></td></tr>
            <tr><th>Catégorie :</th><td><?php echo e($livre['categorie']); ?></td></tr>
            <tr><th>Prix public :</th><td><?php echo e(number_format($livre['prix'], 2)); ?> €</td></tr>
            <tr>
                <th>Disponibilité :</th>
                <td><?php echo $livre['disponible'] ? '<span class="badge disponible">Disponible immédiatement</span>' : '<span class="badge indisponible">Actuellement emprunté</span>'; ?></td>
            </tr>
        </table>
        <br>
        <a href="catalogue.php" class="btn">&larr; Retour au catalogue</a>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
