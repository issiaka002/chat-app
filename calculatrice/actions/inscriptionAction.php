<?php
session_start();
$bdd= new PDO ('mysql:host=127.0.0.1;dbname=quickcal_db;charset=utf8', 'root','');


if(isset($_POST['valider'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nomcomplet = htmlspecialchars($_POST['nomcomplet']);
    $email = htmlspecialchars($_POST['email']);
    $pwd = sha1($_POST['passwd']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['passwd'])){
        $pseudolenght=strlen($pseudo);
        if($pseudolenght <= 50){

                $requetMail = $bdd->prepare("SELECT * FROM users WHERE email=?");
                $requetMail->execute(array($email));
                $mailexist= $requetMail->rowCount();
                if($mailexist==0){

                    $requetPwd = $bdd->prepare("SELECT * FROM users WHERE passwd=?");
                    $requetPwd->execute(array($pwd));
                    $pwdexist= $requetPwd->rowCount();
                    if($pwdexist==0){
                        $_SESSION['pseudo']= $_POST['pseudo'];
                        $_SESSION['email']= $_POST['email'];
                        $insert = $bdd->prepare("INSERT INTO users(pseudo, email, passwd) VALUES (?, ?, ?)");
                        $insert->execute(array($pseudo, $email, $pwd));
                        $message="inscription reussie,compte crée";
                        header('location:connection.php?id='.$_SESSION['pseudo']);
                        exit();
                    }
                    else{
                        $message="mot de passe déja utilisé";
                    }
                }
                else{
                    $message="Adresse mail deja utilisé";
                }
            }else{
            $message="votre pseudo est trop long !!";
        }
    }
    else{
        $message = "veuillez remplir tous les champs s'il vous plait!!";
    }
}


?>