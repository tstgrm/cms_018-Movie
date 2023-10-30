<?php
/**
 * Header
 *
 * @package cms_018 Movie
 */

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no,address=no,email=no">
	<?php /* <title><?php bloginfo( 'name' );?></title> */ ?>
	<meta name="Keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />

	<?php if ( is_search() || is_404() || is_tag() ) : ?>
		<meta name="robots" content="noindex,follow">
	<?php endif; ?>

	<!-- favicon -->
	<link rel="icon" type="image/x-icon" href="<?php echo esc_attr( get_template_directory_uri() ); ?>/_static/dist/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_attr( get_template_directory_uri() ); ?>/_static/dist/img/apple-touch-icon.png">
	<!-- /favicon -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-status="loading">

<?php	/* get_template_part( 'parts/loader-lower' ); */ ?>

	<header class="g-header js-header">
		<div class="g-header__inner">
			<?php if ( get_field( 'logo', 'option' ) || get_field( 'logo_txt', 'option' ) ) : ?>
					<h1 class="g-header-logo">
						<a href="<?php echo esc_url( home_url() ); ?>" class="g-header-logo__link">
							<?php if ( get_field( 'logo', 'option' ) ) : ?>
								<img class="g-header-logo__img" src="<?php the_field( 'logo', 'option' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
							<?php elseif ( get_field( 'logo_txt', 'option' ) ) : ?>
								<span class="g-header-logo__txt"><?php the_field( 'logo_txt', 'option' ); ?></span>
							<?php endif; ?>
						</a>
					</h1>
			<?php endif; ?>

			<?php	if ( get_field( 'nav', 'option' ) ) : ?>
				<nav class="g-header-nav">
					<ul class="g-header-nav__list">
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
								<li class="g-header-nav__item">
									<a href="<?php echo esc_url( $page_link ); ?>" class="g-header-nav__link"
										<?php
										if ( $target ) {
											echo ' target="_blank" rel="nofollow noopener"';}
										?>
									><?php the_sub_field( 'ttl' ); ?></a>
								</li>
						<?php endwhile; ?>
					</ul>

					<ul class="g-header-cta-nav">
						<?php if ( get_field( 'header_contact', 'option' ) && have_rows( 'cta_contact', 'option' ) ) : ?>
							<?php
							while ( have_rows( 'cta_contact', 'option' ) ) :
								the_row();
								if ( have_rows( 'btn', 'option' ) ) :
									while ( have_rows( 'btn', 'option' ) ) :
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
											<li class="g-header-cta-nav__item g-header-cta-nav__item--contact c-btn c-btn--cv">
												<a href="<?php echo esc_url( $page_link ); ?>"
													<?php
													if ( $target ) {
														echo ' target="_blank" rel="nofollow noopener"';}
													?>
												><?php the_sub_field( 'ttl' ); ?></a>
											</li>
									<?php endwhile; ?>
								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>

					</ul>
				</nav>
			<?php endif; ?>

			<ul class="g-header-sp-menu">
				<li class="g-header-sp-menu__item js-modal-menu-toggle">
					<div class="g-header-sp-menu__link">
						<button class="g-header-sp-menu-icon">
							<span class="g-header-sp-menu-icon__line"></span>
							<span class="g-header-sp-menu-icon__line"></span>
							<span class="g-header-sp-menu-icon__line"></span>
						</button>
					</div>
				</li>
			</ul>


		</div>
	</header>
