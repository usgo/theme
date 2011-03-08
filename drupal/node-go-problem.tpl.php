<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include(path_to_theme() . "/includes/meta.html"); ?>
        <title><?php print $head_title ?></title>
        <?php print $styles; ?>
        <?php include(path_to_theme() . "/includes/head.html"); ?>
        <?php print $scripts; ?>
<?php
if (!empty($sidebar_second)) {
    print '<link rel="stylesheet" type="text/css" href="/theme/style/right_col.css" />';
}
if ($is_front) {
    include(path_to_theme() . "/includes/drupal.wphead.html");
} ?>
    </head>
    <body class="<?php print $body_classes; ?>">
        <div id="header">
            <?php include(path_to_theme() . "/includes/header.html"); ?>
            <div id="navwrap">
                <?php print theme('links', $secondary_links, array('class' => 'navbar', 'id' => 'headerlinks')) ?>
            </div>
        </div>
        <div id="container">
            <div id="fauxcolbgR" class="containfloats">
                <div id="contentwrapper">
                    <div id="content">
<?php
if (!empty($tabs)) {
    print "<div class=\"tabs\">$tabs</div>";
}
if ($show_messages && !empty($messages)) {
    print $messages;
}
if (!empty($help)) {
    print "<div id=\"help\">$help</div>";
}
?>
    <h1 id="pagetitle"><?php print $title; ?></h1>
    <h2>I AM A GO PROBLEM</h2>
    <?php print $content; ?>
                    </div>
                </div>
                <div id="navcol" class="ie7fix">
                    <?php print $sidebar_first; ?>
                </div>
<?php if (!empty($sidebar_second)) {
                print "<div id=\"extracol\">$sidebar_second</div>";
} ?>
            </div>
        </div>
        <div id="footer">
            <?php include(path_to_theme() . "/includes/footer.html"); ?>
        </div>
        <div id="postfooter" class="containfloats">
            <?php include(path_to_theme() . "/includes/ads.html"); ?>
            <?php print theme('links', menu_navigation_links('menu-footer-links'), array('id' => 'sitelinks')) ?>            
        </div>
        <?php print $closure;?>
    </body>
</html>
<!--
Copyright 2010 Joshua Simmons

All rights reserved
-->
