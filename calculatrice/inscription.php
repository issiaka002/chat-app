<?php require "actions/inscriptionAction.php"; ?>

<!--video: https://www.youtube.com/watch?v=VnvzxGWiK54 -->
<!DOCTYPE html>
<html lang="fr">
<?php include "includes/header.php"; ?>
<body>
	<div class="container">
		<div class="title">QuickCal</div>
		
		<div class="form">
			<div class="message"><?php 
        if(isset($message)){ echo $message;}?></div>
			<form action="" method="post">
				<div class="info">
					<div class="field input first">
					<label for="">NomComplet</label>
					<input type="text" placeholder="Nom complet (facultatif)" name="nomcomplet">
				</div>
				<div class="field input last">
					<label for="">Pseudo</label>
					<input type="text" placeholder="Votre pseudo" name="pseudo" required>
				</div>
				</div>
				<div class="field input">
					<label for="">Adresse e-mail</label>
					<input type="text" placeholder="Votre email" name="email" required>
				</div>
				<div class="field input">
					<label for="">Mot de passe</label>
					<input type="password" placeholder="Votre mot de passe" name="passwd" required>
				</div>
				<div class="field">
					<label for="">Photo</label>
					<input type="file">
				</div>
				<div class="field btn">
					<input type="submit" value="Valider" name="valider">
				</div>


			</form>

		</div>
		<div class="link">Vous avez déja un compte? <a href="connection.php">Connectez-vous</a> 
			</div>
	</div>
</body>
</html>