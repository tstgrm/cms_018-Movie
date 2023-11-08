<?php
/**
 * This is privacy page.
 *
 * @package cms_018 Movie
 */

/*
Template Name: PRIVACYテンプレート
*/
?>

<?php get_header(); ?>

<main class="l-main">
	<?php get_template_part( 'parts/page-header' ); ?>

	<section class="p-privacy">
		<div class="l-inner p-privacy__inner">

			<?php the_content(); ?>

			<?php if ( get_field( 'privacy_ttl' ) ) : ?>
				<h2 class="p-privacy__ttl">
					<?php the_field( 'privacy_ttl' ); ?>
				</h2>
			<?php endif; ?>
			<?php if ( get_field( 'privacy_desc' ) ) : ?>
				<p class="p-privacy__txt">
					<?php the_field( 'privacy_desc' ); ?>
				</p>
			<?php endif; ?>

			<?php if ( have_rows( 'privacy_list' ) ) : ?>
				<div class="p-privacy__list">
					<?php
					while ( have_rows( 'privacy_list' ) ) :
						the_row();
						?>
						<div class="p-privacy__item">
							<h3 class="p-privacy__item-ttl">
								<?php the_sub_field( 'ttl' ); ?>
							</h3>
							<p class="p-privacy__item-txt">
								<?php the_sub_field( 'desc' ); ?>
							</p>
							<?php if ( have_rows( 'num_desc' ) ) : ?>
								<ol class="p-privacy__item-order">
									<?php
									while ( have_rows( 'num_desc' ) ) :
										the_row();
										?>
										<?php if ( get_sub_field( 'desc' ) ) : ?>
											<li class="p-privacy__item-order-item">
												<?php the_sub_field( 'desc' ); ?>
											</li>
										<?php endif; ?>
									<?php endwhile; ?>
								</ol>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php if ( get_field( 'privacy_signature' ) ) : ?>
				<p class="p-privacy__signature">
					<?php the_field( 'privacy_signature' ); ?>
				</p>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
