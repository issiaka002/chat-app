<?php 
session_start();
$bdd  = new PDO('mysql:host=127.0.0.1;dbname=quickcal_db;charset=utf8','root','');
?>

<?php ?>
<?php ?>

<?php
if(isset($_POST['connecter'])){
    $pseudo_connect = htmlspecialchars($_POST['pseudo_connexion']);
    $pwd_connect = sha1($_POST['pwd_connexion']);
    if(!empty($_POST['pseudo_connexion']) AND !empty($_POST['pwd_connexion'])){
        
        $ma_req = $bdd->prepare("SELECT * FROM users WHERE pseudo=? AND passwd=?");
        $ma_req->execute(array($pseudo_connect, $pwd_connect));
        $pseudo_exit = $ma_req->rowCount();
        if($pseudo_exit==1){
            $info_users = $ma_req->fetch();
            $_SESSION['id']= $info_users['id'];
            $_SESSION['pseudo']= $info_users['pseudo'];
            $_SESSION['email']= $info_users['email'];

            header('location: profil.php?id='.$_SESSION['id']);
            exit();
            
        }else{
            $message ="pseudo ou mot de passe incorrect !!";
        }
        

    }else{
        $message = "veuillez remplir tous les champs !!";
    }

}

?>
