# 🚀 Coding Tool Box – Guide d'installation

Bienvenue dans **Coding Tool Box**, un outil complet de gestion pédagogique conçu pour la Coding Factory.  
Ce projet Laravel inclut la gestion des groupes, promotions, étudiants, rétro (Kanban), QCM  dynamiques, et bien plus.

---

## 📦 Prérequis

Assurez-vous d’avoir les éléments suivants installés sur votre machine :

- PHP ≥ 8.1
- Composer
- MySQL ou MariaDB
- Node.js + npm (pour les assets frontend si nécessaire)
- Laravel CLI (`composer global require laravel/installer`)

---

## ⚙️ Installation du projet

Exécutez les étapes ci-dessous pour lancer le projet en local :

### 1. Cloner le dépôt

```bash
git clone https://m_thibaud@bitbucket.org/m_thibaud/projet-web-2025.git
cd coding-tool-box
cp .env.example .env
```

### 2. Configuration de l'environnement

```bash
✍️ Ouvrez le fichier .env et configurez les paramètres liés à votre base de données :

DB_DATABASE=nom_de_votre_bdd
DB_USERNAME=utilisateur
DB_PASSWORD=motdepasse
```

### 3. Installation des dépendances PHP

```bash
composer install
```

### 4. Nettoyage et optimisation du cache

```bash
php artisan optimize:clear
```

### 5. Génération de la clé d'application

```bash
php artisan key:generate
```

### 6. Migration de la base de données

```bash
php artisan migrate
```

### 7. Population de la base (Données de test)

```bash
php artisan db:seed
```

---

## 💻 Compilation des assets (si nécessaire)

```bash
npm install
npm run dev
```

---

## 👤 Comptes de test disponibles

| Rôle       | Email                         | Mot de passe |
|------------|-------------------------------|--------------|
| **Admin**  | admin@codingfactory.com       | 123456       |
| Enseignant | teacher@codingfactory.com     | 123456       |
| Étudiant   | student@codingfactory.com     | 123456       |

---

## 🚧 Fonctionnalités principales

- 🔧 Gestion des groupes, promotions, étudiants
- 📅 Vie commune avec système de pointage
- 📊 Bilans semestriels étudiants via QCM générés par IA
- 🧠 Génération automatique de QCM par langage sélectionné
- ✅ Système de Kanban pour les rétrospectives
- 📈 Statistiques d’usage et suivi pédagogique

---

## 📚 Story 

### 📕 Story 1

✅ Tout fait et fonctionnelle.

### 📙 Story 2

✅ Tout fait et fonctionnelle 
❌ mais problème au niveau des roles : ça affiche la vue 'admin' au lieu de 'teacher' dans le dashboard.

### 📗 Story 3

✅ Fait et fonctionnelle 
❌ sauf le bouton modifier qui ne fonctionne pas et le mail qu'y n'est pas fait.

### 📘 Story 4

✅ Tout fait et fonctionnelle.

### 📕 Story 5

✅ Tout fait et fonctionnelle.

### 📙 Story 6

✅ Tout fait, 
❌ mais ne fonctionne pas : le code est écrit mais cela ne fonctionne pas. 

Ayant eu des problèmes avec Git la premiere semaine, j'ai donc dû reclone mon projet et sur ce premier repository, j'avais 6 ou 7 commit.
Donc avec ceux de maintenant, j'ai environ 20 commit.
