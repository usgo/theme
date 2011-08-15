<?php require('/var/www/usgo.org/news/wp-blog-header.php');
query_posts('cat=712,-1182&showposts=5');
if (!have_posts())
{
    query_posts('cat=-1182&showposts=3');
}
include('content.wordpress.php');
?>
