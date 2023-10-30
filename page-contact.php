<?php
/**
 * This is contact page.
 *
 * @package cms_018 Movie
 */

/*
Template Name: CONTACTテンプレート
*/
?>

<?php get_header(); ?>


<main class="l-main">
	<?php get_template_part( 'parts/page-header' ); ?>

	<section class="c-section p-contact u-pt-0">
		<div class="l-inner p-contact__inner">
			<div class="p-contact__article">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile;
				endif;
				?>
			</div>

		</div>
	</section>

</main>

<?php get_footer(); ?>
