<!DOCTYPE HTML>
<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])){
require_once("../lien_bdd.php");


$formulaire_soumis = !empty($_POST);
$entree_mise_a_jour = array_key_exists('id', $_GET);

$entite = null;
if ($entree_mise_a_jour) {
    $id = $_GET["id"];
    $requete_brute = "SELECT * FROM social_media WHERE id = $id";
    $resultat_brut = mysqli_query($link, $requete_brute);
    $entite = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC);
}

if ($formulaire_soumis) {
    $id = $_POST["id"];
    $nom = htmlentities($_POST["nom"]);
    $lien = htmlentities($_POST["lien"]);
    $icone = htmlentities($_POST["icone"]);

    $requete_brute = "
        UPDATE social_media
        SET 
            nom = '$nom',
            lien = '$lien',
            icone = '$icone'
        WHERE id = '$id'
    ";

    $resultat_brut = mysqli_query($link, $requete_brute);

    if ($resultat_brut === true) {
        header('Location: reseaux.php');
        exit();
    } else {
        // Il y a eu un problème
    }
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
        <!-- Ajout de Dropzone.js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

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
                <div class="tableau">
                <?php if ($entite) { ?>
                    <form method="POST" action="">
                        <section>
                            <input type="hidden" value="<?php echo $entite['id']; ?>" name="id">
                            <div >
                                <label for="nom" >nom</label>
                                <input type="text" value="<?php echo $entite[
                                    'nom'
                                ]; ?>" name="nom" id="nom">
                            </div>
                            <div >
                                <label for="lien" >Lien</label>
                                <input type="text" value="<?php echo $entite[
                                    'lien'
                                ]; ?>" name="lien" id="lien">
                            </div>
                            <div >
                                <label for="icone" >icone</label>
                                <input type="text" value="<?php echo $entite[
                                    'icone'
                                ]; ?>" name="icone" id="icone">
                            </div>
                            <div>
                                <button type="submit">Éditer</button>
                            </div>
                        </section>
                    </form>
                <?php } ?>
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