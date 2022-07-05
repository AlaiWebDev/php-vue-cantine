# php-vue-cantine

Ce projet va servir d'énoncé pour un exercice donné à mes apprenants.  
Il intègre une partie frontend développée via le framework `Vuejs 3.x` et une partie en `PHP 8.1.4`.  
La BDD utilisée est hébergée sur `phpMyAdmin 5.3.0`.

Le projet consiste en une application de gestion des accès au service de restauration d'un établissement scolaire privé fictif.  
Les parents d'élèves peuvent s'inscrire sur l'application afin de disposer d'un espace de gestion de leur compte cantine pour leur(s) enfant(s).
La gestionnaire du service de restauration peut utiliser l'application pour :

- Communiquer avec les parents via un système de messagerie asynchrone ;
- Examiner et valider/rejeter une demande d'inscription ;
- Résilier l'inscription d'un enfant (en cas d'impayé trop élevé ou sur demande du tuteur légal).

L'application comprend une partie back-office permettant de gérer les comptes des utilisateurs.  
Le backend admin comprend 2 niveaux d'accès.  
Le niveau **gestionnaire** et le niveau **superadmin**.  

L'application est responsive smartphone+tablettes.
