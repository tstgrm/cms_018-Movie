<?php
/**
 * This is archive page.
 *
 * @package cms_018 Movie
 */

?>


<?php get_header(); ?>

<main class="l-main">
	<?php get_template_part( 'parts/page-header' ); ?>
	<div class="l-col2 l-news">
		<div class="l-col2__main">

			<?php if ( have_posts() ) : ?>
				<div class="c-post-list">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'parts/post-news' );
					endwhile;
					?>
				</div>

				<?php
				if ( function_exists( 'pagination' ) ) {
					pagination( $wp_query->max_num_pages );
				}
				?>
			<?php else : ?>
				<p class="p-search__no-exist">検索結果が見つかりませんでした。</p>
			<?php endif; ?>

		</div>

		<div class="l-col2__aside">
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
