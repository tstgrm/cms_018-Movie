<?php
/**
 * This is page header.
 * ex.page headline.
 *
 * @package cms_018 Movie
 */

?>

<?php
	$pageheader_ttl     = get_field( 'pageheader_ttl' ) ? get_field( 'pageheader_ttl' ) : get_the_title();
	$pageheader_ttl_sub = get_field( 'pageheader_ttl_sub' );
	$pageheader_desc    = get_field( 'pageheader_desc' );
	// $pageheader_bg      = get_field( 'pageheader_bg' );

if ( is_single() ) :
	$page_id            = get_page_by_path( 'news' );
	$category           = get_the_category();
	$cat_name           = $category[0]->cat_name;
	$cat_slug           = strtoupper( $category[0]->category_nicename );
	$pageheader_ttl     = get_field( 'pageheader__ttl', $page_id ) ? get_field( 'pageheader__ttl', $page_id ) : get_the_title();
	$pageheader_ttl_sub = get_field( 'pageheader_ttl_sub', $page_id );
	$pageheader_desc    = get_field( 'pageheader_desc', $page_id );
	// $pageheader_bg      = get_field( 'pageheader_bg', $page_id );


	elseif ( is_category() ) :
		$page_id            = get_page_by_path( 'news' );
		$category           = get_category( get_query_var( 'cat' ) );
		$cat_name           = $category->cat_name;
		$cat_slug           = ucfirst( $category->category_nicename );
		$pageheader_ttl     = $cat_name;
		$pageheader_ttl_sub = $cat_slug;
		$pageheader_desc    = get_field( 'pageheader_desc', $page_id );
		// $pageheader_bg      = get_field( 'pageheader_bg', $page_id );

	elseif ( is_tag() ) :
		$page_id            = get_page_by_path( 'news' );
		$tag_               = get_queried_object();
		$tag_name           = $tag_->name;
		$tag_slug           = ucfirst( $tag_->slug );
		$pageheader_ttl     = $tag_name;
		$pageheader_ttl_sub = $tag_slug;
		$pageheader_desc    = get_field( 'pageheader_desc', $page_id );
		$pageheader_bg      = get_field( 'pageheader_bg', $page_id );

	elseif ( is_archive( 'case' ) ) :
		$page_id = get_page_by_path( 'case' );
		// $category = get_category( get_query_var( 'cat' ) );
		// $cat_name           = $category->cat_name;
		// $cat_slug           = ucfirst( $category->category_nicename );
		$pageheader_ttl     = '導入事例';
		$pageheader_ttl_sub = strtoupper( 'case' );
		// $pageheader_desc    = get_field( 'pageheader_desc', $page_id );
		// $pageheader_bg      = get_field( 'pageheader_bg', $page_id );


	elseif ( is_archive() ) :
		$page_id            = get_page_by_path( 'news' );
		$category           = get_category( get_query_var( 'cat' ) );
		$cat_name           = $category->cat_name;
		$cat_slug           = ucfirst( $category->category_nicename );
		$pageheader_ttl     = $cat_name;
		$pageheader_ttl_sub = $cat_slug;
		$pageheader_desc    = get_field( 'pageheader_desc', $page_id );
		// $pageheader_bg      = get_field( 'pageheader_bg', $page_id );


	elseif ( is_month() ) :
		$page_id            = get_page_by_path( 'news' );
		$category           = get_category( get_query_var( 'cat' ) );
		$cat_name           = $category->cat_name;
		$cat_slug           = ucfirst( $category->category_nicename );
		$pageheader_ttl     = get_the_time( 'Y.m' );
		$pageheader_ttl_sub = $cat_slug;
		$pageheader_desc    = get_field( 'pageheader_desc', $page_id );
		// $pageheader_bg      = get_field( 'pageheader_bg', $page_id );


	elseif ( is_404() ) :
		$pageheader_ttl     = '404';
		$pageheader_ttl_sub = 'Not found';
		$pageheader_desc    = get_field( 'pageheader_desc', 'option' );
		// $pageheader_bg      = get_field( 'pageheader_bg', 'option' );
	endif;

	?>

<div class="c-page-header">

	<div class="l-inner c-page-header__inner">
		<h1 class="c-page-header-ttl">
			<span class="c-page-header-ttl__main"><?php echo esc_html( $pageheader_ttl ); ?></span>
			<?php
			/*
			if ( $pageheader_ttl_sub ) : ?>
				<span class="c-page-header-ttl__sub js-animate js-fade-in-up" data-animate="text"><?php echo esc_html( $pageheader_ttl_sub ); ?></span>
			<?php endif; */
			?>
		</h1>

		<?php
		if ( $pageheader_desc ) :
			$allowed_html = wp_kses_allowed_html( 'post' ); // escape時、投稿で使えるタグを使用可に.
			?>
				<p class="c-page-header__desc"><?php echo wp_kses( $pageheader_desc, $allowed_html ); ?></p>
		<?php endif; ?>

		<?php
		if ( is_archive( 'case' ) ) :
			;
			?>
			<!-- wp queryでカスタム投稿、タームによる絞り込み表示をする -->
			<?php
			$args     = array(
				'post_type'      => 'case',
				'posts_per_page' => '6',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'pickup',
						'field'    => 'slug',
						'terms'    => 'pickup',
					),
				),
			);
			$my_query = new WP_Query( $args );

			if ( $my_query->have_posts() ) :
				?>
				<div class="c-page-header__slider js-pickup-slider">
					<div class="c-page-header-slider">
						<div class="swiper">
							<ul class="swiper-wrapper">
								<?php
								while ( $my_query->have_posts() ) :
									$my_query->the_post();
									?>
									<li class="c-page-header-slider__slide swiper-slide">
										<?php get_template_part( 'parts/post-pickup' ); ?>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
						<div class="c-page-header-slider-nav">
							<div class="c-page-header-slider-nav__page swiper-pagination"></div>
							<div class="swiper-button-prev c-page-header-slider-nav__prev"></div>
							<div class="swiper-button-next c-page-header-slider-nav__next"></div>
						</div>
					</div>


				</div>
			<?php endif; ?>
		<?php	endif; ?>
	</div>

</div>
