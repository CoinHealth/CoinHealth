$(document).ready(function() {
	var visible = false;
	$('#main').fullpage({
		anchors: [
			'section1',
			'section2',
			'section3',
			'section4',
			'section5',
		],
		// fitToSection: true,
		navigation: false,
		navigationPosition: 'right',
		responsiveWidth: 1023,
		scrollBar:false,

		onLeave: function(index, nextIndex, direction){
            var leavingSection = $(this);

            if(index == 4 && direction =='down'){
                $('.slide-btn .fa').removeClass('fa-angle-down');
                $('.slide-btn .fa').addClass('fa-angle-up');
                $('.slide-btn').addClass('up');
            }

            if (window.matchMedia("(min-width: 1024px)").matches) {
					var $isAnimatedSecond = $('#section-2 .is-animated'),
    				$isAnimatedSecondSingle = $('#section-2 .is-animated__single');

    			var $isAnimatedFourth = $('#section-4 .is-animated');
    			var $isAnimatedFifth = $('#section-5 .is-animated');

    			if( index == 1 && nextIndex == 2 ) {
				    $isAnimatedSecond.addClass('animated fadeInUpBig');
				    $isAnimatedSecond.eq(0).css('animation-delay', '.3s');
				    $isAnimatedSecond.eq(1).css('animation-delay', '.6s');
				    $isAnimatedSecond.eq(2).css('animation-delay', '.9s');
				    $isAnimatedSecond.eq(3).css('animation-delay', '1.2s');
				}


				else if( ( index == 1 || index == 2 || index == 3 ) && nextIndex == 4 ) {
					$isAnimatedFourth.addClass('animated slideInLeft');
				    $isAnimatedFourth.eq(0).css('animation-delay', '.3s');
				}

				else if( ( index == 1 || index == 2 || index == 3 || index == 4 ) && nextIndex == 5 ) {
					$isAnimatedFifth.addClass('animated slideInLeft');
				    $isAnimatedFifth.eq(0).css('animation-delay', '.3s');
				}
			}
        },

        afterLoad: function(anchorLink, index){
            var loadedSection = $(this);

            if(index == 1){
                $('.slide-btn .fa').removeClass('fa-angle-up');
                $('.slide-btn .fa').addClass('fa-angle-down');
                $('.slide-btn').removeClass('up');
            }
        },
	});

	$('.a-community').on('click', function() {
		$.fn.fullpage.moveTo(5);
	});

	$('.slide-btn').on('click', function() {
		$.fn.fullpage.moveSectionDown();

		if ($('.slide-btn' ).hasClass('up')) {
	        $.fn.fullpage.moveTo(1);
	    }
	});

	$('[name="search_type"]').on('change', function() {
		console.log("asdasd", $(this).text());
		$('[name="input"]').attr({
			placeholder: 'type a '+$(this).find('option:selected').text()+'..',
		})
	});


});
