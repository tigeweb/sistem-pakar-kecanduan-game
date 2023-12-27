$(document).ready(function () {
    function dropdown(w) {
        let isDropdown = $("#sidebar .menu .dropdown");
        isDropdown.click(function () {
            let menu = $(this).find(".dropdown-menu");
            let caret = $(this).find(".link-item .arrow");
            menu.toggleClass("hide show");
            caret.toggleClass("rotate");
            if (w > 767.98 && !$("#sidebar .toggle").hasClass("open")) {
                $("#sidebar .toggle").toggleClass("open");
                if (menu.hasClass("hide")) {
                    caret.toggleClass("rotate");
                    menu.toggleClass("hide show");
                }
                $("#sidebar .menu .dropdown .dropdown-menu").toggleClass(
                    "d-none"
                );
                $("#sidebar .menu .dropdown .link-item .arrow").toggleClass(
                    "d-none"
                );
                handleToggle();
            }
        });
    }
    function handleMobile() {
        $("#navbar-admin .toggle").css({
            display: "block",
        });
        $("#sidebar .toggle").css({
            display: "none",
        });
        $("#navbar-admin .title").css({
            display: "none",
        });
        $(".title-mobile").css({
            display: "block",
            marginTop: "calc(5rem + 2vh)",
        });
        $("#navbar-admin").css({
            width: "96vw",
            position: "fixed",
            top: "0",
            left: "0",
        });
        $("#sidebar .menu .link-menu .link-title").css({
            display: "",
        });
        let isOpen = $("#navbar-admin .toggle").hasClass("open");
        $(".logo img").css({
            opacity: isOpen ? "" : "0",
            width: isOpen ? "" : "0",
        });
        $("#sidebar .logo img").css({
            opacity: isOpen ? "" : "0",
            width: isOpen ? "" : "0",
        });
        $("#sidebar .logo .logo-title").css({
            opacity: isOpen ? "" : "0",
            width: isOpen ? "" : "0",
        });
        $("#main-admin").css({
            marginLeft: isOpen ? "0" : "0",
        });
        $("#sidebar").css({
            width: isOpen ? "" : "0",
        });
        $("#sidebar .menu").css({
            marginTop: isOpen ? "" : "155px",
            padding: isOpen ? "" : "0",
        });
    }
    function handleToggle() {
        let isOpen = $("#sidebar .toggle").hasClass("open");
        $("#navbar-admin .toggle").css({
            display: "none",
        });
        $(".title-mobile").css({
            display: "none",
        });
        $("#sidebar .toggle").css({
            display: "block",
        });
        $("#navbar-admin .title").css({
            display: "block",
        });
        $("#sidebar .logo img").css({
            opacity: isOpen ? "" : "0",
            width: isOpen ? "" : "0",
        });
        $("#sidebar .logo .logo-title").css({
            opacity: isOpen ? "" : "0",
            width: isOpen ? "" : "0",
        });
        $("#sidebar .logo .logo-mobile").css({
            opacity: isOpen ? "" : "1",
        });
        $("#main-admin").css({
            marginLeft: isOpen ? "" : "calc(71px + 3vh)",
        });
        $("#sidebar").css({
            width: isOpen ? "" : "60px",
        });
        $("#navbar-admin").css({
            width: isOpen ? "" : "calc(100vw - calc(68px + 4vh) - 4vh)",
            position: "unset",
        });
        $("#sidebar .menu").css({
            marginTop: isOpen ? "" : "155px",
            padding: "",
        });
        $("#sidebar .foto").css({
            display: isOpen ? "" : "none",
        });
        $("#sidebar .menu .link-menu .link-title").css({
            display: isOpen ? "" : "none",
        });
    }
    function handleWindowResize() {
        let w = $(window).width();
        $("#navbar-admin .toggle").off("click");
        $("#sidebar .toggle").off("click");
        $("#sidebar .menu .dropdown").off("click");
        dropdown(w);
        if (w < 767.98) {
            handleMobile();
            $("#navbar-admin .toggle").click(function () {
                $(this).toggleClass("open");
                handleMobile();
            });
        } else {
            handleToggle();
            $("#sidebar .toggle").click(function () {
                $(this).toggleClass("open");
                $("#sidebar .menu .dropdown .dropdown-menu").toggleClass(
                    "d-none"
                );
                $("#sidebar .menu .dropdown .link-item .arrow").toggleClass(
                    "d-none"
                );
                handleToggle();
            });
        }
    }
    handleWindowResize();
    $(window).on("resize", function () {
        handleWindowResize();
    });
    setTimeout(() => {
        $("#admin").toggleClass("show");
    }, 600);
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});
