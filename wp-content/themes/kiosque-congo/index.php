<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kiosque_congo
 */

get_header();
?>

<!-- Ad Start -->
<div class="col-md-12 ptop--30 pbottom--30">
	<!-- Advertisement Start -->
	<div class="ad--space">
		<a href="#">
			<img src="<?php bloginfo('template_url'); ?>/assets/img/ads-img/ad-970x90.jpg" alt="" class="center-block">
		</a>
	</div>
	<!-- Advertisement End -->
</div>
<!-- Ad End -->

<!-- Main Content Section Start -->
<div class="main-content--section pbottom--30">
	<div class="container">

		<div class="row">
		</div>


		<center>
			<select id="publication-select" style="width: 200px;font-size: 17px !important;margin-bottom: 30px;">
				<option value="">Choisir ma publication</option>
				<option value="68">Le journal officiel</option>
				<option value="88">Les depêches de Brazza</option>
				<option value="92">La semaine Africaine</option>
				<option value="94">Les Echos du Congo</option>
				<option value="96">Le Patriote</option>
			</select>
		</center>


		<script>
document.getElementById('publication-select').addEventListener('change', function() {
	var pageId = this.value;
	if (pageId) {
		window.location.href = '<?php echo home_url(); ?>/?p=' + pageId;
	}
});
</script>


		<!--debut le journal officiel-->
		<?php
		// Arguments pour la requête WP_Query
		$args = array(
			'post_type' => 'journal_officiel',
			'posts_per_page' => 4,
			'orderby' => 'date',
			'order' => 'DESC'
		);

		// Nouvelle requête
		$journal_officiel_query = new WP_Query($args);

		// Vérifier si la requête retourne des posts
		if ($journal_officiel_query->have_posts()):
			?>


			<div class="post--items-title" data-ajax="tab"
				style="border-top-width: 4px;border-top-style: dotted; border-top-color: gray !important;">
				<a href="<?php echo get_permalink(68); ?>">
				<p style="font-size:25px;color:#00814f;font-weight:550;">
				LE JOURNAL OFFICIEL
				</p>
				</a>

				<h2 class="h4" style="margin-bottom:10px;margin-top: 35px;">
					
						<span
							style="background-color:#050505;width:auto;color:white;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;font-size: 19px !important;">
							&nbsp; &nbsp;LES 4 DERNIERS JOURNAUX &nbsp; &nbsp;
						</span>

				</h2>
				<div class="nav">
					<a class="next btn-link" href="<?php echo get_permalink(68); ?>"><i
							class="fa fa-arrow-right" style="font-size:30px;color:black;"></i></a></div>

	
			</div>
			<div class="contributor--items ptop--30">
				<ul class="nav row AdjustRow" style="position: relative; height: 407.266px;">
					<?php
					// Boucler à travers les résultats de la requête
					while ($journal_officiel_query->have_posts()):
						$journal_officiel_query->the_post();
						?>
						<li class="col-md-3 col-xs-6 col-xxs-12 pbottom--30">
							<!-- Contributor Item Start -->
							<div class="contributor--item style--2">
								<div class="img">
									<?php
									if (has_post_thumbnail()) {
										the_post_thumbnail(array(263, 272));
									} else {
										echo '<img src="https://via.placeholder.com/263x272" alt="" />';
									}
									?>
								</div>
								<div class="name">
									<h3 class="h4"><?php the_title(); ?></h3>
								</div>
								<div class="desc">
									<div>
										<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
											<a style="color: #1A9ED1 !important; font-size: 14px !important;"
												href="<?php the_permalink(); ?>">Voir</a>
										</h3>
										<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
											<a style="color: #787A7A !important; font-size: 14px !important;" href="#">|</a>
										</h3>
										<?php
										$pdf_document_url = get_field('document_pdf');
										if ($pdf_document_url) {
											?>
											<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
												<a style="color: #1A9ED1 !important; font-size: 14px !important;"
													href="<?php echo esc_url($pdf_document_url); ?>" target="_blank">Télécharger</a>
											</h3>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<!-- Contributor Item End -->
						</li>
						<?php
					endwhile;
					?>
				</ul>
			</div>
			<!--fin le journal officiel-->
			<?php
		else:
			echo '<p>Aucun journal officiel trouvé.</p>';
		endif;

		// Réinitialiser la requête
		wp_reset_postdata();
		?>

		<!--fin le journal officiel-->






		<?php
		// Arguments pour la requête WP_Query
		$args = array(
			'post_type' => 'depeches_de_brazza',
			'posts_per_page' => 4,
			'orderby' => 'date',
			'order' => 'DESC'
		);

		// Nouvelle requête
		$depeches_query = new WP_Query($args);

		// Vérifier si la requête retourne des posts
		if ($depeches_query->have_posts()):
			?>

			<!--début les depeches de brazza-->
			<div class="post--items-title" data-ajax="tab"
				style="border-top-width: 4px;border-top-style: dotted; border-top-color: gray !important;">
						
				<a href="<?php echo get_permalink(88); ?>">
				<p style="font-size:25px;color:#00814f;font-weight:550;">
				LES DEPECHES DE BRAZZA
				</p>
				</a>

				<h2 class="h4" style="margin-bottom:10px;margin-top: 35px;">
				
						<span
							style="background-color:#050505;width:auto;color:white;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;font-size: 19px !important;">
							&nbsp; &nbsp;LES 4 DERNIERS JOURNAUX &nbsp; &nbsp;
						</span>

				</h2>
				
				<div class="nav"><a class="next btn-link" href="<?php echo get_permalink(88); ?>"><i
							class="fa fa-arrow-right" style="font-size:30px;color:black;"></i></a></div>
			</div>
			<div class="contributor--items ptop--30">
				<ul class="nav row AdjustRow" style="position: relative; height: 407.266px;">
					<?php
					// Boucler à travers les résultats de la requête
					while ($depeches_query->have_posts()):
						$depeches_query->the_post();
						?>
						<li class="col-md-3 col-xs-6 col-xxs-12 pbottom--30">
							<!-- Contributor Item Start -->
							<div class="contributor--item style--2">
								<div class="img">
									<?php
									if (has_post_thumbnail()) {
										the_post_thumbnail(array(263, 272));
									} else {
										echo '<img src="https://via.placeholder.com/263x272" alt="" />';
									}
									?>
								</div>
								<div class="name">
									<h3 class="h4"><?php the_title(); ?></h3>
								</div>
								<div class="desc">
									<div>
										<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
											<a style="color: #1A9ED1 !important; font-size: 14px !important;"
												href="<?php the_permalink(); ?>">Voir</a>
										</h3>
										<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
											<a style="color: #787A7A !important; font-size: 14px !important;" href="#">|</a>
										</h3>
										<?php
										$pdf_document_url = get_field('document_pdf');
										if ($pdf_document_url) {
											?>
											<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
												<a style="color: #1A9ED1 !important; font-size: 14px !important;"
													href="<?php echo esc_url($pdf_document_url); ?>" target="_blank">Télécharger</a>
											</h3>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<!-- Contributor Item End -->
						</li>
						<?php
					endwhile;
					?>
				</ul>
			</div>
			<!--fin les depeches de brazza-->
			<?php
		else:
			echo '<p>Aucun article trouvé.</p>';
		endif;

		// Réinitialiser la requête
		wp_reset_postdata();
		?>





		<?php
		// Arguments pour la requête WP_Query
		$args = array(
			'post_type' => 'semaine_africaine',
			'posts_per_page' => 4,
			'orderby' => 'date',
			'order' => 'DESC'
		);

		// Nouvelle requête
		$semaine_africaine_query = new WP_Query($args);

		// Vérifier si la requête retourne des posts
		if ($semaine_africaine_query->have_posts()):
			?>

			<!--début la semaine africaine-->
			<div class="post--items-title" data-ajax="tab"
				style="border-top-width: 4px;border-top-style: dotted; border-top-color: gray !important;">
				<a href="<?php echo get_permalink(92); ?>">
				<p style="font-size:25px;color:#00814f;font-weight:550;">
				LA SEMAINE AFRICAINE
				</p>
				</a>

				<h2 class="h4" style="margin-bottom:10px;margin-top: 35px;">
				
						<span
							style="background-color:#050505;width:auto;color:white;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;font-size: 19px !important;">
							&nbsp; &nbsp;LES 4 DERNIERS JOURNAUX &nbsp; &nbsp;
						</span>
					
				</h2>
				<div class="nav"><a class="next btn-link" href="<?php echo get_permalink(92); ?>"><i
							class="fa fa-arrow-right" style="font-size:30px;color:black;"></i></a></div>
			</div>
			<div class="contributor--items ptop--30">
				<ul class="nav row AdjustRow" style="position: relative; height: 407.266px;">
					<?php
					// Boucler à travers les résultats de la requête
					while ($semaine_africaine_query->have_posts()):
						$semaine_africaine_query->the_post();
						?>
						<li class="col-md-3 col-xs-6 col-xxs-12 pbottom--30">
							<!-- Contributor Item Start -->
							<div class="contributor--item style--2">
								<div class="img">
									<?php
									if (has_post_thumbnail()) {
										the_post_thumbnail(array(263, 272));
									} else {
										echo '<img src="https://via.placeholder.com/263x272" alt="" />';
									}
									?>
								</div>
								<div class="name">
									<h3 class="h4"><?php the_title(); ?></h3>
								</div>
								<div class="desc">
									<div>
										<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
											<a style="color: #1A9ED1 !important; font-size: 14px !important;"
												href="<?php the_permalink(); ?>">Voir</a>
										</h3>
										<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
											<a style="color: #787A7A !important; font-size: 14px !important;" href="#">|</a>
										</h3>
										<?php
										$pdf_document_url = get_field('document_pdf');
										if ($pdf_document_url) {
											?>
											<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
												<a style="color: #1A9ED1 !important; font-size: 14px !important;"
													href="<?php echo esc_url($pdf_document_url); ?>" target="_blank">Télécharger</a>
											</h3>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<!-- Contributor Item End -->
						</li>
						<?php
					endwhile;
					?>
				</ul>
			</div>
			<!--fin la semaine africaine-->
			<?php
		else:
			echo '<p>Aucun article trouvé.</p>';
		endif;

		// Réinitialiser la requête
		wp_reset_postdata();
		?>





		<?php
		// Arguments pour la requête WP_Query
		$args = array(
			'post_type' => 'echos_du_congo',
			'posts_per_page' => 4,
			'orderby' => 'date',
			'order' => 'DESC'
		);

		// Nouvelle requête
		$echos_du_congo_query = new WP_Query($args);

		// Vérifier si la requête retourne des posts
		if ($echos_du_congo_query->have_posts()):
			?>

			<!--début les echos du congo-->
			<div class="post--items-title" data-ajax="tab"
				style="border-top-width: 4px;border-top-style: dotted; border-top-color: gray !important;">
				<a href="<?php echo get_permalink(94); ?>">
				<p style="font-size:25px;color:#00814f;font-weight:550;">
				LES ECHOS DU CONGO
				</p>
				</a>

				<h2 class="h4" style="margin-bottom:10px;margin-top: 35px;">

						<span
							style="background-color:#050505;width:auto;color:white;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;font-size: 19px !important;">
							&nbsp; &nbsp;LES 4 DERNIERS JOURNAUX &nbsp; &nbsp;
						</span>

					
				</h2>
				<div class="nav"><a class="next btn-link" href="<?php echo get_permalink(94); ?>"><i
							class="fa fa-arrow-right" style="font-size:30px;color:black;"></i></a></div>
			</div>
			<div class="contributor--items ptop--30">
				<ul class="nav row AdjustRow" style="position: relative; height: 407.266px;">
					<?php
					// Boucler à travers les résultats de la requête
					while ($echos_du_congo_query->have_posts()):
						$echos_du_congo_query->the_post();
						?>
						<li class="col-md-3 col-xs-6 col-xxs-12 pbottom--30">
							<!-- Contributor Item Start -->
							<div class="contributor--item style--2">
								<div class="img">
									<?php
									if (has_post_thumbnail()) {
										the_post_thumbnail(array(263, 272));
									} else {
										echo '<img src="https://via.placeholder.com/263x272" alt="" />';
									}
									?>
								</div>
								<div class="name">
									<h3 class="h4"><?php the_title(); ?></h3>
								</div>
								<div class="desc">
									<div>
										<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
											<a style="color: #1A9ED1 !important; font-size: 14px !important;"
												href="<?php the_permalink(); ?>">Voir</a>
										</h3>
										<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
											<a style="color: #787A7A !important; font-size: 14px !important;" href="#">|</a>
										</h3>
										<?php
										$pdf_document_url = get_field('document_pdf');
										if ($pdf_document_url) {
											?>
											<h3 style="display: inline-block; margin-right: 10px; margin: 0;">
												<a style="color: #1A9ED1 !important; font-size: 14px !important;"
													href="<?php echo esc_url($pdf_document_url); ?>" target="_blank">Télécharger</a>
											</h3>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<!-- Contributor Item End -->
						</li>
						<?php
					endwhile;
					?>
				</ul>
			</div>
			<!--fin les echos du congo-->
			<?php
		else:
			echo '<p>Aucun article trouvé.</p>';
		endif;

		// Réinitialiser la requête
		wp_reset_postdata();
		?>




<?php
// Arguments pour la requête WP_Query
$args = array(
    'post_type'      => 'patriote',
    'posts_per_page' => 4,
    'orderby'        => 'date',
    'order'          => 'DESC'
);

// Nouvelle requête
$patriote_query = new WP_Query($args);

// Vérifier si la requête retourne des posts
if ($patriote_query->have_posts()) :
    ?>

    <!--début le patriote-->
    <div class="post--items-title" data-ajax="tab"
         style="border-top-width: 4px;border-top-style: dotted; border-top-color: gray !important;">
		 <a href="<?php echo get_permalink(96); ?>">
		 <p style="font-size:25px;color:#00814f;font-weight:550;">
				LE PATRIOTE
				</p>
</a>	

        <h2 class="h4" style="margin-bottom:10px;margin-top: 35px;">
            
			
						<span
							style="background-color:#050505;width:auto;color:white;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;font-size: 19px !important;">
							&nbsp; &nbsp;LES 4 DERNIERS JOURNAUX &nbsp; &nbsp;
						</span>
					
        </h2>
        <div class="nav"><a class="next btn-link" href="#"><i
                    class="fa fa-arrow-right" style="font-size:30px;color:black;"></i></a></div>
    </div>
    <div class="contributor--items ptop--30">
        <ul class="nav row AdjustRow" style="position: relative; height: 407.266px;">
            <?php
            // Boucler à travers les résultats de la requête
            while ($patriote_query->have_posts()) : $patriote_query->the_post();
                ?>
                <li class="col-md-3 col-xs-6 col-xxs-12 pbottom--30">
                    <!-- Contributor Item Start -->
                    <div class="contributor--item style--2">
                        <div class="img">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail(array(263, 272));
                            } else {
                                echo '<img src="https://via.placeholder.com/263x272" alt="" />';
                            }
                            ?>
                        </div>
                        <div class="name">
                            <h3 class="h4"><?php the_title(); ?></h3>
                        </div>
                        <div class="desc">
                            <div>
                                <h3 style="display: inline-block; margin-right: 10px; margin: 0;">
                                    <a style="color: #1A9ED1 !important; font-size: 14px !important;" href="<?php the_permalink(); ?>">Voir</a>
                                </h3>
                                <h3 style="display: inline-block; margin-right: 10px; margin: 0;">
                                    <a style="color: #787A7A !important; font-size: 14px !important;" href="#">|</a>
                                </h3>
                                <?php
                                $pdf_document_url = get_field('document_pdf');
                                if ($pdf_document_url) {
                                    ?>
                                    <h3 style="display: inline-block; margin-right: 10px; margin: 0;">
                                        <a style="color: #1A9ED1 !important; font-size: 14px !important;" href="<?php echo esc_url($pdf_document_url); ?>" target="_blank">Télécharger</a>
                                    </h3>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Contributor Item End -->
                </li>
                <?php
            endwhile;
            ?>
        </ul>
    </div>
    <!--fin le patriote-->
    <?php
else :
    echo '<p>Aucun article trouvé.</p>';
endif;

// Réinitialiser la requête
wp_reset_postdata();
?>






	</div>
</div>
<!-- Main Content Section End -->



<?php
get_footer();
