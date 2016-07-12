<?php
add_filter( 'vc_iconpicker-type-etline', 'zo_add_custom_font' );
function zo_add_custom_font($icons) {
	$list_icons = array(
		array( "icon-happy" => __( "Happy", "semitri" ) ),
		array( "icon-sad" => __( "Sad", "semitri" ) ),
	);
	return array_merge( $icons, $list_icons );
}