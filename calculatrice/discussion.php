<?php 
// if(!isset($_SESSION['pseudo'])){
//     header('location:connection.php');
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/calcultrice.css">
	
	<title>QuickCal | Historique</title>
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
	<div class="container">
		<section class="users">
            <header>
                <div class="content">
                    <img src="#" alt="..">
                    <div class="details">
                        <span>
                            coding nepal
                        </span>
                        <p>Active now</p>
                    </div>
                </div>
                <a href="#" class="logout">logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" name="" id="" placeholder="Enter name to search...">
                <button>ok</button>
            </div>
        </section>
	</div>
    </main>

</body>
 

</html>