<?php require('/var/www/wordpress/wp-blog-header.php');
query_posts('cat=712&showposts=5');
if (!have_posts())
{
    query_posts('showposts=3');
}
include('content.wordpress.php');
?>
