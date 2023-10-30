<?php
/**
 * This is faq page.
 *
 * @package cms_12a WebAR
 */

/*
Template Name: FAQテンプレート
*/
?>

<?php get_header(); ?>

<main class="l-main u-bg-gray">
	<?php get_template_part( 'parts/page-header' ); ?>

	<div class="c-section p-faq u-pt-0">
		<div class="l-inner p-faq__inner">
			<?php	if ( have_rows( 'qa' ) ) : ?>
				<ul class="c-faq-list">
					<?php
					$count = 1;
					while ( have_rows( 'qa' ) ) :
						the_row();
						?>
						<li id="faq-<?php echo esc_attr( sprintf( '%02d', $count++ ) ); ?>" class="c-faq-list__item js-accordion-item">
							<h3 class="c-faq-list__question js-accordion-btn">
								<span class="c-faq-list__qa">Q</span>
								<span class="c-faq-list__question-detail">
									<?php the_sub_field( 'question' ); ?>
								</span>
								<span class="c-faq-list__icon"></span>
							</h3>
							<div class="c-faq-list__answer js-accordion-target">
								<p class="c-faq-list__answer-detail">
									<span class="c-faq-list__qa c-faq-list__qa--a">A</span>
									<?php the_sub_field( 'answer' ); ?>
								</p>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>




</main>

<?php get_footer(); ?>
