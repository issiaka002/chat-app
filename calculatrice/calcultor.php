<?php include "actions/calculatorAction.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/calcultrice.css">
	
	<title>QuickCal | Calculatrice</title>
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
		<form  method="post">
			<div class="container">
			<div><p id="affi" name="resultat" class='affiche'></p>
			</div>
			<div>
				<div>
					<button class="pass" id="delet" name="effacer">del</button>
					<button class="pass btn" id="(">(</button>
					<button class="pass btn" id=")">)</button>
					<button class="pass btn" id="/">/</button>
				</div>
				<div>
					<button name="btn" class="btn" id="7">7</button>
					<button name="btn" class="btn" id="8">8</button>
					<button name="btn" class="btn" id="9">9</button>
					<button class="pass btn" id="*">X</button>
				</div>
				<div>
					<button name="btn" class="btn" id="4">4</button>
					<button name="btn" class="btn" id="5">5</button>
					<button name="btn" class="btn"id="6">6</button>
					<button class="pass btn" id="-">-</button>
				</div>
				<div>
					<button name="btn" class="btn" id="1">1</button>
					<button name="btn" class="btn" id="2">2</button>
					<button name="btn" class="btn"id="3">3</button>
					<button class="pass btn" id="+">+</button>
				</div>
				<div>
					<button class="btn" onclick="fct_py(this)" >Pi</button>
					<button class="btn" id="0">0</button>
					<button class="btn" id=".">,</button>
					<button class="pass " id="equal" name="egal">=</button>
				</div>
			</div>
		</div>
		</form>
	</main>
</body>
<script>
	const list_btn = document.querySelectorAll(".btn");
	const resultat = document.querySelector(".affiche");
	const equal = document.getElementById('equal')
	const delet = document.querySelector('.delet')
	const paranthese = document.querySelector(".parenthese")
	

	
	list_btn.forEach((elt_btn)=>{
		elt_btn.addEventListener("click", (e)=>{
			e.preventDefault()
			resultat.textContent += e.target.id	
		})
	});

	equal.addEventListener("click", (e)=>{
		e.preventDefault()
		resultat.textContent = eval(resultat.textContent)
	});

	delet.addEventListener('click', (e)=>{
		e.preventDefault()
		resultat.textContent = " "
		return false
	})

	function fct_py(){
		let x = Math.PI
		let res = Math.round(x * 100) / 100
		resultat.textContent += res
	}
</script> 
</html>