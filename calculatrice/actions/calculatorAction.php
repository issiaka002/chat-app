<?php
session_start();
$bdd= new PDO ('mysql:host=127.0.0.1;dbname=quickcal_db;charset=utf8', 'root','');

//insertion dans la base de donnee
if(isset($_POST["egal"])){
    if(!empty($_POST['resultat'])){
        $resul = htmlspecialchars($_POST["resultat"]);
        $_SESSION['resul']= $resul;
        $dat = date( "d/m/Y H:i:s");
        $insert = $bdd->prepare("INSERT INTO  operation(opera, dateCal) VALUES (?, ?)");
        $insert->execute(array($resul, $dat));
    };
};

//modification dans la base de donnee
if(isset($_POST["effacer"])){
    if(!empty($_POST['resultat'])){
        $resul = htmlspecialchars($_POST["resultat"]);
        $_SESSION['resul']= $resul;
        $dat = date( "d/m/Y H:i:s");
        $req = $bdd->prepare('UPDATE operation SET resultat = :result, dateCal= :dte WHERE id = :idUser');
        $req->execute(array(
                                            'result' => $resul,
                                             'dte' => $dat,
                                             'idUers' => $_SESSION['id'] ));
    }
}