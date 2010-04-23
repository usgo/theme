/* reads from cookie the list of open .hidable elements that are sub
 * a .mainnav
 *
 * this is used to keep state of the menus between pages.
 */
function init_menus() {
    var options = {path: '/'};
    var menu_version = 2;

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
        var temp = JSON.parse($.cookie('saved_menu'));
        
        /* convert from compact array to expanded one */
        window.menu_status = new Object();
        window.menu_status.version = temp.version;
        window.menu_status.shown = new Array();
        for (var i = 0; i < window.cached_showhide.length; ++i) {
            window.menu_status.shown[i] = false;
        }
        for (var i = 0; i < temp.shown.length; ++i) {
            if (temp.shown[i] >= window.menu_status.shown.length) {
                $.cookie('saved_menu', null, options);
                throw("saved menu cookie corrupted");
            } else {
                window.menu_status.shown[temp.shown[i]] = true;
            }
        }

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

        for (var i = 0; i < window.menu_status.shown.length; ++i) {
            //window.cached_showhide.eq(window.menu_status.shown[i]).removeClass('shower').addClass('hider');
            if (window.menu_status.shown[i]) {
                window.cached_showhide.eq(i).removeClass('shower').addClass('hider');
            }
        }
    } else {
        window.menu_status = new Object();
        window.menu_status.version = menu_version;
        window.menu_status.shown = new Array();
        
        for (var i = 0; i < window.cached_showhide.length; ++i)
        {
            window.menu_status.shown[i] = false;
        }
    }

    window.cached_showhide
        .click(function() { 
                var i = window.cached_showhide.index($(this));
                window.menu_status.shown[i] = !window.menu_status.shown[i];

                /* convert to slightly more compact format
                 * don't want cookies thing to be huge
                 */
                var to_write = new Object();
                to_write.version = window.menu_status.version;
                to_write.shown = new Array();
                for (var j = 0; j < window.menu_status.shown.length; ++j) {
                    if (window.menu_status.shown[j]) {
                        to_write.shown.push(j);
                    }
                }

                $.cookie('saved_menu', JSON.stringify(to_write), {path: '/'});
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
