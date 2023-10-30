<?php
/**
 * This is single-case page.
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
	<div class="l-col2 l-single-case p-single-case">
		<div class="l-col2__main">
			<?php
			if ( have_posts() ) :
				;
				?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<article class="p-single__article">
						<div class="p-single__head">
							<h1 class="p-single__ttl"><?php the_title(); ?></h1>

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
							<time class="p-single__date" datatime="<?php the_time( 'Y.n.j' ); ?>"><?php the_time( 'Y.n.j' ); ?></time>
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

						<div class="u-hidden-pc">
							<?php get_template_part( 'parts/sidebar-case' ); ?>
						</div>

						<div class="p-single__content p-single-case__content">
							<?php the_content(); ?>
						</div>

						<?php if ( have_rows( 'outline' ) ) : ?>
							<div class="p-single-case-outline">
								<?php
								while ( have_rows( 'outline' ) ) :
									the_row();
									?>

									<?php if ( get_sub_field( 'logo' ) ) : ?>
										<div class="p-single-case-outline__head">
											<img src="<?php the_sub_field( 'logo' ); ?>" alt="" class="p-single-case-outline__logo">
										</div>
									<?php endif; ?>

									<div class="p-single-case-outline__body">
										<?php if ( get_sub_field( 'name' ) ) : ?>
											<dl class="p-single-case-outline__dl">
												<dt class="p-single-case-outline__dt">メーカー名</dt>
												<dd class="p-single-case-outline__dd"><?php the_sub_field( 'name' ); ?></dd>
											</dl>
										<?php endif; ?>

										<?php if ( have_rows( 'list' ) ) : ?>
											<?php
											while ( have_rows( 'list' ) ) :
												the_row();
												?>
												<dl class="p-single-case-outline__dl">
													<dt class="p-single-case-outline__dt"><?php the_sub_field( 'dt' ); ?></dt>
													<dd class="p-single-case-outline__dd"><?php the_sub_field( 'dd' ); ?></dd>
												</dl>
											<?php endwhile; ?>
										<?php endif; ?>
									</div>

								<?php endwhile; ?>
							</div>
						<?php endif; ?>

						<?php if ( get_field( 'btn' )['disp'] ) : ?>
							<?php
							while ( have_rows( 'btn' ) ) :
								the_row();
								?>
									<div class="p-single-case__btn c-shadow-btn c-shadow-btn--gradient">
										<a href="<?php echo esc_attr( get_sub_field( 'url' ) ? get_sub_field( 'url' ) : get_sub_field( 'link' ) ); ?>"
														<?php
														if ( get_sub_field( 'target' ) ) {
															echo 'target="_blank" rel="nofollow noopener"';}
														?>
											>
														<?php the_sub_field( 'label' ); ?>
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11 19.55L6 16.675C5.68333 16.4917 5.43733 16.2457 5.262 15.937C5.08667 15.6283 4.99933 15.291 5 14.925V9.2C5 8.83333 5.08767 8.496 5.263 8.188C5.43833 7.88 5.684 7.634 6 7.45L11 4.575C11.3167 4.39167 11.65 4.3 12 4.3C12.35 4.3 12.6833 4.39167 13 4.575L18 7.45C18.3167 7.63333 18.5627 7.87933 18.738 8.188C18.9133 8.49667 19.0007 8.834 19 9.2V14.925C19 15.2917 18.9123 15.629 18.737 15.937C18.5617 16.245 18.316 16.491 18 16.675L13 19.55C12.6833 19.7333 12.35 19.825 12 19.825C11.65 19.825 11.3167 19.7333 11 19.55ZM11 17.25V12.65L7 10.35V14.95L11 17.25ZM13 17.25L17 14.95V10.35L13 12.65V17.25ZM1 6V4C1 3.16667 1.29167 2.45833 1.875 1.875C2.45833 1.29167 3.16667 1 4 1H6V3H4C3.71667 3 3.479 3.096 3.287 3.288C3.095 3.48 2.99933 3.71733 3 4V6H1ZM4 23C3.16667 23 2.45833 22.7083 1.875 22.125C1.29167 21.5417 1 20.8333 1 20V18H3V20C3 20.2833 3.096 20.521 3.288 20.713C3.48 20.905 3.71733 21.0007 4 21H6V23H4ZM18 23V21H20C20.2833 21 20.521 20.904 20.713 20.712C20.905 20.52 21.0007 20.2827 21 20V18H23V20C23 20.8333 22.7083 21.5417 22.125 22.125C21.5417 22.7083 20.8333 23 20 23H18ZM21 6V4C21 3.71667 20.904 3.479 20.712 3.287C20.52 3.095 20.2827 2.99933 20 3H18V1H20C20.8333 1 21.5417 1.29167 22.125 1.875C22.7083 2.45833 23 3.16667 23 4V6H21ZM12 10.9L16 8.6L12 6.3L8 8.6L12 10.9Z" fill="#fff"/>
											</svg>
										</a>
									</div>
							<?php endwhile; ?>
						<?php endif; ?>

					</article>

					<nav class="p-single__breadcrumbs">
						<?php get_template_part( 'parts/breadcrumbs' ); ?>
					</nav>
					<div class="p-single__sns-share">
						<?php get_template_part( 'parts/sns-share' ); ?>
					</div>

					<?php
				endwhile;
				wp_reset_postdata();
				?>
			<?php endif; ?>
		</div>

		<div class="l-col2__aside l-col2__aside--stickey u-hidden-sp">
			<?php get_template_part( 'parts/sidebar-case' ); ?>
		</div>
	</div>
	<div class="p-single-case-bottom">
		<div class="l-inner">
			<?php get_template_part( 'parts/related-posts-case' ); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
