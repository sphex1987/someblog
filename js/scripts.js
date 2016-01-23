jQuery(document).ready(function($) {

    $('.header_menu li').hover(
        function () {
            $('ul:first', this).css('display','block');
        }, 
        function () {
            $('ul:first', this).css('display','none');         
        }
    );  

    $('#main_header_menu').slicknav();

    $('.home-slider-version2').slick({
	  infinite: true,
	  autoplay: true,
	  autoplaySpeed: 5000,
	  slidesToShow: 2,
	  slidesToScroll: 1,
	  responsive: [
	  	{
	  		breakpoint: 991,
	  		settings: {
	  			slidesToShow: 1,
	  			slidesToScroll: 1,
	  			infinite: true
	  		}
	  	}
	  ]
	});

	$('.home-slider-version3').slick({
	  centerMode: true,
	  autoplay: true,
	  autoplaySpeed: 5000,
	  centerPadding: '10px',
	  slidesToShow: 3,
	  slidesToScroll: 1,	 
	  responsive: [
	  	{
	  		breakpoint: 991,
	  		settings: {
	  			centerMode: true,
	  			centerPadding: '10px',
	  			slidesToShow: 1
	  		}
	  	}
	  ]
	});

	var $grid = $('.two_column').masonry({
	  // options
	  itemSelector: '.one_col',
	  columnWidth: '.one_col',
	});

	$grid.imagesLoaded().progress( function() {
	  $grid.masonry('layout');
	});
		

})