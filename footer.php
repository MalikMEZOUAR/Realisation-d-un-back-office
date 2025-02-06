<?php
include_once("lien_bdd.php");
?>
<footer id="footer">
						<div class="inner">
							<ul class="icons">
							<?php 
							$query ="SELECT nom, lien FROM social_media"; //instruction SQL
							$result =mysqli_query($link, $query); //lancement de l'instruction (récupération des éléments dans la bdd)
							while( $socialMedia= mysqli_fetch_array($result)){ //tant qu'il y a des éléments dans $socialMedia et donc dans la bdd l'itération continue ?> 
							<li><a href="<?php echo htmlentities($socialMedia[1])?>" target="_blank" class="<?php echo" icon brands alt fa-". htmlentities($socialMedia[0])?>"><span class="label"><?php echo htmlentities($socialMedia[0]) ?></span></a></li>
							<?php  
							}
							?>
							</ul>
							<ul class="copyright">
								<li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>