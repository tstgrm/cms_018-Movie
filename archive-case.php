<?php
/**
 * This is archive case page.
 * 導入事例一覧ページ
 *
 * @package cms_018 Movie
 */

?>

<?php get_header(); ?>

<main class="l-main p-case">
	<?php get_template_part( 'parts/page-header' ); ?>

	<div class="p-case__posts">
		<div class="l-inner">
			<div class="c-search-filter p-case__filter">
				<div class="c-accordion js-accordion-item is-active">
					<div class="c-search-filter__head c-accordion__btn js-accordion-btn">条件で絞り込む</div>
					<div class="c-search-filter__body c-accordion__target js-accordion-target">
						<form id="search-form" role="search" medivod="get" action="<?php echo esc_url( home_url( '/case' ) ); ?>" class="c-form js-form">
							<div class="c-search-filter-table">
								<?php
									$taxonomy_1 = 'taxonomy1'; // タクソノミー名 ラベルとタームの取得に使用.
									$taxonomy_2 = 'taxonomy2';
									$taxonomy_3 = 'taxonomy3';

									$terms_1 = get_terms( 'taxonomy1' );
									$terms_2 = get_terms( 'taxonomy2' );
									$terms_3 = get_terms( 'taxonomy3' );

									$filter_condition = array();  // 現在絞り込み中の条件を格納・表示用.
								?>

								<?php
								if ( ! is_wp_error( $terms_1 ) ) :
									?>
									<div class="c-search-filter-table__row js-accordion-item-sp">
										<div class="c-search-filter-table__head js-accordion-btn-sp">
											<?php
												$labels = get_taxonomy( $taxonomy_1 ); // タクソノミーの情報を取得.
												echo esc_html( $labels->label ); // タクソノミーのラベル（名前）を表示.
											?>
										</div>
										<div class="c-search-filter-table__body js-accordion-target-sp">
											<ul class="c-search-filter-table__list">
												<?php
												foreach ( $terms_1 as $term_ ) : // 親タームのみ回す.
													$term_id    = $term_->term_id;
													$term_name  = $term_->name;
													$term_slug  = $term_->slug;
													$search_cat = array();

													// @codingStandardsIgnoreStart
													if ( ! empty( $_GET['taxonomy1'] ) ) { // $_POSTではなく$_GET.
														foreach ( $_GET['taxonomy1'] as $value ) {
															$search_cat[] = htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' );
														}
													}
													// @codingStandardsIgnoreEnd
													// チェックがついているタクソノミー（項目）にcheckedを付与するため.
													$checked = '';
													if ( in_array( $term_slug, $search_cat, true ) ) {
														$checked            = ' checked';
														$filter_condition[] = $term_name; // 現在絞り込み中の条件を格納.
													}
													?>
														<li class="c-search-filter-table__item">
															<label class="c-search-filter-table__label js-checkbox-label">
																<input type="checkbox" name="taxonomy1[]" value="<?php echo esc_attr( $term_slug ); ?>" class="js-checkbox" <?php echo esc_attr( $checked ); ?>>
																<?php echo esc_html( $term_name ); ?>
															</label>
														</li>
												<?php	endforeach; ?>
											</ul>
										</div>
									</div>
								<?php	endif; ?>

								<?php
								if ( ! is_wp_error( $terms_2 ) ) :
									?>
									<div class="c-search-filter-table__row js-accordion-item-sp">
										<div class="c-search-filter-table__head js-accordion-btn-sp">
											<?php
												$labels = get_taxonomy( $taxonomy_2 ); // タクソノミーの情報を取得.
												echo esc_html( $labels->label ); // タクソノミーのラベル（名前）を表示.
											?>
										</div>
										<div class="c-search-filter-table__body js-accordion-target-sp">
											<ul class="c-search-filter-table__list">
												<?php
												foreach ( $terms_2 as $term_ ) : // 親タームのみ回す.
													$term_id    = $term_->term_id;
													$term_name  = $term_->name;
													$term_slug  = $term_->slug;
													$search_cat = array();

													// @codingStandardsIgnoreStart
													if ( ! empty( $_GET['taxonomy2'] ) ) { // $_POSTではなく$_GET.
														foreach ( $_GET['taxonomy2'] as $value ) {
															$search_cat[] = htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' );
														}
													}
													// @codingStandardsIgnoreEnd
													// チェックがついているタクソノミー（項目）にcheckedを付与するため.
													$checked = '';
													if ( in_array( $term_slug, $search_cat, true ) ) {
														$checked            = ' checked';
														$filter_condition[] = $term_name; // 現在絞り込み中の条件を格納.
													};
													?>
														<li class="c-search-filter-table__item">
															<label class="c-search-filter-table__label js-checkbox-label">
																<input type="checkbox" name="taxonomy2[]" value="<?php echo esc_attr( $term_slug ); ?>" class="js-checkbox" <?php echo esc_attr( $checked ); ?>>
																<?php echo esc_html( $term_name ); ?>
															</label>
														</li>
												<?php	endforeach; ?>
											</ul>
										</div>
									</div>
								<?php	endif; ?>

								<?php
								if ( ! is_wp_error( $terms_3 ) ) :
									?>
									<div class="c-search-filter-table__row js-accordion-item-sp">
										<div class="c-search-filter-table__head js-accordion-btn-sp">
											<?php
												$labels = get_taxonomy( $taxonomy_3 ); // タクソノミーの情報を取得.
												echo esc_html( $labels->label ); // タクソノミーのラベル（名前）を表示.
											?>
										</div>
										<div class="c-search-filter-table__body js-accordion-target-sp">
											<ul class="c-search-filter-table__list">
												<?php
												foreach ( $terms_3 as $term_ ) : // 親タームのみ回す.
													$term_id    = $term_->term_id;
													$term_name  = $term_->name;
													$term_slug  = $term_->slug;
													$search_cat = array();

													// @codingStandardsIgnoreStart
													if ( ! empty( $_GET['taxonomy3'] ) ) { // $_POSTではなく$_GET.
														foreach ( $_GET['taxonomy3'] as $value ) {
															$search_cat[] = htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' );
														}
													}
													// @codingStandardsIgnoreEnd
													// チェックがついているタクソノミー（項目）にcheckedを付与するため.
													$checked = '';
													if ( in_array( $term_slug, $search_cat, true ) ) {
														$checked            = ' checked';
														$filter_condition[] = $term_name; // 現在絞り込み中の条件を格納.
													};
													?>
														<li class="c-search-filter-table__item">
															<label class="c-search-filter-table__label js-checkbox-label">
																<input type="checkbox" name="taxonomy3[]" value="<?php echo esc_attr( $term_slug ); ?>" class="js-checkbox" <?php echo esc_attr( $checked ); ?>>
																<?php echo esc_html( $term_name ); ?>
															</label>
														</li>
												<?php	endforeach; ?>
											</ul>
										</div>
									</div>
								<?php	endif; ?>

							</div>


							<div class="c-search-filter__submit-area c-shadow-btn c-shadow-btn--w">
								<input type="hidden" autocomplete="off">
								<button type="submit" form="search-form" value="検索する" class="c-search-filter__submit-btn">絞り込む</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="c-search-filter-selected p-case__selected js-search-filter-selected">
				<div class="c-search-filter-selected__head">絞り込み条件</div>
				<div class="c-search-filter-selected__body">
					<?php
					if ( ! empty( $filter_condition ) ) :
						foreach ( $filter_condition as $term_name ) :
							?>
								<p class="c-search-filter-selected__item">
									<?php echo esc_html( $term_name ); ?>
								</p>
							<?php
						endforeach;
					endif;
					?>
				</div>
			</div>

			<?php if ( have_posts() ) : ?>
				<div class="c-grid" data-grid="3">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
							<div class="c-grid__item">
								<?php get_template_part( 'parts/post-case' ); ?>
							</div>
						<?php
					endwhile;
					?>
				</div>

				<?php
				if ( function_exists( 'pagination' ) ) {
					pagination( $wp_query->max_num_pages );
				}
				?>
			<?php else : ?>
				<p class="p-case__no-exist">
					絞り込み条件に該当する結果はありませんでした。<br>
					再度、条件を変更してお試しください。
				</p>
			<?php endif; ?>
		</div>
	</div>

</main>

<?php get_footer(); ?>
