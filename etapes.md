1) dans le fichier booking.phtml, rajouter l'id de la réservation dnas un attribut data

2) modifier l'event sur le btnModif, le click sur ces boutons va lancer showFormModif au lieu de modifUserBooking

3) créer la fonction showFormModif:
    - récupère la valeur de l'attibut data et la stocke dnas une variable
    - on fait une requête ajax qui appelle index.php?.... en lui passant 2 paramètres : page et lid de la reservation
    - côté php, l'idée est d'aller chercher toutes les infos de cette réservation, d'inclure un template qui contient le formulaire pré rempli
    - JS : .then on affiche ce qu'a renvoyé php à la place de l'autre formulaire innerHTML
    
/***valider l'update***/

1) dans le formulaire d'update, sur le bouton, vous allez rajouter un name="modifier"

2)dans addBooking sur le controller, il faudra faire une condition, si le bouton modifier existe, alors on update sinon on add