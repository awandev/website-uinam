$(document).ready(function() {
    
    /* ======= CSS Animated Hamburger Icon for Bootstrap ======= */
    /* Ref: http://codepen.io/impondesk/pen/EaKoXY */
    
    $(".navbar-toggle").on("click", function () {
         $(this).toggleClass("active");
    });  
    	
	/* ======= Stop Video Playing When Close the Modal Window ====== */
    $("#modal-video .close").on("click", function() {
        $("#modal-video iframe").attr("src", $("#modal-video iframe").attr("src"));        
    });
    
    /* ====== Fullscreen Modal ====== */
	// .modal-backdrop classes
    $(".modal-fullscreen").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
      }, 0);
    });
    $(".modal-fullscreen").on('hidden.bs.modal', function () {
      $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
    });
    
    /* ======= FAQ accordion ======= */
    function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find('.panel-title a')
        .toggleClass('active')
        .find("i.fa")
        .toggleClass('fa-plus-square fa-minus-square');
    }
    $('.panel').on('hidden.bs.collapse', toggleIcon);
    $('.panel').on('shown.bs.collapse', toggleIcon);      
    
     /* ======= Testimonial Bootstrap Carousel ======= */
     /* Ref: http://getbootstrap.com/javascript/#carousel */
    $('#testimonials-carousel').carousel({
      interval: 8000 
    });
    
    /* ======= jQuery equal heights plugin ======= */
    /* Ref: https://github.com/liabru/jquery-match-height */
    
    $('#contact-block .info-item .item-inner').matchHeight();
    $('#opensessions-dates .item-inner').matchHeight();
    $('#news-section .item .content-holder').matchHeight();
    $('#docs-block .item .desc').matchHeight();
    $('#job-list-block .job-content').matchHeight();
    
    

});