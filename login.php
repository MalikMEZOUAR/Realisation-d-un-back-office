<!DOCTYPE HTML>
<html>
	<head>
		<title>Forty by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

    <?php

    define("LOGIN","toto");
    define("PASSWORD","1234");

    if(isset($_POST['login']) && isset($_POST['pwd'])){
        if (LOGIN == $_POST['login'] && PASSWORD == $_POST['pwd']){
            session_start();
            $_SESSION["login"]=$_POST["login"];
            $_SESSION["pwd"]=$_POST["pwd"];
            header('location: Back_office/index.php');
        }
        else{
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
            echo "<br><br><div class='inner'>Vous serez redirigé. Sinon cliquez sur le lien <a href='index.php'>Formulaire de connexion</a></div>";
            header("refresh:0.1;url=form_connection.php");
        }
    }
    else{
        echo 'Vous n\'êtes pas autorisé à consulter cette page, <strong> veuillez vous indentifier !!! </strong> ';
        header("location:form_connection.php");
    }
                ?>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>
</body>
</html>