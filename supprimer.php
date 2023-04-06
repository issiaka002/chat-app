<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=etudiant;cahrset=utf8', 'root', '');

if(isset($_GET['numEleve']) AND $_GET['numEleve']>0 ){
	$id = intval($_GET['numEleve']);
	$supprime = $bdd->prepare('DELETE FROM eleve WHERE id=? LIMIT 1');
	$supprime->execute(array($id));
	$mes = "l'eleve a ete supprime avec supprime";
	header('location:tout.php');
	exit();
	

}else{
	header('location:tout.php');
	exit();
}


?>

<!-- 

<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page web</title>
    <link rel="stylesheet" href="exo.css">
</head>
<body>
    <form action="" method="POST">
        <div class="container">
            <h1 style="text-align:center ;">Formulaire</h1>
            <p style="color:green ;"><?php if(isset($message)){ echo $message;} ?> </p>
            
            <div class="milieu">
            <div class="content1">

            <table class="table1">
                <tbody>
                    <tr class="inp">
                        <td><label for="m">
                            Matricule:
                            
                        </label> <br></td>
                        <td><input type="text" name="matricule" id="n"></td>
                    </tr>
                    <tr></tr>
                    <tr class="inp">
                        <td><label for="n">
                            Nom:
                            
                        </label><br></td>
                        <td><input type="text" name="nom" id="n"></td>
                    </tr>
                    <tr class="inp">
                        <td>  <label for="p">
                            Prénom:
                            
                        </label><br></td>
                        <td><input type="text" name="prenom" id="p"></td>
                    </tr>
                    <tr class="inp">
                        <td><label for="s">
                            Sexe:
                            
                        </label></td>
                        <td><input type="radio" name="sexe" id="s" value="m">M
                            <input type="radio" name="sexe" value="f" id="s">F</td>
                    </tr>
                </tbody>
            </table>   
            </div>
            <div class="content2">
                <table class="table1">
                    <tbody>
                        <tr class="inp">
                            <td>  <label for="p">
                                Filière/Classe:
                                
                            </label><br></td>
                            <td><input type="text" name="classe" id="p"></td>
                        </tr>
                        <tr class="inp">
                            <td><label for="e">
                                Email institutionnel:
                                
                            </label><br></td>
                            <td><input type="email" name="email" id="e"></td>
                        </tr>
                        <tr class="inp">
                            <td><label for="Pwd1">
                            Mot de passe:
                                
                            </label></td>
                            <td><input type="password" name="password1" id="pwd1"></td>
                        </tr>
                        <tr class="inp">
                            <td><label for="Pwd2">
                            Confirmer mot de passe:   
                            </label></td>
                            <td><input type="password" name="password2" id="pwd2"></td>
                        </tr>
                    </tbody>
                </table>
                
                
                 
               
            </div>
            </div>
            <div class="bouton">
                <input type="submit" value="Annuler">
                <input type="submit" value="valider" name="valider">
                
            </div>
        </div>
    </form>

    <div class="liste" style="margin:0 auto;margin-top:100vh;">

    	<span style="color:green ;text-align: center;"><?php if(isset($mes)){ echo $mes; }   ?> </span>
        <table class="table2">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>sexe</th>
                    <th>Filière/classe</th>
                    <th>Email</th>
                    <th>telephone</th>
                    <th class="dernier">option</th>
                </tr>
            </thead>
            <tbody>
            	<?php 
            	$affichage = $bdd->query("SELECT * FROM eleve ORDER BY id DESC ")->fetchALL();

            	 ?>
            	 <?php foreach ($affichage as $elmt):
            	 ?>
                <tr>
                    <td><?php echo $elmt['matricule']; ?> </td>
                    <td><?php echo $elmt['nom']; ?></td>
                    <td><?php  echo $elmt['prenom']; ?></td>
                    <td> t </td>
                    <td><?php echo $elmt['classe']; ?></td>
                    <td><?php  echo $elmt['email']; ?> </td>
                    <td>0215478562 </td>
                    <td> <a href="supprimer.php?numEleve=<?= $elmt['id']; ?>" >Delete</a> </td>
                </tr>
            <?php endforeach ?>

            </tbody>
        </table>
    </div>
   
</body>
</html> -->