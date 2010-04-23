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
    
    var saved = null;
    var cached = $('.mainnav .shower + .hidable').prev();

    try {
        saved = $.parseJSON($.cookie('saved_menu'));

        if (saved.version != menu_version ||
            saved.length != cached.length)
        {
            throw("delete cookie");
        }
    } catch (e) {
        $.cookie('saved_menu', null, options);
    }

    if (saved != null) {
        // for ones that match, change classes from shower to hider for
        // the ones that are shown

        for (i = 0; i < saved.shown.length; ++i) {
            cached.eq(saved.shown[i]).removeClass('shower').addClass('hider');
        }

    }
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
        alert(init_menus());
});
