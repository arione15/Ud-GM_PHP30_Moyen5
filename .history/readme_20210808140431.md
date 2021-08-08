# Exercice Moyen 5 : formulaire de filtrage

"Créer une bibliothèque de livres. Les filtrer selon la date, la maison d'édition.

## I. Environnement de développement

* PHP 7.4
* POO

## II. Démarches
- Créer ne classe pour gérer les livres : `__construct()` + `__toString()`
- Utiliser un formulaire (avec `POST`)
- Mettre toutes les nouvelles instances `$livre` dans un tableau `$livres`
- Créer une fonction pour afficher cette librairie : `afficherLibrairie($livres)`
- Créer la fonction `__toString()` qui permet d'afficher les objets $livre sinon on procède à l'afficahge en utilisant les getter/setters.
- Créer une fonction qui affiche les livres selon la date et l'édition : `afficherLivres($livres, $edition, $date)`


## III. Points à retenir

1. On filtre les livres selon certaines propriétés => donc on doit comparer (`if`) ces propriétés des livres parcourus (`foreach`) avec les valeurs de ces propriétés qui se trouvent en paramètre de la fonction. Les arguments de la fonction vont être, lors de l'appel de la fonction, renseignés par `$_GET` ou `$_POST`.

2. Mettre `$date` en `int` car la value `date` des options envoyées par `POST` est une chaîne de caratctères, alors que dans l'instanciation ca a été des entiers.
On aurait pu mettre lors de l'instanciation des "2000", "2001" au lieu de 2000 et 2001. 

1. **_(14'15)_** : Gérér le cas ou les values des options du select sont `tous`
