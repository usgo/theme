$(document).ready(function() {
    $('.mainnav a + ul')
        .addClass("hidable")
        .prev().addClass("shower")
                .toggle(function() { $(this).next().slideDown("fast");
                                    },
                        function() { $(this).next().slideUp("fast");
                                    })
                .click(function() { $(this).toggleClass("shower");
                                    $(this).toggleClass("hider");
                                    });
    $('.hidable').hide();
});
