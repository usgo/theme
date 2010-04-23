/* reads from cookie the list of open .hidable elements that are sub
 * a .mainnav
 *
 * this is used to keep state of the menus between pages.
 */
function init_menus() {
    var options = {path: '/'};
    var menu_version = 1;

    // ensure cookies are enabled, otherwise return false
    // this should signal that crappy flyout menu should be used
    // instead, since that doesn't require cookies
    
    try {
        var rand = Math.random() + '';
        $.cookie('test_cookie', rand, options);

        if ($.cookie('test_cookie') != rand) {
            return false;
        }

        $.cookie('test_cookie', null, options);
    } catch(e) {
        return false;
    }

    // set hidable for matching uls, and shower for matching a's
    $('.mainnav a + ul')
        .addClass("hidable")
        .prev().addClass("shower")
                .click(function() { $(this).toggleClass("shower");
                                    $(this).toggleClass("hider");
                                    });

    // get cookie.  check main version.  throw out data if old, skip to hiding
    // all.

    // stores the status that will also be put into a cookie (in JSON)
    window.menu_status = null;
    
    window.cached_showhide = $('.mainnav .shower + .hidable').prev();

    try {
        window.menu_status = JSON.parse($.cookie('saved_menu'));

        if (window.menu_status.version != menu_version ||
            window.menu_status.shown.length != window.cached_showhide.length)
        {
            throw("delete cookie");
        }
    } catch (e) {
        $.cookie('saved_menu', null, options);
        window.menu_status = null;
    }

    if (window.menu_status != null) {
        // for ones that match, change classes from shower to hider for
        // the ones that are shown

        for (i = 0; i < window.menu_status.shown.length; ++i) {
            //window.cached_showhide.eq(window.menu_status.shown[i]).removeClass('shower').addClass('hider');
            if (window.menu_status.shown[i]) {
                window.cached_showhide.eq(i).removeClass('shower').addClass('hider');
            }
        }
    } else {
        window.menu_status = new Object();
        window.menu_status.version = menu_version;
        window.menu_status.shown = new Array();
        
        for (i = 0; i < window.cached_showhide.length; ++i)
        {
            window.menu_status.shown[i] = false;
        }
    }

    window.cached_showhide
        .click(function() { 
                i = window.cached_showhide.index($(this));
                window.menu_status.shown[i] = !window.menu_status.shown[i];
                $.cookie('saved_menu', JSON.stringify(window.menu_status), {path: '/'});
                });

    // add toggles (opposite ways for each case)

    $('.shower').toggle(function() { $(this).next().slideDown("fast"); },
                        function() { $(this).next().slideUp("fast"); });

    $('.hider' ).toggle(function() { $(this).next().slideUp("fast"); },
                        function() { $(this).next().slideDown("fast"); });

    // hide what should be hiden
    $('.mainnav .shower + .hidable').hide();

    return true;
}

$(document).ready(function() {
        init_menus();
});
