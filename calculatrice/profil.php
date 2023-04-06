<?php include "actions/profilAction.php";  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/calcultrice.css">
	
	<title>QuickCal | Profil 👨🏻‍🤝‍👨🏻👨🏻‍🤝‍👨🏻</title>
	<style>
				.containerAutre .infos .info .info_perso{
	margin-top: 34px;
}
.containerAutre .infos .info .info_perso ul{
	font-size: 14px;
	margin-bottom: 9px;
}
.containerAutre .infos .info .deconnect{
	border: none;
	background-color: transparent;
	margin-top: 2px;
	cursor: pointer;
	padding: 5px;
}
	</style>
</head>
<body>
	<aside class="navbar_near">
		<div class="title">QuickCal</div>
		<nav class="near">
			<ul>
				<li> <a href="profil.php">Profil</a> </li>
				<li> <a href="calcultor.php">Calculer</a> </li>
				<li> <a href="historique.php">Historiques</a> </li>
				<li> <a href="discussion.php">Discussion</a> </li>
				<li> <a href="parametre.php">Paramètres</a> </li>
				<li> <a href="apropos.php">A propos</a> </li>
			</ul>
		</nav>
	</aside>
	<main>
    <div class="containerAutre"> 
		<h2>Mon profil</h2>
		<div class="infos">
			<div class="info">
				<p> <img src="image/logo.webp" alt="Photo de profil" class="img_profil"> </p>
				<p class="info_perso"> 
					<ul>
						<li>Peudo: <?php echo $_SESSION['pseudo']; ?> </li>
						<li>Email: <?php echo $_SESSION['email']; ?></li>
						<li>Status: niveau 0</li>
						<form action="" method="post">
							<input type="button" value="Deconnexion" name="deconnexion" id="deconnect">
						</form>
					</ul> 
				</p>
			</div>
			<p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, quam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, optio. </p>
		</div>
	</div>
    </main>

</body>
 

</html>