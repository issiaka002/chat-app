<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/calcultrice.css">
	
	<title>QuickCal | Paramètre</title>
	<style>
		.containerAutre  ul li a{
			margin-top: 40px;
			font-size: 15px;
			color: gray;
			font-weight: bold;
			text-decoration: none;
			cursor: pointer;
		}
		.containerAutre  ul li a:hover{
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<aside class="navbar_near">
		<div class="title">QuickCal</div>
		<nav class="near">
			<ul>
				<li> <a href="#"></a> </li>
				<li> <a href="calcultor.php">Calculatrice</a> </li>
				<li> <a href="discussion.php">Discussion</a> </li>
				<li> <a href="parametre.php">Paramètres</a> </li>
				<li> <a href="apropos.php">A propos</a> </li>
			</ul>
		</nav>
	</aside>
	<main>
    <div class="containerAutre"> 
		<ul>
			<li> <a href="#">Modifier Informations personelles</a> </li>
		</ul>
	</div>
    </main>

</body>
 

</html>