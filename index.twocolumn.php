<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php $theme_dir = $_SERVER['DOCUMENT_ROOT'] . 'theme/'; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php require($theme_dir . "includes/meta.html"); ?>
        <title>Welcome to the American Go Association</title>
        <?php require($theme_dir . "includes/head.html"); ?>
    </head>
    <body>
        <div id="header">
            <?php require($theme_dir . "includes/header.html"); ?>
            <div id="navwrap">
                <?php require($theme_dir . "includes/navbar.html"); ?>
            </div>
        </div>
        <div id="container">
            <div id="fauxcolbgR" class="containfloats">
                <div id="contentwrapper">
                    <div id="content">
                        <?php require($theme_dir . "includes/content.dummy.html"); ?>
                    </div>
                </div>
                <div id="navcol" class="ie7fix">
                    <?php require($theme_dir . "includes/navcol.html"); ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <?php require($theme_dir . "includes/footer.html"); ?>
        </div>
        <div id="postfooter" class="containfloats">
            <?php require($theme_dir . "includes/postfooter.html"); ?>
        </div>
    </body>
</html>
<!--
Copyright 2010-2011 Joshua Simmons

All rights reserved
-->
