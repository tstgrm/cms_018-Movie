<?php
/**
 * This is cta parts.
 *
 * @package cms_018 Movie
 */

?>

<?php if ( have_rows( 'cta_contact', 'option' ) ) : ?>
	<?php
	while ( have_rows( 'cta_contact', 'option' ) ) :
		the_row();
		?>
			<div class="p-cta" style="background-image:url(<?php the_sub_field( 'bg' ); ?>)">
			<div class="p-cta__inner">
				<h2 class="c-section-ttl p-cta__ttl">
					<span class="c-section-ttl__main"><?php the_sub_field( 'ttl_main' ); ?></span>
				</h2>
				<p class="p-cta__desc"><?php the_sub_field( 'desc' ); ?></p>
				<?php
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
							<div class="c-btn c-btn--center c-btn--cv p-cta__btn">
								<a href="<?php echo esc_url( $page_link ); ?>"
								<?php
								if ( $target ) {
									echo ' target="_blank" rel="nofollow noopener"';}
								?>
								><?php the_sub_field( 'ttl' ); ?></a>
							</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
