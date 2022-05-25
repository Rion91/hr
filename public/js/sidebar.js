jQuery(function ($) {
    $(".sidebar-dropdown > a").click(function () {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
                .parent()
                .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    $("#close-sidebar").click(function (e) {
        e.preventDefault();
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function (e) {
        e.preventDefault();
        $(".page-wrapper").addClass("toggled");
    });
    document.addEventListener('click', function (event){
        if (document.getElementById('show-sidebar').contains(event.target)){
            $(".page-wrapper").addClass("toggled");
        }else if (!document.getElementById('sidebar').contains(event.target)){
            $(".page-wrapper").removeClass("toggled");
        }
    });
});
