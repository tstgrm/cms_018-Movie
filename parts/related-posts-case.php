<?php
/**
 * This is related posts part.
 *
 * @package cms_12a WebAR
 */

?>



<div class="c-related-posts c-related-posts--case">
	<h4 class="c-related-posts__ttl">
		<?php /*<i class="c-icon c-icon--article c-related-posts__ttl-icon"></i>*/ ?>
		こちらの事例もよく読まれています。
	</h4>
	<div class="c-related-posts__list">
		<?php
		/*
		if ( has_category() ) {
			$post_cats = get_the_category();
			$cat_ids   = array();
			// 所属カテゴリーのIDリストを作っておく.
			foreach ( $post_cats as $cat_ ) {
				$cat_ids[] = $cat_->term_id;
			}
		}*/
			$args = array(
				'post_type'      => 'case',
				'meta_key'       => 'post_views_count',
				'posts_per_page' => 3,
				'post__not_in'   => array( $post->ID ), // 表示中の投稿を除外.
				// 'category__in'   => $cat_ids, // この投稿と同じカテゴリーに属する投稿の中から.
				'orderby'        => 'rand', // ランダムに.
			);
			$my_query = new WP_Query( $args );
			if ( $my_query->have_posts() ) :
				while ( $my_query->have_posts() ) :
					$my_query->the_post();
					get_template_part( 'parts/post-case' );
				endwhile;
			endif;
			?>
	</div>
</div>
