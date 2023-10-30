<?php
/**
 * This is sns share buttons pats.
 *
 * @package cms_12a WebAR
 */

?>

<?php
	$url_encode   = rawurlencode( get_permalink() );
	$title_encode = rawurlencode( get_the_title() ) . '｜' . get_bloginfo( 'name' );
?>

<div class="c-sns-share">
	<span class="c-sns-share__label">記事をシェア</span>
	<ul class="c-sns-share__list">
		<li class="c-sns-share__item">
			<a class="c-sns-share__btn c-sns-share__btn--twitter" href="//twitter.com/intent/tweet?url=<?php echo $url_encode; ?>&text=<?php echo esc_attr( $title_encode ); ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
				<i class="c-icon c-icon--twitter"></i>
			</a>
		</li>
		<li class="c-sns-share__item">
			<a class="c-sns-share__btn c-sns-share__btn--facebook" href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode; ?>&t=<?php echo esc_attr( $title_encode ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
				<i class="c-icon c-icon--facebook"></i>
			</a>
		</li>
		<li class="c-sns-share__item">
			<a class="c-sns-share__btn c-sns-share__btn--line" href="//social-plugins.line.me/lineit/share?url=<?php echo $url_encode; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;">
				<i class="c-icon c-icon--line"></i>
			</a>
		</li>
	</ul>
</div>
