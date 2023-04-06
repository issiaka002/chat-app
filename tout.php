<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=etudiant;cahrset=utf8', 'root', '');
session_start();



if(isset($_POST['valider'])){
	if (!empty($_POST['matricule']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['sexe']) AND !empty($_POST['classe']) AND !empty($_POST['email']) AND !empty($_POST['password1']) AND !empty($_POST['password2'])){

		$nom  = htmlspecialchars($_POST['nom']);
		$matricule  = htmlspecialchars($_POST['matricule']);
		$prenom  = htmlspecialchars($_POST['prenom']);
		$classe  = htmlspecialchars($_POST['classe']);
		$email  = htmlspecialchars($_POST['email']);
		$password2 = htmlspecialchars($_POST['password2']);
		$password1  = htmlspecialchars($_POST['password1']);

		$sexe = $_POST['sexe'];
		if($password2 == $password1){
			$hash_password = password_hash($password1, PASSWORD_BCRYPT);
			$req = $bdd->prepare('SELECT * FROM eleve WHERE email=?');
			$req->execute(array($email));
			$email_exit = $req->rowCount();
			if($email_exit == 0){
				$_SESSION['nom'] = $nom;
				$_SESSION['matricule'] = $matricule;

				$insert = $bdd->prepare("INSERT INTO eleve (matricule, nom, prenom, sexe,classe, email, motdepasse) VALUES (?, ?, ?, ?, ?, ?, ?)");
				$insert->execute(array($matricule, $nom, $prenom, $sexe, $classe, $email, $hash_password));
				$message = "l'eleve été enregistrer avec succès";
			}else{
				$message = "L'eleve exite deja !!!";

			}	
		}else{
			$message ="les mot de passe doivent etre identiques !!!";
		}




	}else{
		$message = "veuillez remplir tous les champs s'il vous plait !!!!";
	}
}



// if(isset($_FILES['photo'])){
// 			$nom_temporaire = $_FILES['photo']['tmp_name'];
// 			$nom_reel_destination = 'upload_image/'.$FILES['photo']['name'];

// 			$deplacement = move_uploaded_file($nom_temporaire, $nom_reel);
// 			if($deplacement){


// 		    }else{
// 				$message = "Erreur de téléchargement du fichier/ veuillez sélectionner a nouveau une photo !!!";
// 		    }

// 		}else{

// 			$message = "Veuillez sélectionner une photo !!!";
// 		}




?>

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
								<td><input type="radio" name="sexe" id="s" value="M">M
									<input type="radio" name="sexe" value="F" id="s">F</td>
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
            <!-- <form method="FILE" action="#" enctype="multipart/form-data" >
		    	<div>
		    		<input type="file" name="photo">
		    	</div>
		    </form> -->

		    <div class="bouton">
		    	<input type="submit" value="Annuler">
		    	<input type="submit" value="valider" name="valider">

		    </div>
		</div>
	</form>

	<div class="liste" style="margin:0 auto;margin-top:100vh;">
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

						<td><?php echo strtoupper($elmt['matricule']); ?> </td>
						<td><?php echo strtoupper($elmt['nom']); ?></td>
						<td><?php  echo strtoupper($elmt['prenom']); ?></td>
						<td> <?php  echo strtoupper($elmt['sexe']); ?> </td>
						<td><?php echo strtoupper($elmt['classe']); ?></td>
						<td><?php  echo strtoupper($elmt['classe']); ?> </td>
						<td> inconnu </td>
						<td> <a id='lien' href="supprimer.php?numEleve=<?= $elmt['id']; ?>" >Delete</a> <a id='lien' href="edit.php?numEleve=<?= $elmt['id']; ?>" >Edit</a></td>
					</tr>
				<?php endforeach ?>

			</tbody>
		</table>
	</div>


</body>
<script>
	// const lien = document.querySelector('#lien')
	// lien.addEventListener('click', (e)=>{
	// 	e.preventDefault()
	// })
	const liens = document.querySelectorALL('#lien')
	liens.forEach((lien)=>{

		lien.addEventListener('click', (e)=>{
			e.preventDefault()
		});
	})
</script>
</html>