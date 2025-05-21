# Projet Laravel : Préinscription en ligne pour une école de médecine

## 📅 Objectif du projet

Ce projet est une application Laravel permettant aux étudiants de se préinscrire en ligne dans une école de médecine. Elle est en cours de développement.

### Fonctionnalités déjà disponibles :

* Formulaire de préinscription pour les étudiants (nom, âge, dateIncription.)
* Enregistrement des informations dans la base de données
* Accès réservé à l'administrateur (`matsokakelv99@gmail.com`) pour consulter les inscriptions
* Possibilité d'ajouter d'autres administrateurs

### Fonctionnalités à venir :

* Envoi automatique d'un mail de confirmation de réservation
* Délai limite pour se présenter physiquement
* Annulation automatique de la réservation si la date est dépassée

---

## 💻 Installation en local (pour tester le projet)

### 1. Prérequis :

* PHP 8.1 ou supérieur
* Composer
* MySQL
* XAMPP ou Laravel Valet/WAMP
* Git (pour cloner le projet)

### 2. Cloner le projet

```bash
https://github.com/Rolphe24/preinscription-ecole-medecine.git
cd preinscription-ecole-medicale
```

### 3. Installer les dépendances

```bash
composer install
```

### 4. Créer et configurer le fichier `.env`

Copier le fichier `.env.example` en `.env`

```bash
cp .env.example .env
```

Modifier les informations de connexion à la base de données :

```
DB_DATABASE=nom_de_ta_base
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Générer la clé de l'application

```bash
php artisan key:generate
```

### 6. Lancer les migrations et seeders

```bash
php artisan migrate --seed
```

> 🔊 Un compte admin est automatiquement créé avec :
>
> * Email : `matsokakelv99@gmail.com`
> * Mot de passe : `Rolphe2000`

### 7. Lancer le serveur local

```bash
php artisan serve
```

Accéder au projet sur `http://localhost:8000`

---

## 🌐 Structure des dossiers (principaux)

* `app/Models` : Modèles Laravel (ex. User.php)
* `database/migrations` : Fichiers de structure de la base de données
* `database/seeders` : Création des utilisateurs admin par défaut
* `resources/views` : Fichiers Blade (interface utilisateur)
* `routes/web.php` : Routes du projet

---

## 🔒 Sécurité

* Le fichier `.env` est **dans le .gitignore** donc ne sera pas publié
* L'accès aux données est protégé par authentification admin

---

## ✍️ Auteur

**Kelvy Rolphe MATSOKA FOUTI**
Email : [matsokakelvy99@gmail.com](mailto:matsokakelvy99@gmail.com)
Projet réalisé dans un cadre d'évaluation de compétences web avec Laravel.

---

## 🚀 Idée d'évolution

Ce projet pourra à terme devenir une vraie plateforme de gestion des inscriptions, des relances par e-mail, et d'administration scolaire.
