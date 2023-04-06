<?php
session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:connection.php.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/calcultrice.css">
	
	<title>QuickCal | A propos</title>
	<style>
		.containerAutre .contenu{
			font-size: 16px;
			color: gray;
		}
		.containerAutre  ul{
			font-size: 19px;
			color: gray;
			font-weight: bold;
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
		<p class="contenu">
		Cette calculatrice scientifique est un type de calculatrice électronique possédant diverses possibilités d'applications scientifiques : fonctions trigonométriques usuelles, calcul de logarithmes ou la capacité de tracer des graphiques.
		Elle a été dévéloppé par quatre eléve ingenieurs de STIC (Science Technologique de l'Information et de la Communication) lors d'un projet sur la programmation web
		<h3>Equipe:</h3>
		<ul>
			<li>Sidibe issiaka </li>
			<li>Ouattara n'golo aboubacar</li>
			<li>Sylla mawa</li>
			<li>Soumahourou mahoua ibrahim</li>
		</ul>
		</p>
	</div>
    </main>

</body>
 

</html>