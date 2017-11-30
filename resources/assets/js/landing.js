// require('fullpage.js');
import Subscribe from './helpers/Subscribe.vue';
var landing = new Vue({
    el: '#main',
    data: {
        type: $('.row-ehr').length ? 'ehr': 'crm',
        url: `/api/subscriptions`,
        level: 1,
    },

    components: {
        'subscribe': Subscribe,
    },

    mounted () {
        this.url += `/${this.type}`;
        this.prepareFullpage();
        $('[data-toggle="tooltip"]').tooltip(); 
        $('.zoom-btns#zoom-minus').on('click', this.zoomout);
        $('.zoom-btns#zoom-plus').on('click', this.zoomin);

        $('#select_lang').on('click', function() {
    		$('#languagesModal').modal('toggle');
    	});

    	$('.sidebar-btn').click(function(){
    		$(this).toggleClass('open');
    	});

    	$('.sidebar-btn').on('click', function() {
    		if ($('#sidebar').is(':hidden')) {
    			$('#sidebar').fadeIn('fast');
    		}
    		else if ($('#sidebar').is(':visible')) {
    			$('#sidebar').hide();
    			$('#sidebar').fadeOut('fast');
            }
    	});
    },

    methods: {
        prepareFullpage () {
            $(this.$el).fullpage({
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
                    console.log(`${index} -- ${direction}`);
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
        				    $isAnimatedFifth.addClass('animated slideInLeft');
                            $isAnimatedFifth.eq(0).css('animation-delay', '.3s');
        				}

        				else if( ( index == 1 || index == 2 || index == 3 ) && nextIndex == 4 ) {
        					$isAnimatedFourth.addClass('animated slideInLeft');
        				    $isAnimatedFourth.eq(0).css('animation-delay', '.3s');
        				}

        				else if( ( index == 1 || index == 2 || index == 3 || index == 4 ) && nextIndex == 5 ) {
                            $isAnimatedSecond.addClass('animated fadeInUpBig');
                            $isAnimatedSecond.eq(0).css('animation-delay', '.3s');
                            $isAnimatedSecond.eq(1).css('animation-delay', '.6s');
                            $isAnimatedSecond.eq(2).css('animation-delay', '.9s');
                            $isAnimatedSecond.eq(3).css('animation-delay', '1.2s');
                            $('.footer').show();
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
        		$.fn.fullpage.moveTo(2);
        	});

        	$('.slide-btn').on('click', function() {
        		$.fn.fullpage.moveSectionDown();

        		if ($('.slide-btn' ).hasClass('up')) {
        	        $.fn.fullpage.moveTo(1);
        	    }
        	});
        },
        zoomout () {
          if ( this.level <= 0.8 )
            return false;

          this.level -= .2;
          this.zoom();
        },
        zoomin () {
          if ( this.level >= 1.4 )
            return false;
          this.level += .2;
          this.zoom();
        },
        zoom () {
          $('.zoom-level').text(100*this.level);
          document.body.style.zoom = this.level;
        },
        showModal (e) {
            $(e.target.hash).modal('show');
        },
    },
});
