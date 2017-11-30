'use strict';

var providers = {

  init: function() {
    var self = this;
    self.ratings();
    // $('#test').on('click', self.getRatings);
    // doctorDatum.initialize();
    // $('#provider_input').typeahead(null, {
    //   minLength: 3,
    //   displayKey: 'doctor',
    //   limit: 10,
    //   source: doctorDatum.ttAdapter(),
    //   templates: {
    //     suggestion: function(data) {
    //       var ratings = data.data.total_rating;
    //       return '<div class="doctor-list"'+
    //               '<h3><b>'+data.fullname+'</b>'+
    //               '<span class="doc-star pull-right">'+
    //                 '<ul>'+
    //                   '<li><a href="#"><span class=" '+ (ratings >=1 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
    //                   '<li><a href="#"><span class=" '+ (ratings >=2 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
    //                   '<li><a href="#"><span class=" '+ (ratings >=3 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
    //                   '<li><a href="#"><span class=" '+ (ratings >=4 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
    //                   '<li><a href="#"><span class=" '+ (ratings >=5 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
    //                 '</ul>'+
    //               '</span>'+
    //               '</h3>'+
    //               '<p class="small"><strong>'+data.data.specialization+'</strong></p>'+
    //               '<p class="small">'+data.data.street+', '+data.data.state+'</p>'+

    //               '<p class="small"><strong>'+data.data.contact_no+'</strong></p>'+
    //               '</div>';
    //     },
    //     empty: '<div class="empty-message">No matches.</div>',
    //   }
    // }).bind('typeahead:selected', self.selected);

  },

  initTypeahead: function() {
		var start = function() {
			locationsDatum.initialize();
			$('#zip_code').typeahead(null, {
				minLength: 1,
				limit: 15,
				displayKey: 'location',
				source: locationsDatum.ttAdapter(),
				templates: {
					suggestion: function(data) {
						return '<div class="agent-list"'+
										'<h3>'+data.county+', '+data.state_abbr+' <b>'+data.zip_code+'</b></h3>'+
										'</div>';
					},
					empty: '<div class="empty-message">No matches.</div>',
				}
			}).on('typeahead:select', selected);
		},
		selected = function(obj, selected) {
			console.log(selected);
      $(this).typeahead('val', selected.zip_code);
      $('[name="address[city]"]').val(selected.city);
      $('[name="address[state_abbreviated]"]').val(selected.state_abbr);
		};

		start();
	},

  selected: function(obj, selected) {
    console.log(obj,selected);
    var container = $('.selected-provider-container');
    container.find('.provider-id').val(selected.data.id);
    container.find('.totalRatings').val(selected.data.total_rating);
    container.find('.provider-name').text(selected.data.name);
    container.find('.specialization').text(selected.data.specialization);
    container.find('.address').text(selected.data.street +', '+selected.data.state);
    container.find('.contact-no').text(selected.data.contact_no);
    container.find('.affiliations').text(selected.data.affiliations);
    $('#provider_name').text(selected.data.name);
    $('.btn-appoint').show();
    providers.showStar();
  },
  showStar: function() {
    $('.rate-div').show();
    $('.thank-you-div').hide();
    var rate = $('.totalRatings').val();
    $('.star-fg').css({
      'width': (rate * 230) / 5,
    });
  },

  ratings: function() {
    var $me = $( '.star-rate' );
    var $bg, $fg, wd, cc, ini;
    var start = function() {
      $('.thank-you-div').hide();
      $('.rate-div').hide();
      $('.btn-cancel').hide();
      $('.btn-rate').on('click', rateNow);
      $('.btn-cancel').on('click', cancelRate);
       $bg = $me.children( 'ul' );
       $fg = $bg.clone().addClass('star-fg').css('width', 0).appendTo($me);
       $bg.addClass( 'star-bg' );
    },
    rateNow= function() {
      $(this).hide();
      $me.on('mousemove', mousemove);
      $me.on('click', clicked);
      $('.btn-cancel').show();
      $('.star-fg').css({
        'width': '0px',
      });
    },
    cancelRate = function() {
      $('.btn-cancel').hide();
      $me.on('mousemove', cancelMousemove);
      $me.on('click', cancelClicked);
      $('.btn-rate').show();
      var rate = $('.totalRatings').val();
      $('.star-fg').css({
        'width': (rate * 230) / 5,
      });
    },
    initialize = function () {
      ini = true;
      cc = $bg.children().length;
      wd = $bg.width();
    },
    mousemove = function(e) {
       if ( !ini ) initialize();
        var dt, vl;
        dt = e.pageX - $me.offset().left;
        //console.log('dt: ' + dt +' /wd: ' + wd + ' *cc: ' + cc + ' *10 ');
        vl = Math.round( dt / wd * cc * 10 ) / 10;

        $me.attr('data-value', vl);
        $fg.css('width', Math.round(dt)+'px');
    },
    cancelMousemove = function() {
      var rate = $('.totalRatings').val();
      $('.star-fg').css({
        'width': (rate * 230) / 5,
      });
    },
    clicked = function() {
      var $value= $(this).attr('data-value');
      if ($value <= 5){
       // alert($value);
        var user= $('#userLog').val();
        var doctor= $('.provider-id').val();
        $.post('/careconnect/doctor-search', {
          _token: csrf_token,
          user_id: user,
          healthcare_provider_id: doctor,
          ratings: $value,
        }).done(done);
      }
      $me.on('click', cancelClicked);
      return false;
    },
    cancelClicked = function() {
      $('#thankyouModal').hide();
    },
    done = function() {
      // $('#thankyouModal').modal('toggle', setTimeout(function() {
      //   $('#thankyouModal').modal('toggle');
      // }, 2000) );
      $('.thank-you-div').show();
      $me.on('click', cancelClicked);
      $me.on('mousemove', cancelMousemove);
      $('.btn-rate').show();
      $('.btn-cancel').hide();
    };
    start();
  },

  initAdd: function() {
    var start = function() {
      // $('.row-premium').hide();
      $('.chk-subscription').on('change', checked);
      $('#btnDo').on('click', close);
      $('#expiration_date').val($('#exp_month').val() + '/' + $('#exp_year').val());
      $('#exp_month, #exp_year').on('change', getExpiration);
    },
    checked = function() {
      if ($(this).is(':checked')){
        $('.row-premium').fadeIn('slow');
        $('#subscription, #full_name, #credit_card_number, #credit_card_type, #cvv_cid').prop('required', true);
        $('#pl').modal('toggle');
      } else {
        $('.row-premium').hide();
        $('#subscription, #full_name, #credit_card_number, #credit_card_type, #cvv_cid').prop('required', false);
      }
    },
    close = function() {
      $('#pl').modal('toggle');
    },
    getExpiration = function() {
      $('#expiration_date').val($('#exp_month').val() + '/ ' + $('#exp_year').val());
    };
    start();
  },

};
