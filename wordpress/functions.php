<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));

function kobacha_mime_types($mime_types){
    $mime_types['sgf'] = 'application/x-go-sgf'; // Add  sgf extension
    return $mime_types;
}

add_filter( 'upload_mimes', 'kobacha_mime_types', 1, 1 );
?>
