# Connexion à la base de donnée

Copier le fichier **.env** en **.env.local**.

On renseigne les informations de notre base de donnée : `DATABASE_URL="mysql://root:@127.0.0.1:3306/cdi?serverVersion=10.4.28-MariaDB&charset=utf8mb4"`

Créer la base de donnée avec **symfony** : `symfony console doctrine:database:create` ou `symfony console d:d:c`

# Inscription , connexion et authentification pour un étudiant

Inscription : `symfony console make:registration-form`

Connexion : `symfony console make:user`

Authentification : `symfony console make:auth`

Faire la migration en 2 étapes : migration et migrate :

Migration : `symfony console doctrine:migrations:diff` ou `symfony console make:migration`

Migrate : `symfony console doctrine:migrations:migrate`

# Les routes

Lister toutes les routes : `symfony console debug:router`

# Gestion des livres

Ajout d'une entité **livre** : `symfony console make:entity`

Création d'un **crud** pour l'entité **livre** : `symfony console make:crud`

# Génération d'un diagramme de vos entitées

Installer : `composer require jawira/doctrine-diagram-bundle --dev`

Do you want to execute this recipe? Y

Générer un diagrame : `symfony console doctrine:diagram`

# Fixtures 

Installer **doctrine-fixtures-bundle** et **fakerphp/faker** : `composer require --dev doctrine/doctrine-fixtures-bundle fakerphp/faker`

Ajouter de fausses données pour l'entitée **livre**.

Charger les **fixtures** en supprimant le contenu de la table **livre** : `symfony console doctrine:fixture:load` ou  `symfony console doctrine:fixture:load --no-interaction`

Ajouter des **fixtures** sans vider la table **livre** :  `symfony console doctrine:fixture:load --append`

---

# FOAD Symfony

## Projet

Réaliser un site web pour un centre de documentation et d'information (**CDI**).

Le site web devra afficher sur sa page d'acceuil la liste des **livres** d'un **CDI** sous forme de cards par ordre alphabetique de titre de **livre** , sous cette forme :

- Image 
- Auteur
- Titre
- Editeur

Permettre à un **étudiant** de s'**inscrire** et de se **connecter** , afficher l'**avatar** de l'étudiant dans la navbar lorsqu'il est connecté sinon mettre un avatar générique.

Les caractériques d'un **étudiant** sont :

- nom
- prénom
- email
- telpehone
- avatar

Permettre à un **administrateur** :

- d'**ajouter** , **modifier** , **supprimer** des étudiants
- d'**ajouter** , **modifier** , **supprimer** des livres
- d'**ajouter** , **modifier** , **supprimer** des genres de livres

Les caractériques d'un **livre** sont :

- titre
- editeur
- auteur
- isbn
- date_publication
- image
- genre
- resume

Les caractériques d'un **genre de livre** sont :

- nom
- description

Ce qu'il faut respecter :

- Un livre peut avoir plusieurs genres
- Gérer le fait qu'un étudiant peut emprunter un livre 
- Avoir une date de rendu et de sortie pour un livre

Réaliser ce site web avec une installation compléte de **Symfony**.

Traduire ce projet en language **Symfony** c'est à dire en créant les bonnes entitées avec leurs relations.

Plusieurs solutions sont possibles pour ce type projet.

## Git

- Votre travail final se fera dans une branche nommée **developp**
- Vous devrez faire des commits fréquents (**atomiques**) 
- Travailler dans des branches , une branche par fonctionnalité

## Design

Utiliser aucun framework css , soyer créatif.

## Documentation

Documenter dans un **readme** toute votre démarche.

## Retour

Si vous avez des questions , ouvrer une **issue** sur ce dépôt pour en faire profiter tous le monde.

Have Fun.