<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <style>
    .navbar_near{
	position: relative;
	display: flex;
	flex-direction: column;
	background-color: white;
	border-radius: 12px;
	box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
	padding: 0.5rem ;
	
	width: 15rem;
	height: 29rem;
	margin-left: 4rem;
	margin-right: 3rem;
	margin-top: 2rem;
}
.navbar_near::before{
	content: "";
	height: 100%;
	position: absolute;
	top: 0;
	left: 0;
	width: 0.5rem;
	background-color: black;
	border-top-left-radius: 12px;
	border-bottom-left-radius: 12px;

}
.navbar_near .title{
	margin-left: 12px;
	font-size: 25px;
	font-weight: 600;
	padding-bottom: 4px;
	border-bottom: 2px solid #e6e6e6;
}
.navbar_near .near ul{
	display: flex;
	flex-direction: column;
}
.navbar_near .near ul li{
	position: relative;
	margin-bottom: 9px;
	display: block;
	width: 8rem;
	padding: 0.4rem 1rem;
  margin-left: 17px;

	
}
.navbar_near .near ul li::before{
	content: "";
	position: absolute;
	top: 0;
	left: 0;
	height: 100%;
	width: 0;
		
}
.navbar_near .near ul li:hover::before{
	background-color: #333;
	border-top-left-radius: 1rem;
	width: 2.8px;
	
}
.navbar_near .near ul li:hover{
	background-color: #f7f7f7;
	border-top-left-radius: 1rem;
	border-bottom-right-radius: 1rem;
	
}
.navbar_near .near ul li:visited::before{
	background-color: #333;
	border-top-left-radius: 1rem;
	width: 4px;
}
.navbar_near .near ul li:visited{
	background-color: #f7f7f7;
	border-top-left-radius: 1rem;
	border-bottom-right-radius: 1rem;
}
.navbar_near .near ul li a{
	font-size: 1rem;
	color: black;
	font-weight: bold;

}

  </style>
<aside class="navbar_near">
		<div class="title">QuickCal</div>
		<nav class="near">
			<ul>
				<li> <a href="profil.php"></a> </li>
				<li> <a href="calcultor.php">Calculatrice</a> </li>
				<li> <a href="users.php">Discussion</a> </li>
				<li> <a href="parametre.php">Paramètres</a> </li>
				<li> <a href="apropos.php">A propos</a> </li>
			</ul>
		</nav>
	</aside>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Deconnexion</a>
      </header>
      <div class="search">
        <span class="text">Selectionner un utilisateur pour tchater</span>
        <input type="text" placeholder="Entrer votre recherche...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
