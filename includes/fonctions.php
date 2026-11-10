<?php
// includes/fonctions.php

/**
 * Sécurise l'affichage des données
 */
function e(string $valeur): string {
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8');
}

/**
 * Génère le code HTML (carte) pour l'affichage d'un livre
 */
function afficherLivre(array $livre): string {
    $statut = $livre['disponible'] ? '<span class="badge disponible">Disponible</span>' : '<span class="badge indisponible">Emprunté</span>';
    
    return '
    <div class="card">
        <h3>' . e($livre['titre']) . '</h3>
        <p><strong>Auteur :</strong> ' . e($livre['auteur']) . '</p>
        <p><strong>Catégorie :</strong> ' . e($livre['categorie']) . '</p>
        <p><strong>Prix :</strong> ' . e(number_format($livre['prix'], 2)) . ' €</p>
        <p>' . $statut . '</p>
        <a href="detail.php?id=' . (int)$livre['id'] . '" class="btn">Voir les détails</a>
    </div>';
}

/**
 * Filtre le tableau de livres par catégorie
 */
function filtrerParCategorie(array $livres, string $categorie): array {
    $resultat = [];
    foreach ($livres as $livre) {
        if (strcasecmp($livre['categorie'], $categorie) === 0) {
            $resultat[] = $livre;
        }
    }
    return $resultat;
}

/**
 * Recherche un livre par son identifiant unique ID
 */
function trouverLivreParId(array $livres, int $id): ?array {
    foreach ($livres as $livre) {
        if ($livre['id'] === $id) {
            return $livre;
        }
    }
    return null;
}

/**
 * Compte le nombre total de livres marqués comme disponibles
 */
function compterLivresDisponibles(array $livres): int {
    $total = 0;
    foreach ($livres as $livre) {
        if ($livre['disponible']) {
            $total++;
        }
    }
    return $total;
}

/**
 * Affiche la date du jour formatée en français
 */
function afficherDateDuJour(): string {
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    return date('d/m/Y');
}
