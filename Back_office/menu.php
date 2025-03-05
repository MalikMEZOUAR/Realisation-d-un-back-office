<!DOCTYPE HTML>
<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])){
require_once("../lien_bdd.php");
$query = 'SELECT * FROM `menu`';
$tmenu = mysqli_query($link, $query);
if (!$tmenu){
	die("Erreur dans la requête: ". mysqli_error($link));
}
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
				 <div class="Pres_elements">
					 <h1>Élément du menu</h1>
					 <a href="add_menu.php" class="button">Ajouter un élément</a>
				 </div>
                <div class="tableau">
					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th>Page</th>
								<th>Lien</th>
								<th ></th>
								<th ></th>
							</tr>
						</thead>
						<tbody>
							<?php
							mysqli_data_seek($tmenu, 0);
								while ($elements = mysqli_fetch_assoc($tmenu)) :
								// Affichage des données de chaque ligne ici
							?>
							<tr>
								<td><?php echo htmlspecialchars($elements['id'] ?? 'Non précisé') ?></td> 
								<td><?php echo htmlspecialchars($elements['pages']?? 'Non précisé')?></td> 
								<td><?php echo htmlspecialchars($elements['lien_php']?? 'Non précisé') ?></td> 
								<td >
									<a href='modif_menu.php?id=<?php echo $elements['id'] ?>' >Éditer</a>
								</td>
								<td >
									<a href='../<?php echo $lien_suppression; ?>' >Supprimer</a>
								</td>
							</tr>
							<?php endwhile ?>
						</tbody>
					</table>
				</div>


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