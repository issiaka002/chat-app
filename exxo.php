<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=etudiant;cahrset=utf8', 'root', '');
if(isset($_POST['valider'])){
    echo "connecter a la base de donnee";

}else{
    $message = "erreur";
}
?>

