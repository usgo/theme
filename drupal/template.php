<?php
function kabocha_preprocess_page(&$variables) {
  if(!empty($variables['page']['sidebar_second'])) {
    drupal_add_css(path_to_theme() . '/style/right_col.css');
  }
}
?>
