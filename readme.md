## **Système de Gestion Scolaire Laravel** 

**LAVSMS** est développé pour les institutions éducatives comme les écoles et collèges, construit sur Laravel 8

## **Types d'Utilisateurs**

Il y a 6 types de comptes utilisateurs :

- **Administrateurs** (Super Admin & Admin)
- **Comptable**
- **Enseignant**
- **Élève**
- **Parent**

## **Prérequis** 

Vérifiez les prérequis Laravel 8 : https://laravel.com/docs/8.x

## **Installation**
- Installer les dépendances (`composer install`)
- Configurer les identifiants de base de données et les paramètres de l'application dans le fichier .env
- Migrer la base de données (`php artisan migrate`)
- Peupler la base de données (`php artisan db:seed`)

## **Identifiants de Connexion**
Après le seeding, les identifiants de connexion sont les suivants :

| Type de Compte  | Nom d'utilisateur | Email | Mot de passe |
| ------------- | -------- | ----- | -------- |
| Super Admin | cj | cj@cj.com | cj |
| Admin | admin | admin@admin.com | cj |
| Enseignant | teacher | teacher@teacher.com | cj |
| Parent | parent | parent@parent.com | cj |
| Comptable | accountant | accountant@accountant.com | cj |
| Élève | student | student@student.com | cj |

## **Fonctions des Comptes** 

### **-- SUPER ADMIN**
- Seul le Super Admin peut supprimer n'importe quel enregistrement
- Créer n'importe quel compte utilisateur
 
### **-- Administrateurs (Super Admin & Admin)**

- Gérer les classes/sections d'élèves
- Voir les bulletins des élèves
- Créer, modifier et gérer tous les comptes utilisateurs et profils
- Créer, modifier et gérer les Examens et Notes
- Créer, modifier et gérer les Matières
- Gérer le tableau d'affichage de l'école
- Les avis sont visibles dans le calendrier du tableau de bord
- Modifier les paramètres système
- Gérer les Paiements et frais

### **-- COMPTABLE**
- Gérer les Paiements et frais
- Imprimer les Reçus de Paiement

### **-- ENSEIGNANT**
- Gérer sa propre Classe/Section
- Gérer les Dossiers d'Examen pour ses propres Matières
- Gérer l'Emploi du Temps s'il est assigné comme Professeur Principal
- Gérer son propre profil
- Télécharger des Matériels d'Étude

### **-- ÉLÈVE**
- Voir le profil de l'enseignant
- Voir ses propres matières de classe
- Voir ses propres notes et emploi du temps de classe
- Voir les Paiements
- Voir le tableau d'affichage et les événements scolaires dans le calendrier
- Gérer son propre profil

### **-- PARENT**
- Voir le profil de l'enseignant
- Voir le bulletin de son enfant (Télécharger/Imprimer PDF)
- Voir l'Emploi du Temps de son enfant
- Voir les paiements de son enfant
- Voir le tableau d'affichage et les événements scolaires dans le calendrier
- Gérer son propre profil

## **Contribuer**

Vos contributions et suggestions sont les bienvenues. Veuillez utiliser Pull Request

## **Vulnérabilités de Sécurité**

Si vous découvrez une vulnérabilité de sécurité dans MANAGEMENT, veuillez envoyer un e-mail  via epiphanassou068@gmail.com. Toutes les vulnérabilités de sécurité seront traitées rapidement.

## **Contact**
- Téléphone : +22898337866 /96986875
