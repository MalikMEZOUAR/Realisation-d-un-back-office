<!DOCTYPE HTML>
<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])){

?>
<html>
	<head>
		<title>Forty by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="Back_office.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="../index.php" class="logo"><strong>Forty</strong> <span>by HTML5 UP</span></a>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
				<?php
					require_once("../menu.php");
				?>


				<!-- Main -->
                 <main class="main_bo">
                    <div>
                        <h1>Quel éléments voulez vous modifier ?</h1>
                    </div>
                    <div>
                        <a href="projets.php" class="button">Projets</a>
                        <a href="reseaux.php" class="button">Réseaux sociaux</a>
                        <a href="menu.php" class="button">Éléments du menu</a>
                    </div>
                </main>

				<!-- Footer -->
				<?php
require_once("../footer.php");
								}else{
    echo 'Vous n\'êtes pas autorisé à consulter cette page, <strong> veuillez vous identifer !!! </strong>';
    echo "<br> <br> Vous serez redirigé dans 5secondes. Sinon cliquez sur le lien <a href='../form_connection.php'>Formulaire de connexion</a>";
    header("location:../form_connection.php");
}
?>

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>
	</body>
</html>