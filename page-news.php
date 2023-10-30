<?php
/**
 * This is news page.
 *
 * @package cms_018 Movie
 */

/*
Template Name: NEWSテンプレート
*/
?>

<?php get_header(); ?>

<main class="l-main">
	<?php get_template_part( 'parts/page-header' ); ?>

	<div class="c-section u-pt-0">
		<div class="l-inner l-inner--narrow">

			<?php
				$paged_   = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$args     = array(
					'paged'      => $paged_,
					'posts_type' => 'post',
					// 'posts_per_page' => -1,
					'orderby'    => 'date',
					'order'      => 'DESC',
				);
				$my_query = new WP_Query( $args );

				if ( $my_query->have_posts() ) : // 新着情報が存在.
					?>
					<ul class="c-border-list">
						<?php
						while ( $my_query->have_posts() ) :
							$my_query->the_post();
							?>
								<li class="c-border-list__item">
									<?php get_template_part( 'parts/post-news' ); ?>
								</li>
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>

					<?php
					if ( function_exists( 'pagination' ) ) {
						pagination( $my_query->max_num_pages );
					}
					?>
			<?php else : ?>
				<p class="u-mt-40">記事が見つかりませんでした。</p>
			<?php endif; ?>

		</div>
	</div>

</main>

<?php get_footer(); ?>
