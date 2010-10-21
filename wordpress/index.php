<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
        <?php include(get_template_directory() . "/includes/meta.html"); ?>
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <style type="text/css" media="screen">
            @import url( <?php bloginfo('stylesheet_url'); ?> );
        </style>
        <?php include(get_template_directory() . "/includes/head.html"); ?>
        <link rel="stylesheet" type="text/css" href="/theme/style/right_col.css" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Feed" href="<?php bloginfo('rss2_url'); ?>" />
	    <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="header">
            <?php include(get_template_directory() . "/includes/header.html"); ?>
            <div id="navwrap">
                <?php include(get_template_directory() . "/includes/navbar.html"); ?>
            </div>
        </div>
        <div id="container">
            <div id="fauxcolbgR" class="containfloats">
                <div id="contentwrapper">
                    <div id="content">
                        <h1><?php bloginfo('name'); ?><?php wp_title(' &raquo; ', true, 'left'); ?></h1>
                        <?php global $query_string;
                        query_posts($query_string . "&cat=-1182");
                        include(get_template_directory() . "/includes/content.wordpress.php"); ?>
                    </div>
                </div>
                <div id="navcol" class="ie7fix">
                        <?php include(get_template_directory() . "/includes/navcol.html"); ?>
                </div>
                <div id="extracol">
                    <?php include(get_template_directory() . "/includes/extracol.wordpress.php"); ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <?php include(get_template_directory() . "/includes/footer.html"); ?>
        </div>
        <div id="postfooter" class="containfloats">
            <?php include(get_template_directory() . "/includes/postfooter.html"); ?>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
<!--
Copyright 2010 Joshua Simmons

All rights reserved
-->
