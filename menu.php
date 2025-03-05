<?php
include_once("lien_bdd.php");
?>
<?php
$query ="SELECT pages, lien_php FROM menu"; //instruction SQL
$result =mysqli_query($link, $query); //lancement de l'instruction (récupération des éléments dans la bdd)
?>


<nav id="menu">
						<ul class="links">
						<?php 
						while( $pages= mysqli_fetch_array($result)){?>
							<li><a href="<?php echo htmlentities($pages[1]) ?>"><?php echo htmlentities($pages[0]); ?></a></li>
						<?php }  ?>
						</ul>
						<?php if (isset($_SESSION['login']) && isset($_SESSION['pwd'])){ ?>
							<ul class="actions stacked">
								<li><a href="../Back_office" class="button fit">Back Office</a></li>
							</ul>
							<?php }else{?>
							<ul class="actions stacked">
								<li><a href="#" class="button primary fit">Get Started</a></li>
								<li><a href="form_connection.php" class="button fit">Log In</a></li>
							</ul>
						<?php } ?>
</nav>