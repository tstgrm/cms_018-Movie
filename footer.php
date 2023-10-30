<?php
/**
 * This is footer.
 *
 * @package cms_12a WebAR
 */

?>

	<?php
	// 導入事例ページ(archive-case)用その他ページリンク.
	if ( is_archive( 'case' ) ) :
		$page_id = get_page_by_path( 'case' );
		?>
		<?php
		/*
		if ( is_array( get_field( 'other_link', $page_id ) ) && get_field( 'other_link', $page_id )['disp'] ) : ?>
			<?php
			while ( have_rows( 'other_link', $page_id ) ) :
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
					if ( strpos( $page_link, isset( $_SERVER['SERVER_NAME'] ) ) === false ) :
						$target = true;
						endif;
				}
				if ( get_sub_field( 'tab' ) ) {
					// アンカーリンクが設定されているとき.
					$page_link .= '#' . get_sub_field( 'tab' );
				}
				if ( $target ) {
					$target = ' target="_blank" rel="nofollow noopener"';
				}

				$bg_sp = get_sub_field( 'bg_sp' ) ? get_sub_field( 'bg_sp' ) : get_sub_field( 'bg' );
				?>
				<a class="c-other-link c-other-link--about u-hidden-sp" href="<?php echo esc_url( $page_link ); ?>"<?php echo esc_html( $target ); ?> style="background-image:url(<?php the_sub_field( 'bg' ); ?>)">
					<div class="c-other-link__inner">
						<div class="c-other-link-ttl">
							<span class="c-other-link-ttl__main"><?php the_sub_field( 'label_main' ); ?></span>
							<span class="c-other-link-ttl__sub"><?php the_sub_field( 'label_sub' ); ?></span>
							<span class="c-other-link-ttl__arrow"></span>
						</div>
					</div>
				</a>
				<a class="c-other-link c-other-link--about u-hidden-pc" href="<?php echo esc_url( $page_link ); ?>"<?php echo esc_html( $target ); ?> style="background-image:url(<?php echo esc_attr( $bg_sp ); ?>)">
					<div class="c-other-link__inner">
						<div class="c-other-link-ttl">
							<span class="c-other-link-ttl__main"><?php the_sub_field( 'label_main' ); ?></span>
							<span class="c-other-link-ttl__sub"><?php the_sub_field( 'label_sub' ); ?></span>
							<span class="c-other-link-ttl__arrow"></span>
						</div>
					</div>
				</a>
			<?php endwhile; ?>
		<?php endif;
		*/
		?>
		<?php endif; ?>

	<?php
	/*
	if ( is_array( get_field( 'other_link' ) ) && get_field( 'other_link' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'other_link' ) ) :
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
				if ( strpos( $page_link, isset( $_SERVER['SERVER_NAME'] ) ) === false ) :
					$target = true;
					endif;
			}
			if ( get_sub_field( 'tab' ) ) {
				// アンカーリンクが設定されているとき.
				$page_link .= '#' . get_sub_field( 'tab' );
			}
			if ( $target ) {
				$target = ' target="_blank" rel="nofollow noopener"';
			}

			$bg_sp = get_sub_field( 'bg_sp' ) ? get_sub_field( 'bg_sp' ) : get_sub_field( 'bg' );
			?>
			<a class="c-other-link c-other-link--about u-hidden-sp" href="<?php echo esc_url( $page_link ); ?>"<?php echo esc_html( $target ); ?> style="background-image:url(<?php the_sub_field( 'bg' ); ?>)">
				<div class="c-other-link__inner">
					<div class="c-other-link-ttl">
						<span class="c-other-link-ttl__main"><?php the_sub_field( 'label_main' ); ?></span>
						<span class="c-other-link-ttl__sub"><?php the_sub_field( 'label_sub' ); ?></span>
						<span class="c-other-link-ttl__arrow"></span>
					</div>
				</div>
			</a>
			<a class="c-other-link c-other-link--about u-hidden-pc" href="<?php echo esc_url( $page_link ); ?>"<?php echo esc_html( $target ); ?> style="background-image:url(<?php echo esc_attr( $bg_sp ); ?>)">
				<div class="c-other-link__inner">
					<div class="c-other-link-ttl">
						<span class="c-other-link-ttl__main"><?php the_sub_field( 'label_main' ); ?></span>
						<span class="c-other-link-ttl__sub"><?php the_sub_field( 'label_sub' ); ?></span>
						<span class="c-other-link-ttl__arrow"></span>
					</div>
				</div>
			</a>
		<?php endwhile; ?>
	<?php endif; */
	?>

	<?php if ( get_field( 'cta_contact', 'option' )['disp'] || get_field( 'cta_download', 'option' )['disp'] ) : ?>
		<div class="g-foot-cta">
			<div class="g-foot-cta__inner">
				<?php
				while ( have_rows( 'cta_contact', 'option' ) ) :
					the_row();
					$bg_sp = get_sub_field( 'bg_sp' ) ? get_sub_field( 'bg_sp' ) : get_sub_field( 'bg' );
					?>
					<div class="g-foot-cta-block g-foot-cta-block--contact">
						<div class="g-foot-cta-block__bg" style="background-image:url(<?php the_sub_field( 'bg' ); ?>)"></div>
						<?php if ( have_rows( 'btn' ) ) : ?>
							<?php
							while ( have_rows( 'btn' ) ) :
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
									if ( strpos( $page_link, isset( $_SERVER['SERVER_NAME'] ) ) === false ) :
										$target = true;
										endif;
								}
								if ( get_sub_field( 'tab' ) ) {
									// アンカーリンクが設定されているとき.
									$page_link .= '#' . get_sub_field( 'tab' );
								}
								?>
									<a href="<?php echo esc_url( $page_link ); ?>"
										<?php
										if ( $target ) {
											echo ' target="_blank" rel="nofollow noopener"';}
										?>
										class="g-foot-cta-block__link">
										<span class="g-foot-cta-block__link-inner">
											<span class="g-foot-cta-block__icon"></span>
											<span class="g-foot-cta-block__ttl"><?php the_sub_field( 'ttl' ); ?></span>
										</span>
									</a>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>

				<?php
				while ( have_rows( 'cta_download', 'option' ) ) :
					the_row();
					$bg_sp = get_sub_field( 'bg_sp' ) ? get_sub_field( 'bg_sp' ) : get_sub_field( 'bg' );
					?>
					<div class="g-foot-cta-block g-foot-cta-block--download">
						<div class="g-foot-cta-block__bg" style="background-image:url(<?php the_sub_field( 'bg' ); ?>)"></div>
						<?php if ( have_rows( 'btn' ) ) : ?>
							<?php
							while ( have_rows( 'btn' ) ) :
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
									if ( strpos( $page_link, isset( $_SERVER['SERVER_NAME'] ) ) === false ) :
										$target = true;
										endif;
								}
								if ( get_sub_field( 'tab' ) ) {
									// アンカーリンクが設定されているとき.
									$page_link .= '#' . get_sub_field( 'tab' );
								}
								?>
									<a href="<?php echo esc_url( $page_link ); ?>"
										<?php
										if ( $target ) {
											echo ' target="_blank" rel="nofollow noopener"';}
										?>
										class="g-foot-cta-block__link">
										<span class="g-foot-cta-block__link-inner">
											<span class="g-foot-cta-block__icon"></span>
											<span class="g-foot-cta-block__ttl"><?php the_sub_field( 'ttl' ); ?></span>
										</span>
									</a>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>

	<footer class="g-footer">
		<div class="l-inner g-footer__inner">

			<div class="g-footer__section">
				<?php if ( get_field( 'logo', 'option' ) || get_field( 'logo_txt', 'option' ) ) : ?>
					<p class="g-footer__logo g-footer-logo">
						<a href="<?php echo esc_url( home_url() ); ?>" class="g-footer-logo__link">
							<?php if ( get_field( 'logo', 'option' ) ) : ?>
								<img class="g-footer-logo__img" src="<?php the_field( 'logo', 'option' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
							<?php elseif ( get_field( 'logo_txt', 'option' ) ) : ?>
								<span class="g-footer-logo__txt"><?php the_field( 'logo_txt', 'option' ); ?></span>
							<?php endif; ?>
						</a>
					</p>
				<?php endif; ?>

				<?php if ( have_rows( 'nav', 'option' ) || have_rows( 'footer_nav', 'option' ) ) : ?>
					<nav class="g-footer__nav g-footer-nav">
						<ul class="g-footer-nav__list">
							<?php
							$count = 0;
							while ( have_rows( 'nav', 'option' ) ) :
								the_row();
								$count++;
								?>
								<?php
								$page_link = '';
								$target    = false;
								if ( get_sub_field( 'link' ) ) {
									$page_link = get_sub_field( 'link' );
								} else {
									// 外部リンクが設定されてるとき.
									$page_link = get_sub_field( 'url' );
									if ( strpos( $page_link, isset( $_SERVER['SERVER_NAME'] ) ) === false ) :
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
									><?php the_sub_field( 'ttl' ); ?></a>
								</li>

								<?php if ( 0 === $count % 2 ) : ?>
									</ul>
									<ul class="g-footer-nav__list">
								<?php endif; ?>
							<?php endwhile; ?>

							<?php
							while ( have_rows( 'footer_nav', 'option' ) ) :
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
									if ( strpos( $page_link, isset( $_SERVER['SERVER_NAME'] ) ) === false ) :
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
									><?php the_sub_field( 'ttl' ); ?></a>
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

				<?php if ( have_rows( 'sub_nav', 'option' ) ) : ?>
					<nav class="g-footer-sub-nav">
						<ul class="g-footer-sub-nav__list">
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
									<li class="g-footer-sub-nav__item">
										<a href="<?php echo esc_url( $page_link ); ?>" class="g-footer-sub-nav__link"
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
