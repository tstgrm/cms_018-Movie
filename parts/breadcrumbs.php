<?php
/**
 * This is breadcrumbs.
 *
 * @package cms_12a WebAR
 */

?>

<div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
	<?php
	if ( function_exists( 'bcn_display' ) ) {
		bcn_display();
	}
	?>
</div>
