<?php
/**
 * This is price page.
 *
 * @package cms_12a WebAR
 */

/*
Template Name: PRICEテンプレート
*/
?>

<?php get_header(); ?>

<main class="l-main u-bg-blue">
	<?php get_template_part( 'parts/page-header' ); ?>

	<div class="c-section p-price u-pt-0">
		<div class="l-inner l-inner--tiny p-price__inner">
			<div class="p-price__body">
				<?php
				if ( have_rows( 'running_cost' ) ) :
					;
					?>
					<?php
					while ( have_rows( 'running_cost' ) ) :
						the_row();
						?>
						<h2 class="p-price-cost__head">
							<?php the_sub_field( 'headline' ); ?>
						</h2>
						<div class="p-price-cost__body">
							<?php if ( have_rows( 'plan' ) ) : ?>
								<?php
								while ( have_rows( 'plan' ) ) :
									the_row();
									?>
										<div class="p-price-box p-price-box--cost">
											<div class="p-price-box__inner">
												<h3 class="p-price-box__ttl">
													<?php the_sub_field( 'ttl' ); ?>
												</h3>
												<p class="p-price-box__desc">
													<?php the_sub_field( 'desc' ); ?>
												</p>
												<p class="p-price-box__note">
													<?php the_sub_field( 'note' ); ?>
												</p>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>

				<div class="p-price-plus">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2 12H22" stroke="black" stroke-width="4" stroke-linecap="round"/>
						<path d="M12 2L12 22" stroke="black" stroke-width="4" stroke-linecap="round"/>
					</svg>
				</div>

				<?php if ( have_rows( 'monthly_cost' ) ) : ?>
					<?php
					while ( have_rows( 'monthly_cost' ) ) :
						the_row();
						?>
							<h2 class="p-price-plan__head">
								<?php the_sub_field( 'headline' ); ?>
							</h2>
							<div class="p-price-plan__body">
								<?php if ( have_rows( 'plan' ) ) : ?>
									<?php
									while ( have_rows( 'plan' ) ) :
										the_row();
										?>
											<div class="p-price-box p-price-box--plan">
												<div class="p-price-box__inner">
													<h3 class="p-price-box__ttl">
														<?php the_sub_field( 'ttl' ); ?>
													</h3>
													<p class="p-price-box__desc">
														<?php the_sub_field( 'desc' ); ?>
													</p>
													<p class="p-price-box__note">
														<?php the_sub_field( 'note' ); ?>
													</p>
												</div>
											</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if ( have_rows( 'attention' ) ) : ?>
					<?php
					while ( have_rows( 'attention' ) ) :
						the_row();
						?>
						<div class="p-price-box p-price-box--attention">
							<h3 class="p-price-box__ttl">
								<?php the_sub_field( 'ttl' ); ?>
							</h3>
							<p class="p-price-box__note">
								<?php the_sub_field( 'desc' ); ?>
							</p>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<?php if ( get_field( 'btn' )['disp'] ) : ?>
				<?php
				while ( have_rows( 'btn' ) ) :
					the_row();
					$color     = '';
					$get_color = get_sub_field( 'color' );
					switch ( $get_color ) {
						case 'white':
							$color = '';
							break;
						case 'blue':
							$color = 'c-shadow-btn--blue';
							break;
						case 'yellow':
							$color = 'c-shadow-btn--yellow';
							break;
						default:
							$color = '';
							break;
					}
					?>
					<div class="c-section__btn c-shadow-btn <?php echo esc_attr( $color ); ?> p-top-about__btn c-btn--center">
						<a href="<?php echo esc_attr( get_sub_field( 'url' ) ? get_sub_field( 'url' ) : get_sub_field( 'link' ) ); ?>"
							<?php
							if ( get_sub_field( 'target' ) ) {
								echo 'target="_blank" rel="nofollow noopener"';}
							?>
							>
							<?php the_sub_field( 'label' ); ?>
						</a>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>




</main>

<?php get_footer(); ?>
