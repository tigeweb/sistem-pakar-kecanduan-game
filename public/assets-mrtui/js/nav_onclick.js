$(document).ready(function () {
    function toggleMenu() {
        $(".notif .notif-menu").toggleClass("show hide");
    }
    // function toggleProfil() {
    //     $(".profil .profil-item").toggleClass("show hide");
    // }
    // NOTIF
    $(".notif i").click(function (event) {
        event.stopPropagation();
        toggleMenu();
        if ($(".profil .profil-item").hasClass("show")) {
            toggleProfil();
        }
    });
    $(".menu-section").click(function () {
        if ($(".notif .notif-menu").hasClass("show")) {
            toggleMenu();
        }
    });
    $("#navbar-admin").click(function () {
        if ($(".notif .notif-menu").hasClass("show")) {
            toggleMenu();
        }
    });

    // PROFIL
    // $(".profil img").click(function (event) {
    //     event.stopPropagation();
    //     if ($(".notif .notif-menu").hasClass("show")) {
    //         toggleMenu();
    //     }
    //     toggleProfil();
    // });
    // $(".menu-section").click(function () {
    //     if ($(".profil .profil-item").hasClass("show")) {
    //         toggleProfil();
    //     }
    // });
    // $("#navbar-admin").click(function () {
    //     if ($(".profil .profil-item").hasClass("show")) {
    //         toggleProfil();
    //     }
    // });
});
