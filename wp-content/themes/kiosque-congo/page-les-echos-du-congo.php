<?php
/**
 * Template Name: Les Echos du Congo
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

        </div>

        <!--debut le journal officiel-->
        <?php
        // Paramètres de la requête WP_Query pour la pagination et la limitation à 16 articles par page
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => 'echos_du_congo',
            'posts_per_page' => 16,
            'paged' => $paged,
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
                <h2 class="h4" style="margin-bottom:10px;margin-top: 35px;">
                <p style="font-size:25px;color:#00814f;">
				LES ECHOS DU CONGO
				</p>
                </h2>
                
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
                                            <a style="color: #787A7A !important; font-size: 14px !important;"
                                               href="#">|</a>
                                        </h3>
                                        <?php
                                        $pdf_document_url = get_field('document_pdf');
                                        if ($pdf_document_url) {
                                            ?>
                                            <h3 style="display: inline-block; margin-right: 10px; margin: 0;">
                                                <a style="color: #1A9ED1 !important; font-size: 14px !important;"
                                                   href="<?php echo esc_url($pdf_document_url); ?>"
                                                   target="_blank">Télécharger</a>
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
            <!-- Pagination -->
           <!-- Pagination -->
<div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
    <?php
    $total_pages = $journal_officiel_query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));

    echo '<p class="pagination-hint float--left">Page ' . $current_page . ' sur ' . $total_pages . '</p>';

    echo '<ul class="pagination float--right">';
    echo '<li>' . get_previous_posts_link('<i style="color: #787A7A;" class="fa fa-long-arrow-left"></i>') . '</li>';
    echo '<li>' . get_next_posts_link('<i style="color: #787A7A;" class="fa fa-long-arrow-right"></i>', $journal_officiel_query->max_num_pages) . '</li>';
    echo '</ul>';
    ?>
</div>

            <?php
        else:
            echo '<p>Aucun journal officiel trouvé.</p>';
        endif;

        // Réinitialiser la requête
        wp_reset_postdata();
        ?>

    </div>
</div>
<!-- Main Content Section End -->

<?php
get_footer();
?>
