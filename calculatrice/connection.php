<?php ?>
<?php include "actions/connectionAction.php"; ?>

<!DOCTYPE html>
<html lang="fr">
<?php include "includes/header.php"; ?>


<body>
	<div class="container">
		<div class="title">QuickCal</div>
		
		<div class="form">
		<div class="message"><?php 
        if(isset($_GET["id"])){ echo "inscription reussie, connectez-vous";}
    ?></div>
			<div class="message"><?php 
        if(isset($message)){ echo $message;}
    ?></div>
			<form action="" method="post">
				<div class="field input">
					<label for="">Pseudo</label>
					<input type="text" placeholder="Votre pseudo" name="pseudo_connexion" value="<?php if(isset($pseudo_connect)){echo $pseudo_connect;}?>">
				</div>
				<div class="field input">
					<label for="">Mot de passe</label>
					<input type="password" placeholder="Votre mot de passe" name="pwd_connexion">
					<i class="fas fa-eye"></i>	
				</div>
				<div class="field btn">
					<input type="submit" value="Se connecter" name="connecter">
				</div>
			</form>

		</div>
		<div class="link">Vous n'avez pas de compte? <a href="inscription.php">Inscrivez-vous</a> 
			</div>
	</div>
</body>
</html>