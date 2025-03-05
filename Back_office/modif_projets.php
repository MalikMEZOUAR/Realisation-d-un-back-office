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
    $requete_brute = "SELECT * FROM projet WHERE id = $id";
    $resultat_brut = mysqli_query($link, $requete_brute);
    $entite = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC);
}

if ($formulaire_soumis) {
    $id = $_POST["id"];
    $Nom = htmlentities($_POST["Nom"]);
    $Description = htmlentities($_POST["Description"]);

    // Vérifier si un fichier est envoyé
    if (!empty($_FILES["chemin_image"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["chemin_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifier si c'est bien une image
        $check = getimagesize($_FILES["chemin_image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["chemin_image"]["tmp_name"], $target_file)) {
                $chemin_image = $target_file; // Stocker le chemin pour la base de données
            } else {
                echo "Erreur lors de l'upload de l'image.";
                exit();
            }
        } else {
            echo "Le fichier n'est pas une image.";
            exit();
        }
    } else {
        // Garder l'ancienne image si aucun fichier n'a été téléchargé
        $chemin_image = $entite['chemin_image'];
    }

    // Mettre à jour la base de données
    $requete_brute = "
        UPDATE projet
        SET 
            Nom = '$Nom',
            Description = '$Description',
            chemin_image = '$chemin_image'
        WHERE id = '$id'
    ";

    $resultat_brut = mysqli_query($link, $requete_brute);

    if ($resultat_brut === true) {
        header('Location: projets.php');
        exit();
    } else {
        echo "Erreur lors de la mise à jour.";
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
                    <form method="POST" action="" enctype="multipart/form-data">
                        <section>
                            <input type="hidden" value="<?php echo $entite['id']; ?>" name="id">
                            <div >
                                <label for="Nom" >Nom</label>
                                <input type="text" value="<?php echo $entite[
                                    'Nom'
                                ]; ?>" name="Nom" id="Nom">
                            </div>
                            <div >
                                <label for="Description" >Description</label>
                                <input type="text" value="<?php echo $entite[
                                    'Description'
                                ]; ?>" name="Description" id="Description">
                            </div>
                            <div >
                                <label for="chemin_image" >Image</label>
                                <input type="file" name="chemin_image" id="chemin_image">
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