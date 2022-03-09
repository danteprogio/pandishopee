function resizeWindow() {
    let widthsidebar = $(window).width();
    
    if (widthsidebar >= 768) {
      $(".sidebar__navbar").addClass("active");
    } else {
      $(".sidebar__navbar").removeClass("active");
    }
    }
    
    $(window).resize(function () {
    resizeWindow();
    });
    
    $(".navabar__menu").click(function () {
    $(".sidebar__navbar").toggleClass("active");
    });
    
    $(".sidebar__navbar.active span").click(function () {
    $(".sidebar__navbar").toggleClass("active");
});
    