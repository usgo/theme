<?php require('/var/www/sites/usgo.org/news/wp-blog-header.php');
query_posts('cat=712,-1182,-542&showposts=5');
if (!have_posts())
{
    query_posts('cat=-1182&showposts=5');
}
if (have_posts()) :
?>
<h2 id="newsHL">Latest News</h2>
<ul id="news">
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title('<span>', '</span>');
if (function_exists('the_advanced_excerpt')) {
    the_advanced_excerpt('length=25&use_words=1&no_custom=1&ellipsis=%26hellip;&allowed_tags=strong,em');
}
else
{
    the_excerpt(); 
} ?>
</a></li>
<?php endwhile; ?>
    <li><a href="/news/?preview_theme=kabocha"><span>More News&hellip;</span></a></li>
    <li><a href="/news/feed/"><span class="rss"><abbr title="Really Simple Syndication">RSS</abbr> Feed</span></a></li>
</ul>
<?php endif; ?>
