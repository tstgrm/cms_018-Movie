<?php
/**
 * This is news post parts.
 *
 * @package cms_12a WebAR
 */

?>

<a href="<?php the_permalink(); ?>" class="c-post-news">
	<div class="c-post-news__date">
		<time datetime="<?php the_time( 'Y.n.j' ); ?>">
			<?php the_time( 'Y.n.j' ); ?>
		</time>
	</div>
	<p class="c-post-news__ttl">
		<?php the_title(); ?>
	</p>
</a>
