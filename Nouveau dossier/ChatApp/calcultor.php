
<?php include "actions/calculatorAction.php";?>
<?php 
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
	
	<title>QuickCal | Calculatrice</title>
</head>
<body>
	<aside class="navbar_near">
		<div class="title">QuickCal</div>
		<nav class="near">
			<ul>
				<li> <a href="#"></a> </li>
				<li> <a href="calcultor.php">Calculatrice</a> </li>
				<li> <a href="users.php">Discussion</a> </li>
				<li> <a href="parametre.php">Parametre</a> </li>
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
					<button class="pass" id="delet" >del</button>
					<button class="pass btn" id="(">(</button>
					<button class="pass btn" id=")">)</button>
					<button class="pass btn" id="/">/</button>
					<button class="pass " id="sin" >sin()</button>
				</div>
				<div>
					<button name="btn" class="btn" id="7">7</button>
					<button name="btn" class="btn" id="8">8</button>
					<button name="btn" class="btn" id="9">9</button>
					<button class="pass btn" id="*">X</button>
					<button class="pass " id="cos">cos()</button>
				</div>
				<div>
					<button name="btn" class="btn" id="4">4</button>
					<button name="btn" class="btn" id="5">5</button>
					<button name="btn" class="btn"id="6">6</button>
					<button class="pass btn" id="-">-</button>
					<button class="pass  "  id="abs">abs</button>
				</div>
				<div>
					<button name="btn" class="btn" id="1">1</button>
					<button name="btn" class="btn" id="2">2</button>
					<button name="btn" class="btn"id="3">3</button>
					<button class="pass btn" id="+">+</button>
					<button class="pass " id="sqrt" >sqrt()</button>
				</div>
				<div>
					<button class="btn" onclick="fct_py(this)" >Pi</button>
					<button class="btn" id="0">0</button>
					<button class="btn" id=".">,</button>
					<button class="pass  egal" id="equal" name="egal">=</button>
					<button class="pass " id="tan">tan()</button>
				</div>
			</div>
			<div class="right activ" id="right">
					<h2 >Historiques</h2>
  					<p class="historic"></p>
			</div>
		</div>
		</form>
	</main>
</body>
<script>
	const list_btn = document.querySelectorAll(".btn");
	const resultat = document.querySelector(".affiche");
	const equal = document.getElementById('equal')
	const delet = document.querySelector('#delet')
	const paranthese = document.querySelector(".parenthese")
	
	const text = document.querySelector(".egal")
	const hist = document.querySelector('.historic')
	
	cos.addEventListener('click', (e)=>{
		e.preventDefault()
		if(resultat.textContent != ""){
			resultat.textContent = Math.cos(resultat.textContent)
		}else{
			return false
		}
		return false
	})
	sin.addEventListener('click', (e)=>{
		e.preventDefault()
		if(resultat.textContent != ""){
			resultat.textContent = Math.sin(resultat.textContent)
		}else{
			return false
		}
		return false
	})
	tan.addEventListener('click', (e)=>{
		e.preventDefault()
		if(resultat.textContent != ""){
			resultat.textContent = Math.tan(resultat.textContent)
		}else{
			return false
		}
		return false
	})
	sqrt.addEventListener('click', (e)=>{
		e.preventDefault()
		if(resultat.textContent != ""){
			if(resultat.textContent <0){
				return false
			}else{
				resultat.textContent = Math.sqrt(resultat.textContent)
			}
		}else{
			return false
		}
		return false
	})
	
	list_btn.forEach((elt_btn)=>{
		elt_btn.addEventListener("click", (e)=>{
			e.preventDefault()
			resultat.textContent += e.target.id	
			hist.innerHTML = resultat.textContent 
		})
	});

	equal.addEventListener("click", (e)=>{
		e.preventDefault()
		resultat.textContent = eval(resultat.textContent)
		hist.innerHTML +=  "=" + resultat.textContent + "<br/>"
	});


	function fct_py(){
		let x = Math.PI
		let res = Math.round(x * 100) / 100
		resultat.textContent += res
	}
	delet.addEventListener('click', (e)=>{
		e.preventDefault()
		resultat.textContent = " "
	})


</script> 
</html>