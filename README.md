# Catalogue dynamique « Médiathèque IPNET »

## Description du projet
Ce mini-projet consiste en la réalisation d'un premier site web dynamique pour la **Médiathèque IPNET**. Développé en PHP 8 sans base de données, il met en pratique l'utilisation des structures de contrôle, des fonctions personnalisées, la gestion des tableaux associatifs ainsi que l'inclusion modulaire de fichiers. Les données du catalogue de livres sont entièrement stockées au sein d'un fichier de données PHP.

* **Chargé du Cours :** M. EDOU Dodji
* **Filière / UE :** IT231
* **Environnement de développement :** Wampserver (Serveur local Apache / PHP 8)

---

## Fonctionnalités réalisées
- **Page d'accueil (`index.php`) :** Message de bienvenue chaleureux, indicateurs du catalogue générés dynamiquement (nombre total de livres et nombre de livres disponibles calculés en PHP).
- **Page catalogue (`catalogue.php`) :** Affichage de l'ensemble des livres sous forme de cartes structurées (Titre, Auteur, Année, Catégorie, Prix, Disponibilité) avec décompte automatique des éléments affichés.
- **Filtrage par catégorie :** Liens dynamiques permettant de filtrer les livres via un paramètre d'URL (ex: `catalogue.php?categorie=Roman`). Gestion de la sécurité et des erreurs si la catégorie n'existe pas.
- **Page détail (`detail.php`) :** Affichage exhaustif des caractéristiques d'un livre sélectionné via son identifiant (`detail.php?id=X`). Validation stricte de l'identifiant reçu par méthode GET.
- **Page « À propos » (`apropos.php`) :** Présentation du contexte institutionnel et intégration d'une fonction PHP affichant la date du jour au format localisé.
- **Sécurité & Conception :** Utilisation systématique de la fonction `htmlspecialchars()` pour l'échappement des données (protection contre les failles XSS) et découpage propre en sous-fichiers (`header.php`, `footer.php`, `fonctions.php`).

---

## Prérequis et Procédure d'installation

### Prérequis
- Avoir installé un serveur local comme **Wampserver** ou **XAMPP** prenant en charge **PHP 8.0** ou une version supérieure.

### Installation et Lancement
1. Téléchargez ou clonez ce dépôt Git dans votre répertoire web local (ex: `C:\wamp64\www\` ou `O:\wamp64\www\`).
2. Assurez-vous que le dossier du projet est correctement nommé `mediatheque-mp1`.
3. Démarrez votre environnement **Wampserver**. Attendez que l'icône devienne **verte**.
4. Ouvrez votre navigateur internet favori (Chrome, Firefox, Edge).
5. Saisissez l'adresse URL suivante dans la barre de recherche :  
   `http://localhost/mediatheque-mp1/index.php`
