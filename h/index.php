<?php

use Livre as GlobalLivre;

ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 5 : private & getters"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
class Livre
{
    private $nom;
    private $edition;
    private $auteur;
    private $date;

    public function __construct($nom, $edition, $auteur, $date)
    {
        $this->setNom($nom);
        $this->setEdition($edition);
        $this->setAuteur($auteur);
        $this->setDate($date);
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEdition()
    {
        return $this->edition;
    }


    public function setEdition($edition)
    {
        $this->edition = $edition;

        return $this;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }


    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}

$livre1 = new Livre('tonton', 'babibar', 'toto', 2000);
$livre2 = new Livre('tonton2', 'babibar', 'tata', 2001);
$livre3 = new Livre('abelix', 'bebat', 'titi', 2000);
$livre4 = new Livre('abelix2', 'bebat', 'titi', 2000);
$livre5 = new Livre('abelix3', 'bebat', 'tutu', 2001);

$livres = [$livre1, $livre2, $livre3, $livre4, $livre5];

function afficherLibrairie($arrayBooks)
{
    foreach ($arrayBooks as $book) {

        echo 'Nom : ' . $book->getNom() . '<br>';
        echo 'Edition : ' . $book->getEdition() . '<br>';
        echo 'Auteur : ' . $book->getAuteur() . '<br>';
        echo 'Date : ' . $book->getDate() . '<br>';
        echo '--------------- <br>';
    }
};

function afficherLivres($arrayBooks, $edition, $date)
{
    foreach ($arrayBooks as $book) {
      //  if ($book->getEdition() === $edition && $book->getDate() === (int)$date) { // dans getEdition() et getDate() il n'y a pas "tous", 
        // donc il faut gérer le cas où $edition et $date envoyées par POST soient = "tous". ATTENTION AUX PARENTHESES ENTRE LA PARTIE EDITION ET LA PRTIE DATE !! 
        if (($book->getEdition() === $edition || $edition === "tous") && ($book->getDate() === (int)$date || $date==="tous")) { 
            // Mettre $date en int car la value "date" envoyée par POST est une chaine de caratctère
            // alors que dans l'instanciation ca a été des entiers.
            // On aurait pu mettre lors de l'instanciation des "2000", "2001" au lieu de 2000 et 2001. 
            echo 'Nom : ' . $book->getNom() . '<br>';
            echo 'Edition : ' . $book->getEdition() . '<br>';
            echo 'Auteur : ' . $book->getAuteur() . '<br>';
            echo 'Date : ' . $book->getDate() . '<br>';
            echo '--------------- <br>';
        }
    }
};

//afficherLibrairie($livres);
//afficherLivres($livres, 'bebat', 2000);


// Traitement des données issues du formulaire
if (isset($_POST['editions']) && !empty($_POST['editions']) && isset($_POST['annees']) && !empty($_POST['annees'])) {
    afficherLivres($livres, $_POST['editions'], $_POST['annees']);
} else {
    afficherLibrairie($livres);
};


?>

<form action="index.php" method="POST">
    <div class="row">
        <div class="col">
            <label>Veuillez choisir un éditeur :
                <select name="editions">
                    <option value="">--Choisir une option--</option>
                    <option value="tous">Tous</option>
                    <option value="babibar">Babibar</option>
                    <option value="bebat">Bebat</option>
                </select>
            </label>
        </div>
        <label>Veuillez choisir une année :
            <select name="annees">
                <option value="">--Choisir une option--</option>
                <option value="tous">Tous</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
            </select>
        </label>
    </div>
    <div class="row">
        <div class="col">
            <input type="submit" class="btn btn-primary" value="Valider">
        </div>
    </div>
</form>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../../global/common/template.php";
?>