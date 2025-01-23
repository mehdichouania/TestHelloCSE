<p align="center"><a href="https://www.hellocse.fr/" target="_blank"><img src="https://form.officielce.com/uploads/fournisseurs/9342/65af8769f2948.jpeg" width="400" alt="HelloCSE Logo"></a></p>


# Test technique HelloCSE - API

Il s'agit du test technique proposé par HelloCSE pour évaluser les compétences technique et le savoir-faire sur la technologie. Le principe étant de créer une API permettant de créer, editer, supprimer des profils en ajoutant une couche d'authentification et d'administration.


## Déploiement du projet en local

### Installation des dépendances

```bash
composer install
```

### Création du fichier .env

Il suffit de copier le fichier `.env.example` et de le renommer en `.env`.

### Création du lien au storage public

```bash
php artisan storage:link
```

### Création des tables

```bash
php artisan migrate
```

### Peupler la base de données

```bash
php artisan db:seed
```
