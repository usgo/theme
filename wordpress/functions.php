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

function add_editor_unfiltered_all($caps)
{
    $user = wp_get_current_user();

    // Allow Unfiltered Uploads cap for the Editor role.
    if ( in_array( 'editor', (array) $user->roles ) ) {
        $caps['unfiltered_upload'] = 1;
    }
    return $caps;
}

add_filter( 'user_has_cap', 'add_editor_unfiltered_all');

add_filter( 'upload_mimes', 'kobacha_mime_types', 1, 1 );
?>
