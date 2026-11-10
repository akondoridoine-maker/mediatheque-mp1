<?php
require_once 'data/livres.php';
require_once 'includes/fonctions.php';
include 'includes/header.php';

$totalLivres = count($livres);
$disponibles = compterLivresDisponibles($livres);
?>

<h2>Bienvenue à la Médiathèque IPNET</h2>
<p>Découvrez notre sélection exclusive de livres pour enrichir vos connaissances et nourrir vos passions.</p>

<div class="stats-box">
    <h3>Indicateurs du Catalogue</h3>
    <ul>
        <li>Nombre total de livres référencés : <strong><?php echo $totalLivres; ?></strong></li>
        <li>Livres actuellement disponibles à l'emprunt : <strong><?php echo $disponibles; ?></strong></li>
    </ul>
    <a href="catalogue.php" class="btn btn-main">Consulter le Catalogue complet &rarr;</a>
</div>

<?php include 'includes/footer.php'; ?>
