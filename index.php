<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 5 : private & getters"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
    class Livre {
        private $nom;
        private $edition;
        private $auteur;
        private $dateParution;

        public function getEdition(){
            return $this->edition;
        }
        public function getDateParution(){
            return $this->dateParution;
        }

        public function __construct($nom,$edition,$auteur,$dateParution){
            $this->nom = $nom;
            $this->edition = $edition;
            $this->auteur = $auteur;
            $this->dateParution = $dateParution;
        }

        public function __toString(){
            $txt = "Nom : " . $this->nom. "<br />";
            $txt .= "Edition : " . $this->edition. "<br />";
            $txt .= "Auteur : " . $this->auteur. "<br />";
            $txt .= "Date : " . $this->dateParution. "<br />";
            return $txt;
        }
    }

    $livre1 = new Livre("tonton","babibar","toto",2000);
    $livre2 = new Livre("tonton2","babibar","tata",2001);
    $livre3 = new Livre("abelix","bebat","titi",2000);
    $livre4 = new Livre("abelix2","bebat","titi",2000);
    $livre5 = new Livre("abelix3","bebat","tutu",2001);
    $librairie = [$livre1,$livre2,$livre3,$livre4,$livre5];

    function afficherLibrairie($livres){
        echo "------------------- <br />";
        foreach($livres as $livre){
            echo $livre;
            echo "------------------- <br />";
        }
    }

    function afficherLivres($livres,$edition,$date){
        echo "------------------- <br />";
        foreach($livres as $livre){
            if(($livre->getEdition() === $edition || $edition==="tous") && ($livre->getDateParution() === (int)$date || $date ==="tous")){
                echo $livre;
                echo "------------------- <br />";
            }
        }
    }
?>

<form action="" method="POST">
    <div class="form-group">
        <label>Edition : </label>
        <select name="edition">
            <option value="tous">tous</option>
            <option value="babibar">babibar</option>
            <option value="bebat">bebat</option>
        </select>
    </div>

    <div class="form-group">
        <label>Date de parution : </label>
        <select name="dateParution">
            <option value="tous">tous</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" value="Valider">
</form>

<?php
    if(isset($_POST['edition']) && !empty($_POST['edition']) &&
    isset($_POST['dateParution']) && !empty($_POST['dateParution'])){
        afficherLivres($librairie, $_POST['edition'],$_POST['dateParution']);
    } else {
        afficherLibrairie($librairie);
    }

?>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
