<?php
$content_uri = $fields['path']->content;
$title = $fields['title']->content;
$sgf_uri = $row->field_field_sgf[0]['raw']['uri'];
$auto_base = "/weekly_sgf_preview/" . array_pop(explode("/", $sgf_uri));
if (!empty($row->field_field_sgf_preview)) {
  $png_uri = file_create_url($row->field_field_sgf_preview[0]['raw']['uri']);
}
else {
  $png_uri = $auto_base . ".png";
}
$auto_to_play = @file_get_contents('/var/www/usgo.org' . $auto_base . '.toplay');
$to_play = $fields['field_to_play']->content;
$img = "<img src=\"$png_uri\" alt=\"$title\" />";
print "<a class=\"potwpreview\" href=\"$content_uri\" title=\"$title\">$img</a>";
if ($to_play != "Automatic") {
  print "<p class=\"potwtoplay\">$to_play to play</p>";
}
elseif ($auto_to_play != FALSE) {
  print "<p class=\"potwtoplay\">$auto_to_play to play</p>";
}
?>
