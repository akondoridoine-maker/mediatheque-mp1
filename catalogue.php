<?php
require_once 'data/livres.php';
require_once 'includes/fonctions.php';
include 'includes/header.php';

// Extraction des catégories uniques pour générer le menu de filtrage
$categories = array_unique(array_column($livres, 'categorie'));

$livresAffiches = $livres;
$erreurCategorie = null;
$filtreActif = false;

// Gestion du filtrage GET
if (!empty($_GET['categorie'])) {
    $catFiltre = trim($_GET['categorie']);
    if (in_array($catFiltre, $categories)) {
        $livresAffiches = filtrerParCategorie($livres, $catFiltre);
        $filtreActif = true;
    } else {
        $erreurCategorie = "La catégorie \"" . e($catFiltre) . "\" n'existe pas.";
        $livresAffiches = []; // On n'affiche rien si la catégorie est invalide
    }
}
?>

<h2>Catalogue des livres</h2>

<!-- Menu Filtre -->
<div class="filter-area">
    <strong>Filtrer par catégorie : </strong>
    <a href="catalogue.php" class="<?php echo !$filtreActif ? 'active' : ''; ?>">Tous</a>
    <?php foreach ($categories as $cat): ?>
        <a href="catalogue.php?categorie=<?php echo urlencode($cat); ?>" 
           class="<?php echo (isset($catFiltre) && $catFiltre === $cat) ? 'active' : ''; ?>">
            <?php echo e($cat); ?>
        </a>
    <?php endforeach; ?>
</div>

<p class="count-info">Nombre de livres affichés : <strong><?php echo count($livresAffiches); ?></strong></p>

<?php if ($erreurCategorie): ?>
    <div class="error-msg"><?php echo $erreurCategorie; ?></div>
<?php else: ?>
    <div class="grid">
        <?php foreach ($livresAffiches as $livre): ?>
            <?php echo afficherLivre($livre); ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
