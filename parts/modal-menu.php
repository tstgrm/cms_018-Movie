<?php
/**
 * This is modal menu
 *
 * @package cms_018 Movie
 */

?>

<aside class="g-modal-menu js-modal-menu">
	<div class="g-modal-menu__bg js-modal-menu-toggle"></div>

	<div class="g-modal-menu__container js-modal-menu-item">
		<div class="g-modal-menu__inner">

			<nav class="g-modal-menu-nav">
				<?php if ( have_rows( 'nav', 'option' ) ) : ?>
					<ul class="g-modal-menu-nav__list">
						<?php
						while ( have_rows( 'nav', 'option' ) ) :
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
								<li class="g-modal-menu-nav__item">
									<a href="<?php echo esc_url( $page_link ); ?>" class="g-modal-menu-nav__link"
									<?php
									if ( $target ) {
										echo ' target="_blank" rel="nofollow noopener"';}
									?>
									><?php the_sub_field( 'ttl' ); ?></a>
								</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<?php
				/*
				if ( have_rows( 'sub_nav', 'option' ) ) : ?>
					<div class="g-modal-menu-sub-nav">
						<ul class="g-modal-menu-sub-nav__list">
							<?php
							while ( have_rows( 'sub_nav', 'option' ) ) :
								the_row();
								?>
								<?php
									$page_link = '';
									$target    = false;
									$is_active = false;
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
									<li class="g-modal-menu-sub-nav__item">
										<a href="<?php echo esc_url( $page_link ); ?>" class="g-modal-menu-sub-nav__link
										<?php
										if ( $is_active ) {
											echo 'is-current';
										}
										?>
										"
										<?php
										if ( $target ) {
											echo ' target="_blank" rel="nofollow noopener"';}
										?>
										><?php the_sub_field( 'ttl' ); ?></a>
									</li>
							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; */
				?>
			</nav>

			<?php if ( get_field( 'cta_contact', 'option' )['disp'] ) : ?>
				<div class="g-modal-menu-cta">
					<ul class="g-modal-menu-cta__list">
						<?php
						while ( have_rows( 'cta_contact', 'option' ) ) :
							the_row();
							?>
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
									<li class="g-modal-menu-cta__item">
										<div class="g-modal-menu-cta__btn c-btn c-btn--cv">
											<a href="<?php echo esc_url( $page_link ); ?>"
											<?php
											if ( $target ) {
												echo ' target="_blank" rel="nofollow noopener"';}
											?>
											><?php the_sub_field( 'ttl' ); ?></a>
										</div>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>

						<?php endwhile; ?>

					</ul>
				</div>
			<?php endif; ?>

		</div>
	</div>
</aside>
