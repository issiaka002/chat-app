
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php';  ?>
<style>
	body{
		background-image: url('image/image2.jpg');
	}
	.titre{
    display: flex;
    flex-direction: column;
    width: 80vw;
    min-height: 100vh;
    justify-content: center;
    align-items: center;
	
}

h1{
    font-size: 115px;
	color: white;
	font-family: Impact, 'Arial Narrow Bold', sans-serif;
	font-weight: 400;
}
h1 span{
	color: brown;
	font-size: 120px;
	font-family: Impact, 'Arial Narrow Bold', sans-serif;
}
.titre .content p{
	color: whitesmoke;
}
.titre .content p a{
	color: blueviolet;
}
.titre .content h1 img{
	width: 170px;
	height: auto;
	border-radius: 50%;
	color: #f7f7f7;
}
</style>
<body>
	<div class="titre">
		<div class="content">
		<h1> Bienvenue sur <span>Quick</span>Cal <img src="image/logov.jpg" alt="logo QuikCal"> </h1>
		<p>Merci de visiter notre site. </p>
		<p>Vivez une experience incroyable avec QuickCal, <a href="logup.php">Incrivez-vous</a> et commencez à faire toutes sortes de calcul scientifique ... </p>
		</div>
	</div>
</body>
</html>