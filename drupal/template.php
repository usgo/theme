<?php
function kabocha_preprocess_page(&$vars) {
    $my_scripts = drupal_add_js(NULL, NULL, 'header');
    unset($my_scripts['core']['misc/jquery.js']);
    $vars['scripts'] = drupal_get_js(NULL, $my_scripts);
}
?>
