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
				<?php if ( get_sub_field( 'movie' ) ) : ?>
					<div class="p-top-visual__bg">
						<figure>
							<video src="<?php the_sub_field( 'movie' ); ?>" autoplay loop muted playsinline></video>
						</figure>
					</div>
				<?php endif; ?>

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

					<!-- <?php if ( get_sub_field( 'movie' ) ) : ?>
						<div class="p-top-visual__bg">
							<figure class="p-top-visual">
								<video src="<?php the_sub_field( 'movie' ); ?>" autoplay loop muted playsinline></video>
							</figure>
						</div>
					<?php endif; ?> -->

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
												<div class="c-btn c-btn--cv p-top-visual-cta__btn">
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

						<div class="c-scroll">scroll</div>
					</div>


				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- VOICE -->
	<?php if ( get_field( 'top_voice' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_voice' ) ) :
			the_row();
			?>
			<section id="voice" class="c-section p-top-voice">
				<div class="p-top-voice__inner">

					<h2 class="c-section-ttl p-top-voice__ttl">
						<?php if ( get_sub_field( 'ttl_sub' ) ) : ?>
							<span class="c-section-ttl__sub">
								<?php the_sub_field( 'ttl_sub' ); ?>
							</span>
						<?php endif; ?>
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<span class="c-section-ttl__main">
								<?php the_sub_field( 'ttl_main' ); ?>
							</span>
						<?php endif; ?>
					</h2>

					<?php if ( get_sub_field( 'desc' ) ) : ?>
						<p class="c-section__desc p-top-voice__desc u-text-left">
							<?php the_sub_field( 'desc' ); ?>
						</p>
					<?php endif; ?>

					<?php	if ( have_rows( 'list' ) ) : ?>
						<div class="c-section__body p-top-voice__body js-top-voice-slider">
							<div class="p-top-voice__slider swiper">
								<ul class="p-top-voice__list swiper-wrapper">
									<?php
									while ( have_rows( 'list' ) ) :
										the_row();
										?>
										<li class="p-top-voice__item swiper-slide">
											<div class="p-top-voice__item-inner">
												<?php
													$course = get_sub_field( 'course' );
												switch ( $course['value'] ) {
													case 'basic':
														$select_course = '--basic';
														break;
													case 'standard':
														$select_course = '--standard';
														break;
													case 'premium':
														$select_course = '--premium';
														break;
													default:
														$select_course = '';
														break;
												}
												?>
												<div class="p-post-voice<?php echo esc_attr( ' p-post-voice' . $select_course ); ?> js-match-height">
													<div class="p-post-voice__label"><?php echo esc_html( $course['label'] ); ?></div>
													<div class="p-post-voice__profile">
														<img src="<?php the_sub_field( 'img' ); ?>" alt="<?php the_sub_field( 'name' ); ?>" class="p-post-voice__img">
														<p class="p-post-voice__name"><?php the_sub_field( 'name' ); ?></p>
													</div>
													<?php if ( get_sub_field( 'ttl' ) ) : ?>
														<div class="p-post-voice__ttl-wrap">
															<h3 class="p-post-voice__ttl"><?php the_sub_field( 'ttl' ); ?></h3>
														</div>
													<?php endif; ?>
													<?php if ( get_sub_field( 'desc' ) ) : ?>
														<p class="p-post-voice__desc"><?php the_sub_field( 'desc' ); ?></p>
														<?php endif; ?>
													<?php if ( have_rows( 'before_after' ) ) : ?>
														<?php
														while ( have_rows( 'before_after' ) ) :
															the_row();
															?>
															<dl class="p-post-voice__ba">
																<div class="p-post-voice__before">
																	<dt>Before</dt>
																	<dd><?php the_sub_field( 'before' ); ?></dd>
																</div>
																<div class="p-post-voice__after">
																	<dt>After</dt>
																	<dd><?php the_sub_field( 'after' ); ?></dd>
																</div>
															</dl>
														<?php endwhile; ?>
													<?php endif; ?>
												</div>
											</div>
										</li>
									<?php	endwhile; ?>
								</ul>
								<div class="p-top-voice-slider-btn p-top-voice-slider-btn--prev swiper-button-prev"></div>
								<div class="p-top-voice-slider-btn p-top-voice-slider-btn--next swiper-button-next"></div>
								<div class="p-top-voice-slider__pagination swiper-pagination"></div>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- RECOMMEND -->
	<?php if ( get_field( 'top_recommend' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_recommend' ) ) :
			the_row();
			?>
			<section id="recommend" class="c-section p-top-recommend">
				<div class="l-inner p-top-recommend__inner">
					<h2 class="c-section-ttl p-top-recommend__ttl">
						<?php if ( get_sub_field( 'ttl_sub' ) ) : ?>
							<span class="c-section-ttl__sub">
								<?php the_sub_field( 'ttl_sub' ); ?>
							</span>
						<?php endif; ?>
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<span class="c-section-ttl__main">
								<?php the_sub_field( 'ttl_main' ); ?>
							</span>
						<?php endif; ?>
					</h2>

					<div class="c-section__body p-top-recommend__body">
						<div class="u-pc-col2 u-1/1">
							<?php
								$img_sp = get_sub_field( 'img_sp' ) ? get_sub_field( 'img_sp' ) : get_sub_field( 'img' );
							?>
							<figure class="p-top-recommend__img u-ratio-4/3">
								<picture>
									<source srcset="<?php the_sub_field( 'img_sp' ); ?>" media="(max-width: 1024px)">
									<source srcset="<?php the_sub_field( 'img' ); ?>" media="(min-width: 1025px)">
									<img src="<?php the_sub_field( 'img' ); ?>" class="u-object-fill u-ratio-4/3">
								</picture>
							</figure>
							<?php if ( have_rows( 'list' ) ) : ?>
								<ul class="p-top-recommend__list">
									<?php
									while ( have_rows( 'list' ) ) :
										the_row();
										?>
										<li class="p-top-recommend-item">
											<p class="p-top-recommend-item__desc"><i class="c-icon-checkbox"></i><?php the_sub_field( 'desc' ); ?></p>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>

						<?php if ( have_rows( 'text_box' ) ) : ?>
							<?php
							while ( have_rows( 'text_box' ) ) :
								the_row();
								?>
								<div class="p-top-recommend-box">
									<h3 class="c-section-ttl p-top-recommend-box__ttl"><?php the_sub_field( 'ttl' ); ?></h3>
									<p class="p-top-recommend-box__desc"><?php the_sub_field( 'desc' ); ?></p>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- REASON -->
	<?php if ( get_field( 'top_reason' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_reason' ) ) :
			the_row();
			?>
			<section id="instro" class="c-section p-top-reason">
				<div class="l-inner p-top-reason__inner">
					<h2 class="c-section-ttl p-top-reason__ttl">
						<?php if ( get_sub_field( 'ttl_sub' ) ) : ?>
						<span class="c-section-ttl__sub">
							<?php the_sub_field( 'ttl_sub' ); ?>
						</span>
					<?php endif; ?>
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<span class="c-section-ttl__main">
								<?php the_sub_field( 'ttl_main' ); ?>
							</span>
						<?php endif; ?>
					</h2>

					<?php if ( have_rows( 'list' ) ) : ?>
						<div class="c-section__body p-top-reason__body">
							<ol class="p-top-reason__list">
								<?php
								while ( have_rows( 'list' ) ) :
									the_row();
									?>
										<li class="p-top-reason-item">
											<div class="p-top-reason-item__content">
												<div class="p-top-reason-item__index"></div>
												<h3 class="p-top-reason-item__ttl"><?php the_sub_field( 'ttl' ); ?></h3>
												<p class="p-top-reason-item__desc"><?php the_sub_field( 'desc' ); ?></p>
											</div>
											<div class="p-top-reason-item__image">
												<?php
												if ( get_sub_field( 'img' ) ) :
													$img    = get_sub_field( 'img' );
													$img_sp = get_sub_field( 'img_sp' ) ? get_sub_field( 'img_sp' ) : get_sub_field( 'img' );

													$ttl = wp_strip_all_tags( get_sub_field( 'ttl' ) );
													?>
														<figure>
															<picture>
																<source srcset="<?php echo esc_url( $img_sp ); ?>" media="(max-width: 1024px)">
																<source srcset="<?php the_sub_field( 'img' ); ?>" media="(min-width: 1025px)">
																<img src="<?php echo esc_url( $img_sp ); ?>" alt="<?php echo esc_html( $ttl ); ?>">
															</picture>
														</figure>
													<?php endif; ?>
											</div>

										</li>
								<?php endwhile; ?>
							</ol>
						</div>
					<?php endif; ?>

				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php get_template_part( 'parts/cta' ); ?>

	<!-- COURSE -->
	<?php if ( get_field( 'top_course' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_course' ) ) :
			the_row();
			?>
			<section id="course" class="c-section p-top-course">
				<div class="p-top-course__inner">

					<h2 class="c-section-ttl p-top-course__ttl">
						<?php if ( get_sub_field( 'ttl_sub' ) ) : ?>
							<span class="c-section-ttl__sub">
								<?php the_sub_field( 'ttl_sub' ); ?>
							</span>
						<?php endif; ?>
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<span class="c-section-ttl__main">
								<?php the_sub_field( 'ttl_main' ); ?>
							</span>
						<?php endif; ?>
					</h2>

					<?php	if ( have_rows( 'course' ) ) : ?>
						<div class="c-section__body p-top-course__body js-top-course-slider">
							<div class="p-top-course__slider swiper">
								<ul class="p-top-course__list swiper-wrapper">
									<?php
									$count = 0;
									while ( have_rows( 'course' ) ) :
										the_row();
										$count++;
										$course = '';
										switch ( $count ) {
											case 1:
												$course = ' p-post-course--basic';
												break;
											case 2:
												$course = ' p-post-course--standard';
												break;
											case 3:
												$course = ' p-post-course--premium';
												break;
										}
										?>
										<li class="p-top-course__item swiper-slide">
											<div class="p-top-course__item-inner">
												<div class="p-post-course<?php echo esc_attr( $course ); ?> js-match-height__course">
													<div class="p-post-course__label"><?php the_sub_field( 'label' ); ?></div>
													<?php if ( get_sub_field( 'ttl' ) ) : ?>
														<h3 class="p-post-course__ttl"><?php the_sub_field( 'ttl' ); ?></h3>
														<p class="p-post-course__price"><?php the_sub_field( 'price' ); ?></p>
													<?php endif; ?>
													<?php
													if ( have_rows( 'list' ) ) :
														?>
														<ul class="p-post-course__list">
															<?php
															while ( have_rows( 'list' ) ) :
																the_row();
																?>
															<li class="p-post-course__item">
																<p class="p-post-course__desc"><i class="c-icon-check-circle"></i><?php the_sub_field( 'desc' ); ?></p>
															</li>
															<?php endwhile; ?>
														</ul>
													<?php endif; ?>
												</div>
											</div>
										</li>
									<?php	endwhile; ?>
								</ul>
								<div class="p-top-course-slider-btn p-top-course-slider-btn--prev swiper-button-prev"></div>
								<div class="p-top-course-slider-btn p-top-course-slider-btn--next swiper-button-next"></div>
								<div class="p-top-course-slider__pagination swiper-pagination"></div>
							</div>
						</div>
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
				<div class="l-inner l-inner--narrow p-top-flow__inner">
					<h2 class="c-section-ttl p-top-flow__ttl">
						<?php if ( get_sub_field( 'ttl_sub' ) ) : ?>
							<span class="c-section-ttl__sub">
								<?php the_sub_field( 'ttl_sub' ); ?>
							</span>
						<?php endif; ?>
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<span class="c-section-ttl__main">
								<?php the_sub_field( 'ttl_main' ); ?>
							</span>
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
										<div class="p-top-flow-item__index"></div>
										<p class="p-top-flow-item__ttl"><?php the_sub_field( 'ttl' ); ?></p>
										<p class="p-top-flow-item__desc"><?php the_sub_field( 'desc' ); ?></p>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
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
						<?php if ( get_sub_field( 'ttl_sub' ) ) : ?>
							<span class="c-section-ttl__sub">
								<?php the_sub_field( 'ttl_sub' ); ?>
							</span>
						<?php endif; ?>
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

					</div>

				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- CONTACT -->
	<?php if ( get_field( 'top_contact' )['disp'] ) : ?>
		<?php
		while ( have_rows( 'top_contact' ) ) :
			the_row();
			?>
			<section id="contact" class="c-section p-top-contact">
				<div class="l-inner p-top-contact__inner">

					<h2 class="c-section-ttl p-top-contact__ttl">
						<?php if ( get_sub_field( 'ttl_sub' ) ) : ?>
							<span class="c-section-ttl__sub"><?php the_sub_field( 'ttl_sub' ); ?></span>
						<?php endif; ?>
						<?php if ( get_sub_field( 'ttl_main' ) ) : ?>
							<span class="c-section-ttl__main">
								<?php the_sub_field( 'ttl_main' ); ?>
							</span>
						<?php endif; ?>
					</h2>

					<div class="l-inner l-inner--narrow c-section__body p-top-contact__body">
						<div class="p-top-contact__form">
							<?php echo do_shortcode( '[contact-form-7 id="516a5e1" title="お問い合わせ"]' ); ?>
						</div>
					</div>

				</div>

			</section>
		<?php endwhile; ?>
	<?php endif; ?>

</div>

<?php get_footer(); ?>
