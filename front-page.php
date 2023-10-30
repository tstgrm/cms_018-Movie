<?php
/**
 * This is front page.
 *
 * @package cms_018 Movie
 */

?>

<?php get_header(); ?>

<div id="main" class="l-main">

	<!-- TOP VISUAL -->
	<?php if ( have_rows( 'top_visual' ) ) : ?>
		<?php
		while ( have_rows( 'top_visual' ) ) :
			the_row();
			?>
			<div class="p-top-visual">
				<div class="l-inner p-top-visual__inner">

					<div class="p-top-visual__content">
						<?php if ( get_sub_field( 'catchcopy' ) ) : ?>
							<h1 class="p-top-visual__catchcopy">
								<?php the_sub_field( 'catchcopy' ); ?>
							</h1>
						<?php endif; ?>
						<?php if ( get_sub_field( 'desc' ) ) : ?>
							<p class="p-top-visual__desc">
								<?php the_sub_field( 'desc' ); ?>
							</p>
						<?php endif; ?>

						<div class="p-top-visual__image u-hidden-pc">
							<img src="<?php the_sub_field( 'img' ); ?>">
						</div>

						<div class="p-top-visual-cta">
							<?php if ( have_rows( 'cta_contact', 'option' ) ) : ?>
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
												<div class="c-btn p-top-visual-cta__btn">
													<a href="<?php echo esc_url( $page_link ); ?>"
														<?php
														if ( $target ) {
															echo ' target="_blank" rel="nofollow noopener"';}
														?>
													><?php the_sub_field( 'ttl' ); ?></a>
												</div>
										<?php endwhile; ?>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>

							<?php if ( have_rows( 'cta_download', 'option' ) ) : ?>
								<?php
								while ( have_rows( 'cta_download', 'option' ) ) :
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
												<div class="c-btn c-btn--yellow  p-top-visual-cta__btn">
													<a href="<?php echo esc_url( $page_link ); ?>"
														<?php
														if ( $target ) {
															echo ' target="_blank" rel="nofollow noopener"';}
														?>
													><?php the_sub_field( 'ttl' ); ?></a>
												</div>
										<?php endwhile; ?>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>

					<div class="p-top-visual__image u-hidden-sp">
						<img src="<?php the_sub_field( 'img' ); ?>">
					</div>

				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- ABOUT -->
	<?php if ( get_field( 'top_about' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_about' ) ) :
			the_row();
			?>
			<section id="about" class="c-section p-top-about">
				<div class="l-inner p-top-about__inner">
					<h2 class="c-section-ttl p-top-about__ttl">
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<?php the_sub_field( 'ttl_main' ); ?>
						<?php endif; ?>
					</h2>

					<?php if ( get_sub_field( 'desc' ) ) : ?>
						<p class="c-section__desc p-top-about__desc">
							<?php the_sub_field( 'desc' ); ?>
						</p>
					<?php endif; ?>

					<?php if ( have_rows( 'list' ) ) : ?>
						<div class="c-section__body p-top-about__body">
							<ul class="p-top-about__list">
								<?php
								while ( have_rows( 'list' ) ) :
									the_row();
									?>
									<li class="p-top-about-item">
										<div class="p-top-about-item__thumb">
											<figure class="c-figure c-figure--square p-top-about-item__figure">
												<img src="<?php the_sub_field( 'img' ); ?>" alt="" class="c-figure__img p-top-about-item__img">
											</figure>
										</div>
										<p class="p-top-about-item__desc"><?php the_sub_field( 'desc' ); ?></p>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php if ( get_sub_field( 'btn' )['disp'] ) : ?>
						<?php
						while ( have_rows( 'btn' ) ) :
							the_row();
							$color = get_sub_field( 'color' );
							switch ( $color ) {
								case 'white':
									$color = '';
									break;
								case 'blue':
									$color = ' c-btn--blue';
									break;
								case 'yellow':
									$color = ' c-btn--yellow';
									break;
								default:
									$color = '';
									break;
							}
							?>
							<div class="c-section__btn c-btn<?php echo esc_attr( $color ); ?> p-top-about__btn c-btn--center">
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
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- INTRO -->
	<?php if ( get_field( 'top_intro' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_intro' ) ) :
			the_row();
			?>
			<section id="instro" class="p-top-intro">
				<div class="p-top-intro__inner">
					<div class="c-section p-top-intro__problem">

						<h2 class="c-section-ttl p-top-intro__ttl">
							<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
								<span class="c-section-ttl__main">
									<?php the_sub_field( 'ttl_main' ); ?>
								</span>
							<?php endif; ?>
						</h2>

						<?php if ( get_sub_field( 'desc' ) ) : ?>
							<p class="c-section__desc p-top-intro__desc u-text-left">
								<?php the_sub_field( 'desc' ); ?>
							</p>
						<?php endif; ?>

						<div class="l-inner c-section__body">
							<?php if ( have_rows( 'list' ) ) : ?>
								<ul class="p-top-intro__list">
									<?php
									while ( have_rows( 'list' ) ) :
										the_row();
										?>
										<li class="p-top-intro-item">
											<figure class="p-top-intro-item__image">
												<img src="<?php the_sub_field( 'img' ); ?>" alt="">
											</figure>
											<p class="p-top-intro-item__desc"><?php the_sub_field( 'desc' ); ?></p>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/_static/dist/img/problem-bottom-bg.png" alt="" class="p-top-intro__problem-bg">
					</div>

					<?php if ( have_rows( 'section' ) ) : ?>
						<div class="c-section p-top-intro__sections">
							<?php
							while ( have_rows( 'section' ) ) :
								the_row();
								?>
								<section class="p-top-intro-section">
									<div class="l-inner p-top-intro-section__inner">
										<div class="p-top-intro-section__content">
											<p class="p-top-intro-section__index">SOLUTION</p>
											<h3 class="p-top-intro-section__ttl"><?php the_sub_field( 'ttl' ); ?></h3>
											<p class="p-top-intro-section__desc"><?php the_sub_field( 'desc' ); ?></p>
											<div class="p-top-intro-section__bg-text">
												<span>
													<?php the_sub_field( 'bg_text' ); ?>
												</span>
											</div>
										</div>
										<div class="p-top-intro-section__image">
											<?php
											if ( get_sub_field( 'img' ) ) :
												$img    = get_sub_field( 'img' );
												$img_sp = get_sub_field( 'img_sp' ) ? get_sub_field( 'img_sp' ) : get_sub_field( 'img' );

												$ttl = wp_strip_all_tags( get_sub_field( 'ttl' ) );
												?>
													<picture>
														<source srcset="<?php echo esc_url( $img_sp ); ?>" media="(max-width: 1024px)">
														<source srcset="<?php the_sub_field( 'img' ); ?>" media="(min-width: 1025px)">
														<img src="<?php echo esc_url( $img_sp ); ?>" alt="<?php echo esc_html( $ttl ); ?>">
													</picture>
												<?php endif; ?>
										</div>

									</div>
								</section>
							<?php endwhile; ?>

							<?php if ( get_sub_field( 'btn' )['disp'] ) : ?>
								<?php
								while ( have_rows( 'btn' ) ) :
									the_row();
									$color = get_sub_field( 'color' );
									switch ( $color ) {
										case 'white':
											$color = '';
											break;
										case 'blue':
											$color = ' c-btn--blue';
											break;
										case 'yellow':
											$color = ' c-btn--yellow';
											break;
										default:
											$color = '';
											break;
									}
									?>
									<div class="l-inner c-section__btn c-btn<?php echo esc_attr( $color ); ?> p-top-intro__btn c-btn--center">
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
					<?php endif; ?>



				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- CASE -->
	<?php if ( get_field( 'top_case' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_case' ) ) :
			the_row();
			?>
			<section id="case" class="c-section p-top-case" style="background-image:url(<?php the_sub_field( 'bg' ); ?>)">
				<div class="l-inner p-top-case__inner">

					<h2 class="c-section-ttl p-top-case__ttl">
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<span class="c-section-ttl__main">
								<?php the_sub_field( 'ttl_main' ); ?>
							</span>
						<?php endif; ?>
					</h2>

					<?php if ( get_sub_field( 'desc' ) ) : ?>
						<p class="c-section__desc p-top-case__desc u-text-left">
							<?php the_sub_field( 'desc' ); ?>
						</p>
					<?php endif; ?>

					<?php
						$args     = array(
							'paged'          => get_query_var( 'paged' ),
							'post_type'      => 'case',
							'posts_per_page' => '3',
							'orderby'        => 'date',
							'order'          => 'DESC',
						);
						$my_query = new WP_Query( $args );

						if ( $my_query->have_posts() ) :
							?>
							<div class="c-section__body p-top-case__body js-top-case-slider">
								<div class="p-top-case__slider swiper">
									<ul class="p-top-case__list swiper-wrapper">
										<?php
										while ( $my_query->have_posts() ) :
											$my_query->the_post();
											$category = get_the_category();
											?>
												<li class="p-top-case__item swiper-slide">
													<div class="p-top-case__item-inner">
														<?php get_template_part( 'parts/post-case' ); ?>
													</div>
												</li>
											<?php
										endwhile;
										wp_reset_postdata();
										?>
									</ul>
								</div>
								<div class="swiper-button-prev u-hidden-pc"></div>
								<div class="swiper-button-next u-hidden-pc"></div>
							</div>
					<?php endif; ?>

					<?php if ( get_sub_field( 'btn' )['disp'] ) : ?>
						<?php
						while ( have_rows( 'btn' ) ) :
							the_row();
							$color = get_sub_field( 'color' );
							switch ( $color ) {
								case 'white':
									$color = '';
									break;
								case 'blue':
									$color = ' c-btn--blue';
									break;
								case 'yellow':
									$color = ' c-btn--yellow';
									break;
								default:
									$color = '';
									break;
							}
							?>
							<div class="c-section__btn c-btn<?php echo esc_attr( $color ); ?> p-top-case__btn c-btn--center">
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
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- FLOW	 -->
	<?php if ( get_field( 'top_flow' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_flow' ) ) :
			the_row();
			?>
			<section id="flow" class="c-section p-top-flow
			<?php
			if ( ! get_sub_field( 'btn' )['disp'] ) {
				echo esc_attr( ' is-no-btn' );}
			?>
			">
				<div class="l-inner p-top-flow__inner">
					<h2 class="c-section-ttl p-top-flow__ttl">
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<?php the_sub_field( 'ttl_main' ); ?>
						<?php endif; ?>
					</h2>

					<?php if ( get_sub_field( 'desc' ) ) : ?>
						<p class="c-section__desc p-top-flow__desc">
							<?php the_sub_field( 'desc' ); ?>
						</p>
					<?php endif; ?>

					<?php if ( have_rows( 'list' ) ) : ?>
						<div class="c-section__body p-top-flow__body">
							<ul class="p-top-flow__list js-scrollable-sp">
								<?php
								while ( have_rows( 'list' ) ) :
									the_row();
									?>
									<li class="p-top-flow-item">
										<div class="p-top-flow-item__index">
											STEP
										</div>
										<p class="p-top-flow-item__ttl"><?php the_sub_field( 'ttl' ); ?></p>
										<p class="p-top-flow-item__desc"><?php the_sub_field( 'desc' ); ?></p>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php if ( get_sub_field( 'btn' )['disp'] ) : ?>
						<?php
						while ( have_rows( 'btn' ) ) :
							the_row();
							$color = get_sub_field( 'color' );
							switch ( $color ) {
								case 'white':
									$color = '';
									break;
								case 'blue':
									$color = ' c-btn--blue';
									break;
								case 'yellow':
									$color = ' c-btn--yellow';
									break;
								default:
									$color = '';
									break;
							}
							?>
							<div class="c-section__btn c-btn<?php echo esc_attr( $color ); ?> p-top-flow__btn c-btn--center">
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
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- FAQ -->
	<?php if ( get_field( 'top_faq' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_faq' ) ) :
			the_row();
			?>
			<section id="faq" class="c-section p-top-faq">
				<div class="l-inner l-inner--narrow p-top-faq__inner">

					<h2 class="c-section-ttl p-top-faq__ttl">
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<span class="c-section-ttl__main">
								<?php the_sub_field( 'ttl_main' ); ?>
							</span>
						<?php endif; ?>
					</h2>

					<?php if ( get_sub_field( 'desc' ) ) : ?>
						<p class="c-section__desc p-top-faq__desc">
							<?php the_sub_field( 'desc' ); ?>
						</p>
					<?php endif; ?>

					<div class="c-section__body p-top-faq__body">
						<?php
						$faq_page_id = get_page_by_path( 'faq' );
						$faq_page_id = $faq_page_id->ID;
						if ( have_rows( 'qa', $faq_page_id ) ) :
							?>
								<ul class="c-faq-list u-1/1">
									<?php
									$count = 0;
									while ( have_rows( 'qa', $faq_page_id ) ) :
										the_row();
										$count++;
										if ( 4 > $count ) :
											?>
											<li class="c-faq-list__item js-accordion-item">
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
										<?php endif; ?>
									<?php endwhile; ?>
								</ul>
						<?php endif; ?>

						<?php if ( get_sub_field( 'btn' )['disp'] ) : ?>
							<?php
							while ( have_rows( 'btn' ) ) :
								the_row();
								?>
								<div class="c-section__btn c-btn p-top-faq__btn c-btn--center">
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
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- NEWS -->
	<?php if ( get_field( 'top_news' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_news' ) ) :
			the_row();
			?>
				<section id="news" class="c-section p-top-news">
					<div class="l-inner l-inner--narrow p-top-news__inner">
						<h2 class="c-section-ttl p-top-news__ttl">
							<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
								<span class="c-section-ttl__main">
									<?php the_sub_field( 'ttl_main' ); ?>
								</span>
							<?php endif; ?>
						</h2>
						<?php
							$args     = array(
								'post_type'      => 'post',
								'posts_per_page' => '3',
								'orderby'        => 'date',
								'order'          => 'DESC',
							);
							$my_query = new WP_Query( $args );

							if ( $my_query->have_posts() ) :
								?>
								<div class="c-section__body p-top-news__body">
									<ul class="c-border-list p-top-news__list">
										<?php
										while ( $my_query->have_posts() ) :
											$my_query->the_post();
											?>
												<li class="c-border-list__item p-top-news__item">
													<?php get_template_part( 'parts/post-news' ); ?>
												</li>
											<?php
										endwhile;
										wp_reset_postdata();
										?>
									</ul>

									<?php if ( get_sub_field( 'btn' )['disp'] ) : ?>
										<?php
										while ( have_rows( 'btn' ) ) :
											the_row();
											?>
											<div class="c-section__btn c-btn p-top-faq__btn c-btn--center">
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
						<?php endif; ?>
					</div>
				</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- INSTAGRAM -->
	<?php if ( get_field( 'top_sns' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_sns' ) ) :
			the_row();
			?>
			<section id="instagram" class="c-section p-top-sns">
				<div class="l-inner p-top-sns__inner">

					<h2 class="c-section-ttl p-top-sns__ttl">
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<span class="c-section-ttl__main">
								<?php the_sub_field( 'ttl_main' ); ?>
							</span>
						<?php endif; ?>
					</h2>

					<div class="c-section__body">
						<?php echo do_shortcode( '[instagram-feed feed=2]' ); ?>
					</div>

				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

</div>

<?php get_footer(); ?>
