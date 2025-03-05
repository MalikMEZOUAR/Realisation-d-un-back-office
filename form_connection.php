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

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="index.php" class="logo"><strong>Forty</strong> <span>by HTML5 UP</span></a>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
				<?php
					require_once("menu.php");
				?>


				<!-- Main -->
                <main>
                    <section class="inner">
                        <form action="login.php" method="post">
                            <fieldset class="form_connection">
                                <legend class="legend_conn">Indentification</legend>
                                <label for="login" class="label_conn">Login :</label> 
                                <textarea name="login" id="login" required></textarea>
                                <label for="pwd" class="label_conn">Password :</label>
                                <input type="password" name="pwd" id="pwd" required>
                                <input type="submit" value="Connecter">
                            </fieldset>
                        </form>
                    </section>
                </main>


				<!-- Footer -->
				<?php
                    require_once("footer.php");
                ?>

			</div>

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