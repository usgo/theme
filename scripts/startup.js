jQuery(document).ready(function() {
    if (init_expanding_menu()) {
        jQuery('.expanding').removeClass('flyout')
                            .addClass('expand');
        /* ie7fix only needed for flyout, so removeClass if javascript works */
        jQuery('.ie7fix').removeClass('ie7fix');
    }
    /* backups for browsers that don't support those css3 selectors yet */
    jQuery('tr:nth-child(odd)').addClass('odd');
    jQuery('tr:nth-child(even)').addClass('even');
});
