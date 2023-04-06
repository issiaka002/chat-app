<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=etudiant;cahrset=utf8', 'root', '');
session_start();


if(isset($_GET['numEleve']) AND $_GET['numEleve']>0 ){
	$get_id = intval($_GET['numEleve']);
	$modif = $bdd->prepare('SELECT * FROM eleve WHERE id = ?');
	$modif->execute(array($get_id));
	$tab_eleve = $modif->fetch();

}else{
	header('location:tout.php');
	die();
}


?>
 <?php if(isset($_POST['annuler'])){
		    	header("location:tout.php");
		    	die();
		    } ?>
		    <?php  
		    if(isset($_POST['mise_a_jour'])){
		    	if (!empty($_POST['matricul']) AND !empty($_POST['nomm']) AND !empty($_POST['pre_nom']) AND !empty($_POST['sex']) AND !empty($_POST['class']) AND !empty($_POST['mail']) AND !empty($_POST['pwd1']) AND !empty($_POST['pwd2'])){

		    		$nomm  = htmlspecialchars($_POST['nomm']);
		    		$matricul  = htmlspecialchars($_POST['matricul']);
		    		$pre_nom  = htmlspecialchars($_POST['pre_nom']);
		    		$class  = htmlspecialchars($_POST['class']);
		    		$mail  = htmlspecialchars($_POST['mail']);
		    		$pwd2 = htmlspecialchars($_POST['pwd2']);
		    		$pwd1  = htmlspecialchars($_POST['pwd1']);

		    		$sex = $_POST['sex'];
		    		if($pwd2 == $pwd1){
		    			$hash_pwd = password_hash($pwd1, PASSWORD_BCRYPT);
		    			$reqq = $bdd->prepare('SELECT * FROM eleve WHERE email=?');
		    			$reqq->execute(array($mail));
		    			$idd = $reqq->fetch();
		    			$mail_exit = $reqq->rowCount();
		    			if($mail_exit == 0){
		    				$_SESSION['nom'] = $nom;
		    				$_SESSION['matricule'] = $matricule;


		    				$update = $bdd->prepare("UPDATE eleve SET matricule=?, nom=?, prenom=?, sexe=?, classe=?, email=?, motdepasse=? WHERE id=$get_id LIMIT 1");
		    				$update->execute(array($matricul, $nomm, $pre_nom, $sex, $class, $mail, $hash_pwd));
		    				$message = "Modification effectuée avec succès";
		    				header("location:tout.php");
		    				exit();
		    			}else{
		    				$message = "L'eleve n'exite pas !!!";

		    			}	
		    		}else{
		    			$message ="les mot de passe doivent etre identiques !!!";
		    		}




		    	}else{
		    		$message = "veuillez remplir tous les champs s'il vous plait !!!!";
		    	}
		    }

		    ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
								<td><input type="text" name="matricul" id="n" value="<?php echo $tab_eleve['matricule']; ?>"></td>
							</tr>
							<tr></tr>
							<tr class="inp">
								<td><label for="n">
									Nom:

								</label><br></td>
								<td><input type="text" name="nomm" id="n" value="<?php echo $tab_eleve['nom']; ?>"></td>
							</tr>
							<tr class="inp">
								<td>  <label for="p">
									Prénom:

								</label><br></td>
								<td><input type="text" name="pre_nom" id="p" value="<?php echo $tab_eleve['prenom']; ?>" ></td> 
							</tr>
							<tr class="inp">
								<td><label for="s">
									Sexe:

								</label></td>
								<td><input type="radio" name="sex" id="s" value="M">M
									<input type="radio" name="sex" value="F" id="s">F</td>
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
									<td><input type="text" name="class" id="p" value="<?php echo $tab_eleve['classe']; ?>"></td>
								</tr>
								<tr class="inp">
									<td><label for="e">
										Email institutionnel:

									</label><br></td>
									<td><input type="email" name="mail" id="e" value="<?php echo $tab_eleve['email']; ?>"></td>
								</tr>
								<tr class="inp">
									<td><label for="Pwd1">
										Nouveau mot de passe:

									</label></td>
									<td><input type="password" name="pwd1" id="pwd1"></td>
								</tr>
								<tr class="inp">
									<td><label for="Pwd2">
										Confirmer mot de passe:   
									</label></td>
									<td><input type="password" name="pwd2" id="pwd2"></td>
								</tr>
							</tbody>
						</table>




					</div>
				</div>
            <!-- <form method="FILE" action="#" enctype="multipart/form-data" >
		    	<div>
		    		<input type="file" name="photo">
		    	</div>
		    </form> -->


		    <div class="bouton">
		    	<input type="submit" value="Annuler" name="annuler">
		    	<input type="submit" value="Mise a jour" name="mise_a_jour">

		    </div>
		</div>
	</form>

</body>
</html>

