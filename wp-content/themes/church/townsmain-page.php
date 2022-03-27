<?php
/**
 * The template for displaying all pages
 * Template Name: Шаблон страницы города (главная)
 * Template Post Type: page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package church
 */

get_header('town');
?>

<main id="primary" class="site-main inner-page">

    <?php
		while ( have_posts() ) :
			the_post();

			the_content();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

</main><!-- #main -->

<?php
get_footer();