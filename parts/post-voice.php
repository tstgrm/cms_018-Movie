<?php
/**
 * This is post parts.
 *
 * @package cms_018 Movie
 */

?>

<a href="<?php the_permalink(); ?>" class="c-post-voice">

	<figure class="c-figure c-post-voice__figure">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail(
				'post-thumbnail',
				array(
					'class' => 'c-post-voice__img c-figure__img',
					'alt'   => wp_strip_all_tags( get_the_title() ),
				)
			);
		} else {
			echo '<img src="' . esc_url( get_template_directory_uri() ) . '/_static/dist/img/noimage.png" alt="noimage" class="c-post-voice__img c-figure__img">';
		}
		?>
	</figure>


</a>