# www.usgo.org website theme and scripts
The AGA's usgo.org website theme and scripts for syncing usgo's Drupal and WordPress News sites.

# Theme Directories
- drupal: theme directory for the www.usgo.org.
- wordpress: theme directory for the current www.usgo.org/news.

# Requirements
- PHP
- Python (2.5+)
- BeautifulSoup
- Drush (8)
- pathlib
- pip
- urllib

# Drupal / and WP /news theme installation.
- Drupal: Create a symbolic link with `$ ln -s [usgo_drupal_root]/sites/all/themes/kabocha [usgo_theme_root]`.
- WP News: Create a symbolic link with `$ ln -s  [usgo_wp_news_root]/wp-content/themes [usgo_theme_root]/wordpress`.

# Configuring scrape_region.py
1) Copy within [usgo_theme_root]/includes/usgo_drupal_scrape_conf.default.py to [usgo_theme_root]/includes/usgo_drupal_scrape_conf.py.
2) Configure the usgo's `AGA_URL` and `AGA_WRITE_DIR` within [usgo_theme_root]/includes/usgo_drupal_scrape_conf.py.

# Installing Cron
1) Enter the www-data user's crontab with `$ crontab -u www-data -e`.
2) Create these cron entries in the www-data user's crontab and adjust for the installation:

### Drupal's Drush
```
@hourly /usr/bin/env PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin COLUMNS=72 /usr/local/bin/drush --root=[usgo_drupal_root_dir] --uri=[example.com] --quiet cron
```

### Scrape regions i.e., navwrap, navcol, ...
```
10,25,40,55 * * * * cd [usgo_theme_root]/includes && /usr/bin/python ./scrape_regions.py
```

### Generate a Wordpress header for Drupal and create drupal.wphead.cached.html
```
9,24,39,54 * * * * /usr/bin/php [usgo_theme_root]/includes/drupal.wphead.generate.php > [usgo_theme_root]/includes/drupal.wphead.cached.html
```

### Generate the frontpage content for Drupal and create drupal.frontpage.cached.html
```
0,4,8,12,16,20,24,28,32,36,40,44,48,52,56 * * * * /usr/bin/php [usgo_theme_root]/includes/drupal.frontpage.generate.php > [usgo_theme_root]/theme/includes/drupal.frontpage.cached.html
```

### Generate the wp newsbar column and create extracol.cached.html
```
7,22,37,52 * * * * /usr/bin/php [usgo_theme_root]/includes/newsbar.generate.php > [usgo_theme_root]/includes/extracol.cached.html
```
