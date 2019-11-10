<?php
// Get the location of the /news directory.
$drupal_frontpage_news_dir = dirname(__DIR__, 2) . "/usgo_org_current/news-app";

require($drupal_frontpage_news_dir . '/wp-blog-header.php');

query_posts('cat=712,-1182&showposts=5');

if (!have_posts())
{
    query_posts('cat=-1182&showposts=3');
}
include('content.wordpress.php');
?>
