<?php
/**
 * This is 404 page.
 *
 * @package cms_018 Movie
 */

?>

<?php get_header(); ?>

<main class="l-main">
	<?php get_template_part( 'parts/page-header' ); ?>

		<section class="p-404">
			<div class="p-404__inner">
				<h2 class="c-section-ttl c-section-ttl--page p-404__ttl">
					<span class="c-section-ttl__main">お探しのページは見つかりませんでした。</span>
				</h2>
				<div class="c-section__desc">ページがすでに存在しないか、入力したURLが誤っている可能性があります。</div>
				<div class="c-btn p-404__btn">
					<a href="<?php echo esc_url( home_url() ); ?>">TOP PAGE</a>
				</div>
			</div>
		</section>

</main>

<?php get_footer(); ?>
