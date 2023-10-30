<?php
/**
 * This is single page.
 *
 * @package cms_12a WebAR
 */

?>

<?php get_header(); ?>

<?php
	// 記事のビュー数を更新(ログイン中・クローラーは除外).
if ( ! is_user_logged_in() && ! is_robots() ) {
	set_post_views( get_the_ID() );
}
?>

<main class="l-main">
	<div class="c-section p-single">
		<div class="l-inner l-inner--tiny">
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<article class="p-single__article">
						<div class="p-single__head">
							<h1 class="p-single__ttl"><?php the_title(); ?></h1>
							<time class="p-single__date" datatime="<?php the_time( 'Y.n.j' ); ?>"><?php the_time( 'Y.n.j' ); ?></time>

							<?php
							/*
							<div class="p-single__meta">
								<ul class="c-cats">
									<?php
									$cats      = get_the_category();
									$cats_id   = '';
									$cats_name = '';

									foreach ( $cats as $cat_ ) :
										$cats_id   = $cat_->cat_ID;
										$cats_name = $cat_->name;
										?>
											<li class="c-cats__item">
												<a href="<?php echo esc_url( get_category_link( $cats_id ) ); ?>" class="c-cat">
													<?php echo esc_html( $cats_name ); ?>
												</a>
											</li>
									<?php endforeach; ?>
								</ul>

								<ul class="c-tags">
									<?php
									$tags      = get_the_tags();
									$tags_id   = '';
									$tags_name = '';

									foreach ( $tags as $tag_ ) :
										$tags_id   = $tag_->term_id;
										$tags_name = $tag_->name;
										?>
											<li class="c-tags__item">
												<a href="<?php echo esc_url( get_tag_link( $tags_id ) ); ?>" class="c-tag">
													<?php echo esc_html( '#' . $tags_name ); ?>
												</a>
											</li>
									<?php endforeach; ?>
								</ul>
							</div>
							*/
							?>

							<?php
							if ( has_post_thumbnail() ) :
								?>
								<figure class="p-single__eyecatch">
									<?php
										the_post_thumbnail(
											'large',
											array(
												'class' => 'p-single__eyecatch-img',
												'alt'   => wp_strip_all_tags( get_the_title() ),
											)
										);
									?>
								</figure>
								<?php
							endif;
							?>
						</div>

						<div class="p-single__content">
							<?php the_content(); ?>
						</div>

					</article>

					<?php
					/*
					<nav class="p-single__breadcrumbs">
						<?php get_template_part( 'parts/breadcrumbs' ); ?>
					</nav>
					*/
					?>

					<div class="p-single__sns-share">
						<?php get_template_part( 'parts/sns-share' ); ?>
					</div>

					<div class="c-shadow-btn c-btn--center u-mt-40">
						<a href="../">お知らせ一覧</a>
					</div>

					<?php /* get_template_part( 'parts/related-posts' ); */ ?>

					<?php
				endwhile;
				wp_reset_postdata();
				?>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
