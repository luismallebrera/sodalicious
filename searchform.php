<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<form class="vlt-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search', 'sodalicious' ); ?>" value="<?php echo get_search_query(); ?>">

	<button><i class="ri-search-line"></i></button>

</form>
<!-- /.vlt-search-form -->