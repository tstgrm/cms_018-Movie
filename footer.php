<?php
/**
 * This is footer.
 *
 * @package cms_018 Movie
 */

?>

	<footer class="g-footer">
		<div class="l-inner g-footer__inner">

			<div class="g-footer__section">
				<?php if ( get_field( 'logo_footer', 'option' ) || get_field( 'logo_txt', 'option' ) ) : ?>
					<p class="g-footer__logo g-footer-logo">
						<a href="<?php echo esc_url( home_url() ); ?>" class="g-footer-logo__link">
							<?php if ( get_field( 'logo_footer', 'option' ) ) : ?>
								<img class="g-footer-logo__img" src="<?php the_field( 'logo_footer', 'option' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
							<?php elseif ( get_field( 'logo_txt', 'option' ) ) : ?>
								<span class="g-footer-logo__txt"><?php the_field( 'logo_txt', 'option' ); ?></span>
							<?php endif; ?>
						</a>
					</p>
				<?php endif; ?>

				<?php if ( have_rows( 'sub_nav', 'option' ) ) : ?>
					<nav class="g-footer-nav">
						<ul class="g-footer-nav__list">
							<?php
							while ( have_rows( 'sub_nav', 'option' ) ) :
								the_row();
								?>
								<?php
									$page_link = '';
									$target    = false;
								if ( get_sub_field( 'link' ) ) {
									$page_link = get_sub_field( 'link' );
								} else {
									// 外部リンクが設定されてるとき.
									$page_link = get_sub_field( 'url' );
									if ( strpos( $page_link, empty( isset( $_SERVER['SERVER_NAME'] ) ) ) === false ) :
										$target = true;
										endif;
								}
								if ( get_sub_field( 'tab' ) ) {
									// アンカーリンクが設定されているとき.
									$page_link .= '#' . get_sub_field( 'tab' );
								}
								?>
									<li class="g-footer-nav__item">
										<a href="<?php echo esc_url( $page_link ); ?>" class="g-footer-nav__link"
										<?php
										if ( $target ) {
											echo ' target="_blank" rel="nofollow noopener"';}
										?>
										>
											<?php the_sub_field( 'ttl' ); ?>
										</a>
									</li>
								<?php endwhile; ?>
							</ul>
						</nav>
				<?php endif; ?>
			</div>

			<div class="g-footer__section g-footer__section--bottom">
				<?php if ( get_field( 'copyright', 'option' ) ) : ?>
					<p class="g-footer__copyright"><?php the_field( 'copyright', 'option' ); ?></p>
				<?php endif; ?>


			</div>

		</div>

		<?php
		/*
		<div class="c-pagetop">
			<span class="c-pagetop__link js-pagetop"><span class="c-pagetop__text">PAGE TOP</span></span>
		</div>
		*/
		?>
	</footer>

	<?php get_template_part( 'parts/modal-menu' ); ?>
	<?php
	if ( is_home() || is_front_page() || is_page( 'about' ) ) {
		get_template_part( 'parts/modal' );
	}
	?>

	<?php wp_footer(); ?>

	<?php if ( is_archive( 'case' ) ) : ?>
	<script>
		// form 絞り込み条件がされていたら（URLパラメータ付与されてたら）
		// アコーディオン、絞り込み条件の表示・スクロール
		let search_param = $(location).attr("search");
		// console.log("search: " + search_param);
		if (search_param) {
			$(".js-accordion-item").removeClass("is-active");
			$(".js-search-filter-selected").addClass("is-show");
			if (window.matchMedia("(min-width: 768px)").matches) {
				$(".js-accordion-target").css("display", "none");
			}

			var position =
				$(".c-search-filter").offset().top - $(".g-header").outerHeight() - 32;
			$("body, html").animate({ scrollTop: position }, 500, "swing");
		} else {
			$(".js-accordion-item").addClass("is-active");
			$(".js-search-filter-selected").removeClass("is-show");
		}
	</script>
<?php endif; ?>
</body>
</html>
