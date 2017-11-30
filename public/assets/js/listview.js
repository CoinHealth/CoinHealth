$("a[name='link']").click(function( e ) {
    e.preventDefault();
    if(this.hash){
      
        var target = '#'+ this.hash.substr(1);
          
        $(target).offset().top
        $(target).ScrollTo();
    }
});

$(".search-tab").click(function() {
  $(".search-view-container").show();
  $(".list-view-container").hide();
  $(".search-tab").addClass("active");
  $(".list-tab").removeClass("active");
});

$(".list-tab").click(function() {
  $(".list-view-container").show();
  $(".search-view-container").hide();
  $(".list-tab").addClass("active");
  $(".search-tab").removeClass("active");
});


$('#doctor-single').on('show.bs.modal', function () {

    $('#doctor').modal("hide");  
    $("body").addClass("notScroll");
    $(this).addClass("scroll");
});

$('#doctor-single').on('hidden.bs.modal', function () {
    $("body").removeClass("notScroll");
    $(this).removeClass("scroll");
});

$('#facility-single').on('show.bs.modal', function () {

    $('#facility').modal("hide");  
    $("body").addClass("notScroll");
    $(this).addClass("scroll");
});

$('#facility-single').on('hidden.bs.modal', function () {
    $("body").removeClass("notScroll");
    $(this).removeClass("scroll");
});

$('#medications-single').on('show.bs.modal', function () {

    $('#medications').modal("hide");  
    $("body").addClass("notScroll");
    $(this).addClass("scroll");
});

$('#medications-single').on('hidden.bs.modal', function () {
    $("body").removeClass("notScroll");
    $(this).removeClass("scroll");
});