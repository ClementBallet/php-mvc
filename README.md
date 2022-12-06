# PHP MVC

> Installer les données dans le fichier SQL fourni pour faire fonctionner le projet.

> La solution se trouve ici : https://github.com/ClementBallet/php-mvc-solution

## Explications

Voici un starter pour comprendre simplement l'architecture MVC.

Il se veut plus simple qu'un MVC traditionnel volontairement pour saisir le fonctionnement de base.

Des points importants : 
- l'index joue le rôle du controller (mais dans la réalité, le controller aura sa propre classe et l'index jouera le rôle du router qui définira sur quelle page on se trouve et que doit-il doit afficher)
- tout ce qui touche à la base de données se trouve dans la partie `Models` 
- tout ce qui touche à la partie rendu à l'utilisateur se trouve dans le dossier `Views`

Evidemment, les noms des dossiers changeront suivants les projets, les frameworks et la structure que l'on voudra adopter.

Résumé visuel : 

![https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png/370px-Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png](https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png/370px-Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png)

## Consignes du TP

TP MVC (peut être réalisé à 2)
- A l'aide du starter sur ce dépôt
remplir la méthode getAllPost() dans la classe Post(). Cette méthode récupèrera tous les articles enregistrés dans notre BDD
- créer une vue adaptée pour afficher des "cards" pour chaque article avec le titre, un extrait du contenu de l'article, l'auteur de l'article et la date (je vous ai mis une suggestion de design pour les cards)
- dans l'index (qui fait pour l'instant office de contrôleur), adapter le router pour prendre en compte une url de type /posts
- Créer les vues suivantes et faire la bonne redirection dans l'index :
  - page d'erreur 404 
  - page d'accueil

>  Les routes actuelles sont :
> - `/` : racine de notre app
> - `/?post_id=1` : affichage de l'article correspondant à l'id passé en paramètre GET (404 si l'id n'est pas trouvé en BDD ou que aucun id n'est passé en paramètre)
> - `/?action=blog` : affichage de tous les articles de la BDD (404 ou redirection vers l'accueil si aucune valeur n'est passée dans la clé action)
> - la 404 s'affiche pour tout le reste

- Dans la BDD, rajouter une table pour gérer des catégories dans lesquelles ont pourra mettre des articles
- Rajouter la liaison entre la table post et category pour que chaque post puisse être associé à une category
- Dans les models, créer la classe qui va se charger de récupérer les catégories en BDD, les méthodes à créer :
  - `getCategory($post_id)` qui retrouvera la catégorie affiliée à un article et qui prendra l'id de l'article en paramètre
  - `getAllPostFromCategory($cat_id)` qui retrouvera tous les articles d'une catégorie, en passant l'id de la catégorie en paramètre
  - `getAllCategories()` qui retrouvera toutes les catégories listées en BDD
- Au niveau des vues :
  - dans la vue qui affiche un article, afficher également le nom de la catégorie associée
  - créer une vue qui va afficher tous les articles d'une catégorie. Le paramètre GET peut se présenter sous cette forme : `/?cat_id=1`
  - créer une vue qui va afficher le listing de toutes les catégories, quand on clique sur une catégorie on est redirigé vers la page de la catégorie qui liste tous les articles de celle-ci (cf. point précédent). L'URL peut se présenter sous cette forme : `/?action=all_cat`
- Créer un/des controller(s) avec des méthodes pour :
  - afficher un article 
  - afficher un listing de tous les articles 
  - afficher le blog

## Ressources : 

- https://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr%C3%B4leur
- https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php
- https://grafikart.fr/tutoriels/namespaces-563#autoplay
- https://grafikart.fr/tutoriels/tp-structure-565#autoplay
- https://grafikart.fr/tutoriels/tp-database-566#autoplay
- https://grafikart.fr/tutoriels/tp-tables-567#autoplay
- https://grafikart.fr/tutoriels/tp-pb-organisation-568#autoplay
- https://grafikart.fr/tutoriels/mvc-model-view-controller-574#autoplay
- https://grafikart.fr/tutoriels/mvc-model-vue-controller-php-132 (une vieille vidéo)
- https://www.classe-en-ligne.fr/framework_mvc