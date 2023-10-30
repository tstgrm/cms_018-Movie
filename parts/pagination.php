<?php
/**
 * This is pagination.
 *
 * @package cms_12a WebAR
 */

?>

<?php if ( paginate_links() ) :  // ページが1ページ以上あれば以下を表示. ?>
	<div class="c-pagenation">
		<?php
			echo esc_html(
				paginate_links(
					array(
						'end_size'  => 0,
						'mid_size'  => 1,
						'prev_next' => true,
						'prev_text' => '<i class="fas fa-angle-left"></i>',
						'next_text' => '<i class="fas fa-angle-right"></i>',
					)
				)
			);
		?>

	</div>
<?php endif ?>
