<?php
include_once("lien_bdd.php");
?>
<footer id="footer">
						<div class="inner">
							<ul class="icons">
							<?php 
							$query ="SELECT nom, lien, icone FROM social_media"; //instruction SQL
							$tfooter =mysqli_query($link, $query); //lancement de l'instruction (récupération des éléments dans la bdd)
							while( $socialMedia= mysqli_fetch_assoc($tfooter)){ //tant qu'il y a des éléments dans $socialMedia et donc dans la bdd l'itération continue ?> 
							<li><a href="<?php echo htmlentities($socialMedia["lien"])?>" target="_blank" class="<?php echo htmlentities($socialMedia["icone"])?>"><span class="label"><?php echo htmlentities($socialMedia["nom"]) ?></span></a></li>
							<?php  
							}
							?>
							</ul>
							<ul class="copyright">
								<li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>